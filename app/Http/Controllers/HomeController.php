<?php
/*
 * Project: Sellads
 * File: app/Http/Controllers/HomeController.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
