<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IbanValidationRule;

class StoreIbanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'iban_no' => ['required', new IbanValidationRule],
            'user_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'iban.required' => 'The IBAN field is required.',
            'iban.iban_validation' => 'The IBAN is not valid.',
         
        ];
    }
}
