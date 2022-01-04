<?php

namespace App\Rules;

use App\Services\ZipDetails;
use Illuminate\Contracts\Validation\Rule;

class ValidateUsZip implements Rule
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
        try {
            $zipDetails = new ZipDetails;
            $responseData = $zipDetails->getZipDetails(request('zip'));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This zip address is not valid address.';
    }
}
