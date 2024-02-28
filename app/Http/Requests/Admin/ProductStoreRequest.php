<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\LanguageService;

class ProductStoreRequest extends FormRequest
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

        $validateArr = [
            'category' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'price' => $this->priceRule(),
            'sizes' => 'nullable|array',
            'sizes.*' => $this->sizeRule(),
            'ingredients' => 'nullable|array',
            'ingredients.*' => $this->ingredientRule(),
        ];

        foreach($languages as $lang){
            $validateArr[$lang->name . '.name'] = 'required|string|max:250';
            $validateArr[$lang->name . '.description'] = 'nullable|string|max:250';
        }
        
        return $validateArr;
    }

    public function priceRule()
    {
        if (!$this->input('sizes')) {
            return 'required|numeric|not_in:0';
        } else {
            return 'nullable'; 
        }
    }

    public function sizeRule()
    {
        if ($this->input('sizes')) {
            return 'required|numeric';
        } else {
            return 'nullable'; 
        }
    }
    
    public function ingredientRule()
    {
        if ($this->input('ingredients')) {
            return 'required|numeric';
        } else {
            return 'nullable'; 
        }
    }

}
