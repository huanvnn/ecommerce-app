<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });

        view()->composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
    }
}
