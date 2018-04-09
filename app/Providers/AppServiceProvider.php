<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Menu;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer(
            'inc.menu', 'App\Http\ViewComposers\MenuComposer'
        );

        View::composer(
            'inc.adminMenu', 'App\Http\ViewComposers\AdminMenuComposer'
        );

        //view()->share('menu', Menu::All());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
