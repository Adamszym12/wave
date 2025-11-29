<?php

namespace App\Http\Resources;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Pokemon $pokemon */
        $pokemon = $this->resource;

        return [
            'name' => $pokemon->name,
            'is_external' => false,
            'data' => $pokemon->data,
        ];
    }
}
