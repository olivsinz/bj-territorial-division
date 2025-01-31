<?php

declare(strict_types=1);

namespace App\Providers;

use App\Console\Commands\EnsureDatabaseStateIsLoaded;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureModels();
        $this->configureCommands();
        $this->configureRateLimiter();

        if ($this->app->environment('production')) {
            Model::handleLazyLoadingViolationUsing(function (Model $model, string $relation) {
                $class = get_class($model);

                info("Attempted to lazy load [{$relation}] on model [{$class}].");
            });

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

    /**
     * Configure the models.
     */
    private function configureModels(): void
    {
        Model::shouldBeStrict();
    }

    /**
     * configure the application's commands
     */
    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands($this->app->environment('production'));
    }

    /**
     * configure rate limiter
     */
    private function configureRateLimiter(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
