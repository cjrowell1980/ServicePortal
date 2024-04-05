<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        if (Schema::hasTable('settings')) {
            $settings = $cache->remember('settings', 60, function() use ($settings){
                return $settings->pluck('payload', 'name')->all();
            });
            config()->set('settings', $settings);
        }
    }
}
