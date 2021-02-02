<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Events\NovaServiceProviderRegistered;
use Laravel\Nova\NovaServiceProvider as NovaBootServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Call the parent boot method
        parent::boot();

        // The default nova application service provider loads the nova
        // "viewNova" permission when nova is being served. However,
        // we want to be able to ask for this permission always.

        // Register the gate policy
        $this->gate();

        // Just because we won't be using nova in all of our requests
        // doesn't mean that we shouldn't be able to leverage the
        // resources outside of nova. We can load those here.

        // Load the resources
        $this->resources();

        // Register the field macros
        $this->registerFieldMacros();
    }

    /**
     * Registers the field macros.
     *
     * @return void
     */
    protected function registerFieldMacros()
    {
        /**
         * Returns the index component for this field.
         *
         * @param  string|null  $resourceName
         * @param  string|null  $viaResource
         * @param  string|null  $viaResourceId
         *
         * @return string
         */
        Field::macro('getIndexComponent', function($resourceName = null, $viaResource = null, $viaResourceId = null) {

            // Determine the component properties
            $component = $this->component();
            $field = str_replace('"', '\'', json_encode($this->jsonSerialize()));

            // Return the component
            return "<component " .
                "is=\"index-{$component}\" " .
                "class=\"text-{$this->textAlign}\" " .
                ($resourceName ? ":resource-name=\"{$resourceName}\" " : '') .
                ($viaResource ? ":via-resource=\"{$viaResource}\" " : '') .
                ($viaResourceId ? ":via-resource-id=\"{$viaResourceId}\" " : '') .
                ":field=\"{$field}\"" .
            "></component>";

        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Configure the Nova authorization services.
     *
     * @return void
     */
    protected function authorization()
    {
        Nova::auth(function ($request) {
            return app()->environment('local') ||
                   Gate::check('viewNova', [$request->user()]);
        });
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return true;
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new Help,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
