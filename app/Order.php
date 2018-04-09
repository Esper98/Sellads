<?php
/*
 * Project: Sellads
 * File: app/Order.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false;

}
