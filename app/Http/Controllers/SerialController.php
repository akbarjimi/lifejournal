<?php

namespace App\Http\Controllers;

use App\Models\Serial;
use App\Http\Requests\Admin\Serials\StoreSerialRequest;
use App\Http\Requests\Admin\Serials\UpdateSerialRequest;
use App\Http\Requests\Admin\Serials\SearchSerialRequest;
use App\Services\MovieDatabaseAdapter;
use App\Services\OMDB;

class SerialController extends Controller
{

    public $mdb;

    public function __construct(MovieDatabaseAdapter $mdb)
    {
        $this->mdb = $mdb;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.serials.index', [
            'serials' => Serial::with('user')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serials.create');
    }

    public function search(SearchSerialRequest $request)
    {
        $result = collect($this->mdb->getByTitle($request->name, OMDB::SERIAL));

        return view('admin.serials.create', [
            'result' => $result,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSerialRequest $request)
    {        
        try {
            $serial = $this->mdb->getById($request->imdb_id);
            
            Serial::create([
                'name' => $serial['Title'],
            ])->addMediaFromUrl($serial['Poster'])
            ->toMediaCollection();

            return redirect()->route('serials.index');
        } catch (\Throwable $throwable) {
            report($throwable);
            return redirect()->route('serials.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function show(Serial $serial)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function edit(Serial $serial)
    {
        return view('admin.serials.edit', [
            'serial' => $serial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSerialRequest $request, Serial $serial)
    {
        try {
            $serial->update($request->all());

            return redirect()->route('serials.index');
        } catch (\Throwable $throwable) {
            return redirect()->route('serials.index');
        }        
    }

    public function delete(Serial $serial)
    {
        return view('admin.serials.delete', [
            'serial' => $serial,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serial $serial)
    {
        try {
            $serial->delete();

            return redirect()->route('serials.index');
        } catch (\Throwable $throwable) {
            return redirect()->route('serials.index');
        }        
    }
}
