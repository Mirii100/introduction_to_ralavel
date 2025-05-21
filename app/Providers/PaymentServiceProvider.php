<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        
        $this->app->bind(PaymentGateway::class, StripeGateway::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

        if ($this->app->environment('local')) {
// Development-only services
}
// Publish configuration
$this->publishes([
__DIR__.'/../../config/payment.php' => config_path('payment.php'),
], 'config');
    }
}
