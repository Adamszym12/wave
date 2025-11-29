<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class PokeApiService
{
    protected string $url = 'https://pokeapi.co/api/v2/';

    public function getPokemon(string $name): array
    {
        $response = Http::get("$this->url/pokemon/$name");


        if ($response->failed()) {
            throw new \Exception("PokeAPI request failed: " . $response->body());
        }

        return $response->json();
    }
}
