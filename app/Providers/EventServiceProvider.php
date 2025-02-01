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
        $this->configureDatabaseInitialState();
    }

    /**
     * @return void
     */
    public function configureDatabaseInitialState()
    {
        Event::listen(
            MigrationsEnded::class,
            function (MigrationsEnded $event) {
                // down() method run during a rollback action. When rolling back,
                // tables underlined by our state commands will not exist because they
                // will be removed furing roll back.
                if ($event->method === 'down') {
                    return;
                }

                Artisan::call(EnsureDatabaseStateIsLoaded::COMMAND_SIGNATURE);
            }
        );
    }
}
