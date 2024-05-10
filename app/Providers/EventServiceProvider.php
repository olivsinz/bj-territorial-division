<?php

declare(strict_types=1);

namespace App\Providers;

use App\Console\Commands\EnsureDatabaseStateIsLoaded;
use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(
            function (MigrationsEnded $event) {
                Artisan::call(EnsureDatabaseStateIsLoaded::COMMAND_SIGNATURE);
            }
        );
    }
}
