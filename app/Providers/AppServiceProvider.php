<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
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
        //

        Blade::directive('numbertowords', function ($expression) {
            return "<?php
                \$f = new NumberFormatter('en', NumberFormatter::SPELLOUT);
                echo ucfirst(\$f->format($expression));
            ?>";
        });

    }
}
