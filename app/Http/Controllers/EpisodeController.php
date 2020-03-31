<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Serial;
use App\Models\Director;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Episodes\StoreEpisodeRequest;
use App\Http\Requests\Admin\Episodes\UpdateEpisodeRequest;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function index(Serial $serial)
    {
        return view('admin.serials.episodes.index',[
            'serial' => $serial,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function create(Serial $serial)
    {
        return view('admin.serials.episodes.create', [
            'serial' => $serial,
            'directors' => Director::all(),
            'publishers' => Publisher::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEpisodeRequest $request, Serial $serial)
    {
        $serial->episodes()->create($request->all());

        return \redirect()->route('serials.episodes.index', $serial);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serial  $serial
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Serial $serial, Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serial  $serial
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Serial $serial, Episode $episode)
    {
        return view('admin.serials.episodes.edit', [
            'serial' => $serial,
            'episode' => $episode,
            'directors' => Director::all(),
            'publishers' => Publisher::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serial  $serial
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEpisodeRequest $request, Serial $serial, Episode $episode)
    {
        $episode->update($request->all());

        return redirect()->route('serials.episodes.index', $serial);
    }

    public function delete(Serial $serial, Episode $episode)
    {
        return view('admin.serials.episodes.delete', [
            'serial' => $serial,
            'episode' => $episode,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serial $serial, Episode $episode)
    {
        $episode->delete();

        return redirect()->route('serials.episodes.index',$serial);
    }
}
