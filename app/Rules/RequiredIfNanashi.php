<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RequiredIfNanashi implements ValidationRule
{
    public function __construct(private mixed $name)
    {
        //
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if ($this->name === 'nanashi' && empty($value)) {
            $fail("The $attribute field is required when name is nanashi.");
        }
    }
}
