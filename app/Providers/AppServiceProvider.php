<?php

namespace App\Providers;

use App\Country;
use App\Item;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Builder::defaultStringLength(191);
        // Using class based composers...
        View::composer(
            'Countries', 'App\Http\View\Composers\CountriesComposer'
        );

        // Using Closure based composers...
        View::composer('layouts.main', function ($view) {


            $view->with(['countries'=>Country::all(),'items'=>Item::all()]);

        });

    }
}
