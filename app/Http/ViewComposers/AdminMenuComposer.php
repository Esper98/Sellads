<?php
/*
 * Project: Sellads
 * File: app/Http/ViewComposers/AdminMenuComposer.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Menu;
use Illuminate\Support\Facades\Auth;

class AdminMenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var Menu
     */
    protected $menu;

    /**
     * Create a new profile composer.
     *
     * @param  Menu  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->menu = Menu::All();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $data = array(); 
        $data['menu'] = Menu::where('backOnly', 1)->get();
        
        $view->with('menu', $data);
    }
}