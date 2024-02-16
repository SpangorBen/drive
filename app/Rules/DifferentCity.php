<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DifferentCity implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $destinationCityId = request()->input('destination_city');

        // Check if the pickup and destination cities are different
        if ($value == $destinationCityId) {
            $fail("The $attribute and destination city must be different.");
        }

    }

}
