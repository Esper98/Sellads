<?php
/*
 * Project: Sellads
 * File: app/Category.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;
    protected $primaryKey = 'name';
    public $incrementing = false;
    // protected $fillable = ['name'];

}
