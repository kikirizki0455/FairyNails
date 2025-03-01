<?php

namespace App\Providers;

use App\Events\PendingUserRegistered;
use App\Listeners\SendPendingUserNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PendingUserRegistered::class => [
            SendPendingUserNotification::class,
        ],
    ];

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
        parent::boot(); // Pastikan memanggil parent::boot()
    }
}
