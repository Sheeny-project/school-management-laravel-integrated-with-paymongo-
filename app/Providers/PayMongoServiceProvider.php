<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Paymongo\PaymongoClient as Paymongo;

class PayMongoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Paymongo::class, function ($app) {
            return new Paymongo([
                'secret_key' => config('services.paymongo.secret_key'),
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
