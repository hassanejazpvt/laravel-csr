<?php

declare(strict_types=1);

namespace Scrumble\Csr\Src;

use Scrumble\Csr\Commands\CreateModel;
use Scrumble\Csr\Commands\CreatePolicy;
use Scrumble\Csr\Commands\CreateService;
use Scrumble\Csr\Src\Commands\CreateCsr;
use Scrumble\Csr\Commands\CreateIService;
use Scrumble\Csr\Commands\CreateRepository;
use Scrumble\Csr\Commands\CreateController;
use Scrumble\Csr\Commands\CreateIRepository;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class CsrServiceProvider extends LaravelServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var boolean
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->handleConfigs();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->commands([
            CreateCsr::class,
            CreateModel::class,
            CreatePolicy::class,
            CreateController::class,
            CreateIService::class,
            CreateService::class,
            CreateIRepository::class,
            CreateRepository::class,
        ]);
    }

    /**
     * Fetches and publishes config file
     *
     * @return void
     */
    private function handleConfigs(): void
    {
        if ($this->app['config']->get('csr') === null) {
            $this->app['config']->set('csr', require __DIR__ . '/../config/csr.php');
        }
    }
}
