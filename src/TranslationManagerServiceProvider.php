<?php

namespace Pinetco\TranslationManager;

use Illuminate\Support\Str;
use Pinetco\TranslationManager\Models\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Pinetco\TranslationManager\Commands\TranslationManagerCommand;

class TranslationManagerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('translation-manager')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations([
                'create_pltm_routes_table',
                'create_pltm_views_table',
                'create_pltm_translations_table',
            ])
            ->hasRoute('web')
            ->hasViews('laravel-translation-manager')
            ->hasCommand(TranslationManagerCommand::class);
    }

    public function bootingPackage()
    {
        if (!app()->runningInConsole()) {
            $this->listenViewEvents();
        }
    }

    public function listenViewEvents()
    {
        $requestPath = request()->path();

        $excludePaths = [
            'vendor',
        ];

        if (Str::startsWith($requestPath, $excludePaths)) {
            return;
        }

        $route = Route::firstOrCreate([
            'path' => $requestPath,
        ]);

        app('events')->listen('composing:*', function ($view, $data = []) use ($route) {
            // $url = url()->current();
            $view = $data[0];
            // $name = $view->getName();
            $path = ltrim(str_replace(base_path(), '', realpath($view->getPath())), '/');

            // logger($path);
            if (Str::startsWith($path, 'resources/views/')) {
                $route->views()->firstOrCreate(compact('path'));
            }
        });
    }
}
