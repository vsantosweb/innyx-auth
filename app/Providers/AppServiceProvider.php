<?php

namespace App\Providers;

use App\Repository\Interfaces\Address\IAddressRepository;
use App\Repository\Services\Address\AddressService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(IAddressRepository::class, AddressService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
