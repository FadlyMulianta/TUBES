<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        View::composer('*', function ($view) {
            $user = Auth::user();
            $jumlahProdukKeranjang = 0;

            if ($user) {
                $jumlahProdukKeranjang = \App\Models\Keranjang::where('user_id', $user->id)->count();
            }

            $view->with('jumlahProdukKeranjang', $jumlahProdukKeranjang);
        });
    }
}
