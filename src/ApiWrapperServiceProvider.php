<?php
    namespace VelocityArtisans\ApiWrapper;

    use Illuminate\Support\ServiceProvider;

    class ApiWrapperServiceProvider extends ServiceProvider
    {
        /**
         * Perform post-registration booting of services.
         *
         * @return void
         */
        public function boot()
        {
            // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
            // $this->loadViewsFrom(__DIR__.'/../resources/views', 'api-wrapper');

            // $this->app['router']->namespace('VelocityArtisans\\ApiWrapper\\Controllers')
            //     ->middleware(['web'])
            //     ->group(function () {
            //         $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            //     });

            if ($this->app->runningInConsole()) {
                $this->bootForConsole();
            }
        }

        /**
         * Register any package services.
         *
         * @return void
         */
        public function register()
        {
            $this->mergeConfigFrom(__DIR__.'/../config/api-wrapper.php', 'api-wrapper');
        }

        /**
         * Console-specific booting.
         *
         * @return void
         */
        protected function bootForConsole()
        {
            $this->publishes([
                __DIR__.'/../config/api-wrapper.php' => config_path('api-wrapper.php'),
            ], 'api-wrapper:config');

            // $this->publishes([
            //     __DIR__.'/../resources/views' => base_path('resources/views/vendor/api-wrapper'),
            // ], 'api-wrapper.views');

            // $this->publishes([
            //     __DIR__ . '/../database/migrations/' => database_path('migrations'),
            // ], 'migrations');
        }
    }
