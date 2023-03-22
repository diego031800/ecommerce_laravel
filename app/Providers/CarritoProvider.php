<?php

namespace App\Providers;

use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class CarritoProvider extends ServiceProvider
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
        view()->composer("*", function ($view)
        {
            $session_name = 'carrito_id';

            if (Auth::check()) {
                $carrito = Carrito::getUserCarritoSession();
                Session::put($session_name, $carrito->id);
                $view->with('carrito', $carrito);
            } 
            /* $carrito_id = Session::get($session_name);            
            $carrito = Carrito::encontrarOCrear($carrito_id); */
            
        });
    }
}
