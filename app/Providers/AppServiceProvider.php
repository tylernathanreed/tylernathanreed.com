<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        // Don't use blade component tags
        Blade::withoutComponentTags();

        // Expose a subset of the configuration to the front-end
        Blade::directive('config', function() {
            return $this->getConfigFunction();
        });
    }

    /**
     * Returns the JavaScript definition for the config function.
     *
     * @return string
     */
    protected function getConfigFunction()
    {
        $keys = [
            'app.name'
        ];

        $config = json_encode(array_combine($keys, array_map(function($key) {
            return config($key);
        }, $keys)));

        return <<<EOT
<script type="text/javascript">
    window.Config = {$config}
</script>
EOT;
    }
}
