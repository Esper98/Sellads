<?php
/*
 * Project: Sellads
 * File: app/Http/Requests/ProductRequest.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => "required|min:2|unique:product,name,$this->id",
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            'category' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Vul een naam in',
            'name.min' => 'Een naam moet uit minstens 2 characters bestaan',
            'name.max' => 'Een naam mag uit maximaal 45 characters bestaan',
            'name.unique' => 'Er is al een product met deze naam',
            'price.required' => 'Vul een prijs in',
            'price.numeric' => 'Een prijs moet uit cijfers bestaan',
            'price.min' => 'De prijs mag niet negatief zijn',
            'description.required' => 'vul een omschrijving in',
            'category.required' => 'Selecteer een categorie in',
            'image.required' => 'Vul een foto in',
            'image.image' => 'Een plaatje moet een jpeg, png of jpg zijn',
            'image.max' => 'Het plaatje is te groot',
        ];
    }
}
