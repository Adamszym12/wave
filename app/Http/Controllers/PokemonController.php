<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanStoreRequest;
use App\Http\Requests\PokemonIndexRequest;
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

//    public function store(BanStoreRequest $request): PokemonResource
//    {
//        $pokemon = Pokemon::firstOrCreate(
//            ['name' => $request->name],
//            $request->validated()
//        );
//
//        $pokemon->is_banned = true;
//        $pokemon->save();
//
//        return new PokemonResource($pokemon);
//    }
//
//    public function destroy(Pokemon $banned): JsonResponse
//    {
//        $banned->is_banned = false;
//
//        $banned->save();
//
//        return response()->json([
//            'message' => 'Pokemon unbanned successfully.'
//        ]);
//    }
}
