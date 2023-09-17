<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LogHandler;
use App\Services\CoinManager;
use App\Services\CoinHandler;
use App\Services\ItemHandler;
use App\Repositories\LogRepository;
use App\Repositories\CoinRepository;
use App\Repositories\ItemRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogHandler::class, function ($app) {
            return new LogHandler($app->make(LogRepository::class)); // Dependencia del repositorio
        });

        $this->app->bind(CoinManager::class, function ($app) {
            return new CoinManager($app->make(CoinRepository::class)); // Dependencia del repositorio
        });

        $this->app->bind(CoinHandler::class, function ($app) {
            return new CoinHandler($app->make(CoinRepository::class), $app->make(CoinManager::class)); // Dependencia del repositorio
        });

        $this->app->bind(ItemHandler::class, function ($app) {
            return new ItemHandler($app->make(ItemRepository::class)); // Dependencia del repositorio
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
