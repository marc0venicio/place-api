<?php

declare(strict_types=1);

namespace App\Presenter\Providers;

use App\Domain\Place\Places;
use App\Infrastructure\Database\EloquentPlaces;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerRepositories();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });
        Factory::guessModelNamesUsing(function($string){
            return 'App\\Infrastructure\\Database\\Models\\'  . str_replace('Factory', '', class_basename($string));
        });
    }

    private function registerRepositories(): void
    {
        $this->app->bind(Places::class, EloquentPlaces::class);
    }
}
