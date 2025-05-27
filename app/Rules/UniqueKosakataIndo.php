<?php

namespace App\Rules;

use App\Models\Kosakata;
use Closure;

use Illuminate\Contracts\Validation\ValidationRule;

class UniqueKosakataIndo implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Kosakata::whereRaw('LOWER(kata_indo) = ?', [strtolower($value)])->exists()) {
            $fail('⚠️ Kosakata ini sudah pernah ditambahkan.');
        }
    }
}
