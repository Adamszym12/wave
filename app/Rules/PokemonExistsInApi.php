<?php

namespace App\Rules;

use App\Http\Services\PokeApiService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PokemonExistsInApi implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $service = app(PokeApiService::class);

        if ($service->pokemonExists($value)) {
            $fail("The selected pokemon already exist");
        }
    }
}
