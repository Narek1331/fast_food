<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CustomPhoneNumberValidation;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:250',
            'name' => 'required|string|max:250',
            'phone_number' => ['required', new CustomPhoneNumberValidation],
            'state' => 'required|numeric|exists:states,id',
            'settlement' => 'required|numeric|exists:settlements,id',
            'address' => 'required|string|max:250',
            'payment_method' => 'required|numeric|exists:payment_methods,id',
            'notes' => 'nullable|string|max:500'
        ];
    }
}
