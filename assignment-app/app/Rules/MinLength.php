<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MinLength implements Rule
{
    protected $minLength;

    public function __construct($minLength)
    {
        $this->minLength = $minLength;
    }

    public function passes($attribute, $value)
    {
        return strlen($value) >= $this->minLength;
    }

    public function message()
    {
        return "The :attribute must be at least {$this->minLength} characters.";
    }
}
