<?php

namespace App\Providers;

use App\Events\DeviceCreated;
use App\Events\DeviceDelete;
use App\Listeners\DecrementLicense;
use App\Listeners\IncrementLicense;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        DeviceCreated::class => [
            IncrementLicense::class
        ],

        DeviceDelete::class => [
            DecrementLicense::class
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
