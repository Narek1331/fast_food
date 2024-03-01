<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\LanguageService;

class StoreOrUpdateIngredientRequest extends FormRequest
{
    public function __construct(
        LanguageService $language_serv,

        ){
        $this->language_serv = $language_serv;
    }
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
        $languages = $this->language_serv->getAll();

        $validateArr = [];

        foreach($languages as $lang){
            $validateArr[$lang->name . '.name'] = 'required|string|max:250';
        }

        return $validateArr;
    }
}
