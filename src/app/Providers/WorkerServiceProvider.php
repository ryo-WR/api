<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\WorkerRepository;
use App\Services\WorkerService;

class WorkerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(WorkerRepository::class, function ($app) {
            return new WorkerRepository();
        });

        $this->app->singleton(WorkerService::class, function ($app) {
            return new WorkerService($app->make(WorkerRepository::class));
        });
    }

    public function boot()
    {
        //
    }
}