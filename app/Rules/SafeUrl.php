<?php

namespace App\Rules;

use App\Services\SafeBrowsing;
use Illuminate\Contracts\Validation\Rule;

class SafeUrl implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (new SafeBrowsing())->validateUrl($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'URL is not safe';
    }
}
