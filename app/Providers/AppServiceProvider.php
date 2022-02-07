<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Device;
use App\Models\Product;
use App\Models\Seller;
use App\Observers\ClientObserver;
use App\Observers\DeviceObserver;
use App\Observers\ProductObserver;
use App\Observers\SellerObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Device::observe(DeviceObserver::class);
        Client::observe(ClientObserver::class);
        Seller::observe(SellerObserver::class);
        Product::observe(ProductObserver::class);
    }
}
