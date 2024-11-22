<?php

namespace App\Providers;

use App\Models\Configuracion;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }*/

        /* view()->share('configOrganizacion', $configuracion = Configuracion::find(1)); */

        /* URL::forceScheme('https'); */

        Paginator::useBootstrap();
    }
}
