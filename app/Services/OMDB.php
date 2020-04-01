<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Services\MovieDatabaseAdapter;

class OMDB implements MovieDatabaseAdapter
{

    public const SERIAL = "series";

    public const MOVIE = "movie";

    public const EPISODE = "episode";

    private string $key;

    private string $url;

    public function __construct()
    {
        $this->key = env('OMDB_API_KEY');
        $this->url = 'http://omdbapi.com/?apikey='.$this->key.'&';
    }

    public function getById(string $id)
    {
        $response = Http::get($this->url.'i='.$id);

        if ($response->successful()) {
            return $response->json();
        }

        return json_encode([]);
    }

    public function getByTitle(string $title, string $type = null)
    {
        $resource = $this->url.'s='.$title;

        if ($type !== null) {
            $resource .= "&type={$type}";
        }

        $response = Http::get($resource);

        if ($response->successful()) {
            return $response->json();
        }

        return json_encode([]);
    }
}