<?php
/*
 * Project: Sellads
 * File: app/Product.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = false;
    //protected $primaryKey = 'ID';
    //protected $fillable = ['Naam','Prijs','Omschrijving', 'categorie_Naam', 'Afbeelding'];
    public function scopeSearch($query, $search){
        return $query->where('name','like' , '%' . $search . '%')
        ->orWhere('description','like' , '%' . $search . '%');
    }
}
