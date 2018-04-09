<?php
/*
 * Project: Sellads
 * File: app/Http/Controllers/AdminController.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.admin');
    }
}
