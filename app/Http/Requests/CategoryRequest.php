<?php
/*
 * Project: Sellads
 * File: app/Http/Requests/CategoryRequest.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|string|min:2|unique:category,name,$this->id,name|max:45",
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Vul een naam in',
            'name.min' => 'Een naam moet uit minstens 2 characters bestaan',
            'name.max' => 'Een naam mag uit maximaal 45 characters bestaan',
            'name.unique' => 'Er is al een categorie met deze naam',
        ];
    }
}
