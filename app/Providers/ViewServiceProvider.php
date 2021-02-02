<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Bind the composers to their views
        $this->bindViewComposers();
    }

    /**
     * Binds the composers to their views.
     *
     * @return void
     */
    protected function bindViewComposers()
    {
        // Determine the view composers
        $composers = $this->app->config->get('view.composers', []);

        // Register each composer
        foreach($composers as $composer) {
            $this->bindViewComposer($composer);
        }
    }

    /**
     * Binds the specified view composer.
     *
     * @param  string  $composer
     *
     * @return void
     */
    protected function bindViewComposer($composer)
    {
        // Create the view composer instance
        $instance = $this->app->make($composer);

        // Bind the instance as a composer
        $this->app->view->composer($instance->composes(), function($view) use ($instance) {
            $instance->compose($view);
        });
    }
}
