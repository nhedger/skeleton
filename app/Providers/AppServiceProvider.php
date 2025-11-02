<?php

declare(strict_types=1);

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

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
        $this->configureImmutableDates();
        $this->configureSecureURLs();
        $this->preventStrayRequests();
        $this->ensureStrictModels();
        $this->autoEagerLoadRelationships();
        $this->useViteAgressivePrefetching();
    }

    /**
     * Configure immutable dates.
     * 
     * This method ensures that CarbonImmutable is used throughout the 
     * application when using the Date facade.
     */
    protected function configureImmutableDates(): void
    {
        Date::use(CarbonImmutable::class);
    }

    /**
     * Configure secure URLs.
     * 
     * This method forces the application to use HTTPS for all URLs when the 
     * application is running in a production or staging environment.
     */
    protected function configureSecureURLs(): void
    {
        $shouldForceHttps = $this->app->environment(['production', 'staging'])
            && !$this->app->runningUnitTests();

        if (!$shouldForceHttps) {
            return;
        }

        URL::forceHttps();
    }

    /**
     * Prevent stray requests.
     * 
     * This method ensures that stray requests are prevented in testing 
     * environments.
     */
    protected function preventStrayRequests(): void
    {
        if (!$this->app->runningUnitTests()) {
            return;
        }

        Http::preventStrayRequests();
    }

    /**
     * Ensure strict models.
     * 
     * This method ensures that models operate in strict mode, which means that
     * they prevent lazy, loading, silently discarding attributes, and accessing
     * missing attributes.
     * 
     * In non-production environments, this behavior will result in exceptions
     * being thrown to help catch potential issues during development and testing.
     */
    protected function ensureStrictModels(): void
    {
        if (!$this->app->environment(['staging', 'production'])) {
            return;
        }

        Model::shouldBeStrict();
    }

    /**
     * Automatically eager-load relationships.
     * 
     * This method enables automatic eager loading of relationships for models.
     */
    protected function autoEagerLoadRelationships(): void
    {
        Model::automaticallyEagerLoadRelationships();
    }

    /**
     * Use Vite aggressive prefetching.
     * 
     * This method ensures that Vite assets are prefetched aggressively.
     */
    protected function useViteAgressivePrefetching(): void
    {
        Vite::useAggressivePrefetching();
    }
}
