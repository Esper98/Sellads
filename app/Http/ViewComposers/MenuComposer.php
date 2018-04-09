<?php
/*
 * Project: Sellads
 * File: app/Http/ViewComposers/MenuComposer.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Menu;
use App\Category;


class MenuComposer
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
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $data['items'] = Menu::All();
        $categories = Category::All();

        //loop throug the categories and convert them to a menu item
        foreach($categories as $key => $category){
            $category['link'] = "categorieën/".$category['name'];
            $items = array();

            //Adding the subcategories to the categories
            foreach($categories as $subCategory){
                if ($category['name'] == $subCategory['parent']){
                    $items[] = $subCategory;
                    $category['subCategories'] = $items;
                }
            }
            //remove from categories array if an categorie has a parent
            if (isset($category['parent'])){
                unset($categories[$key]);
            }
        }

        //adding categories to the categorie menu item
        foreach($data['items'] as $menuItem){
            if (isset($menuItem['isCategory']) && $menuItem['isCategory'] == 1){
                $menuItem['subCategories'] = $categories; 
            }
        }

        $items = array();
        foreach($data['items'] as $key => $menuItem){
            //add subitems to the items
            foreach($data['items'] as $subMenuItem){
                if ($menuItem['id'] == $subMenuItem['parent']){
                        $items[] = $subMenuItem;
                        $menuItem['subCategories'] = $items;
                }
            }
            // if menuitem has a parent or is backOnly remove it from the array
            if ($menuItem['parent'] != 0 || $menuItem['backOnly'] != 0){
                unset($data['items'][$key]);
            }
        }

        //check if user is an admin and add extra menuitems if needed
        if(\Auth::guest() || !\Auth::user()->admin){
            foreach($data['items'] as $key => $menuItem){
                if ($menuItem['adminFront'] != 0){
                    unset($data['items'][$key]);
                }        
            }
        }
        $view->with('menu', $data);
    }
}