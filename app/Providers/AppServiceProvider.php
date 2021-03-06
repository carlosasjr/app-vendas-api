<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Company;
use App\Models\ConditionPayment;
use App\Models\Device;
use App\Models\FormPayment;
use App\Models\Product;
use App\Models\Seller;
use App\Observers\ClientObserver;
use App\Observers\CompanyObserver;
use App\Observers\ConditionPaymentObserver;
use App\Observers\DeviceObserver;
use App\Observers\FormPaymentObserver;
use App\Observers\ProductObserver;
use App\Observers\SellerObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        if (config('app.env') == 'production') {
            URL::forceScheme('https');
        }

        Schema::defaultstringLength(191);

        Company::observe(CompanyObserver::class);
        Device::observe(DeviceObserver::class);
        Client::observe(ClientObserver::class);
        Seller::observe(SellerObserver::class);
        Product::observe(ProductObserver::class);
        FormPayment::observe(FormPaymentObserver::class);
        ConditionPayment::observe(ConditionPaymentObserver::class);
    }
}
