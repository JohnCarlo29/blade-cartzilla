<?php

declare(strict_types=1);

namespace JohnCarlo29\Cartzilla;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeCartzillaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-cartzilla', []);

            $factory->add('heroicons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-cartzilla.php', 'blade-cartzilla');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-cartzilla'),
            ], 'blade-cartzilla');

            $this->publishes([
                __DIR__.'/../config/blade-cartzilla.php' => $this->app->configPath('blade-cartzilla.php'),
            ], 'blade-cartzilla-config');
        }
    }
}
