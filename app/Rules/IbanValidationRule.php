<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IbanValidationRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Remove spaces and convert to uppercase
        $iban = strtoupper(str_replace(' ', '', $value));

        // Check if the IBAN is in the correct format
        if (!preg_match('/^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/', $iban)) {
            return false;
        }

        // Move the first 4 characters to the end
        $iban = substr($iban, 4) . substr($iban, 0, 4);

        // Replace letters with their respective digits (A=10, B=11, ..., Z=35)
        $iban = preg_replace_callback('/[A-Z]/', function($matches) {
            return ord($matches[0]) - 55;
        }, $iban);

        // Perform the modulo operation
        return bcmod($iban, '97') === '1';
    }

    public function message()
    {
        return 'The :attribute is not a valid IBAN.';
    }
}