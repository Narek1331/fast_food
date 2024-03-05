<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketStoreRequest extends FormRequest
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
            'product_id' => 'required|numeric|exists:products,id',
            'size_id' => $this->sizeRule(),
            'count' => 'required|numeric|max:200',
            'ingredients' => 'nullable|array',
            'ingredients.*' => $this->ingredientRule(),
        ];
    }

    public function ingredientRule()
    {
        if ($this->input('ingredients')) {
            return 'required|numeric';
        } else {
            return 'nullable';
        }
    }

    public function sizeRule()
    {
        if ($this->input('size_id')) {
            return 'numeric|exists:sizes,id';
        } else {
            return 'nullable';
        }
    }
}
