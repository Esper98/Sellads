<?php
/*
 * Project: Sellads
 * File: app/Http/Controllers/Controller.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    //make sure the correct files get used
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
