<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
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
    public function boot(Factory $cache, Settings $settings): void
    {
        $settings = $cache->remember('settings', 60, function() use ($settings){
            return $settings->pluck('payload', 'name')->all();
        });
        config()->set('settings', $settings);
    }
}
