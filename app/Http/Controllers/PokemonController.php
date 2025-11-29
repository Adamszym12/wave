<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonIndexRequest;
use App\Http\Requests\PokemonStoreRequest;
use App\Http\Requests\PokemonUpdateRequest;
use App\Http\Resources\PokemonResource;
use App\Http\Services\PokeApiService;
use App\Models\Pokemon;
use Illuminate\Http\JsonResponse;

class PokemonController extends Controller
{
    public function index(PokemonIndexRequest $request): \Illuminate\Support\Collection
    {
        $pokemons = collect();
        $service = app(PokeApiService::class);

        foreach ($request->names as $name) {
            if (!Pokemon::where('is_banned', true)->where('name', $name)->exists()) {
                $pokemon = $service->getPokemon($name);
                $pokemons->push([$name => $pokemon]);
            }
        }

        return $pokemons;
    }

    public function store(PokemonStoreRequest $request): PokemonResource
    {
        $pokemon = Pokemon::create($request->validated());

        return new PokemonResource($pokemon);
    }

    public function show(Pokemon $pokemon): PokemonResource
    {
        return new PokemonResource($pokemon);
    }

    public function update(PokemonUpdateRequest $request, Pokemon $pokemon): PokemonResource
    {
        $pokemon->update($request->validated());

        return new PokemonResource($pokemon);
    }

    public function destroy(Pokemon $pokemon): JsonResponse
    {
        $pokemon->delete();

        return response()->json([
            'message' => 'Pokemon deleted successfully.'
        ]);
    }
}
