<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomPhoneNumberValidation implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the phone number matches any of the provided formats
        return preg_match('/^(\+374\d{8}|0\d{8})$/', $value) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.custom_phone_number_validation');
    }
}
