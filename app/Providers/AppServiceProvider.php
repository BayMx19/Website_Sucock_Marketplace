<?php

namespace App\Providers;

use App\Models\Keranjang;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        if (auth()->check()) {
            $jumlahKeranjang = Keranjang::where('pembeli_id', auth()->id())
                ->where('status', 'Belum Checkout')
                ->count();

            $view->with('jumlahKeranjang', $jumlahKeranjang);
        }
    });
    }
}
