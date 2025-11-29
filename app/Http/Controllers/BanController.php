<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanStoreRequest;
use App\Http\Resources\PokemonResource;
use App\Models\Pokemon;
use Illuminate\Http\JsonResponse;

class BanController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $pokemons = Pokemon::where('is_banned', true)->get();

        return PokemonResource::collection($pokemons);
    }

    public function store(BanStoreRequest $request): PokemonResource
    {
        $pokemon = Pokemon::firstOrCreate(
            ['name' => $request->name],
            $request->validated()
        );

        $pokemon->is_banned = true;
        $pokemon->save();

        return new PokemonResource($pokemon);
    }

    public function destroy(Pokemon $banned): JsonResponse
    {
        $banned->is_banned = false;

        $banned->save();

        return response()->json([
            'message' => 'Pokemon unbanned successfully.'
        ]);
    }
}
