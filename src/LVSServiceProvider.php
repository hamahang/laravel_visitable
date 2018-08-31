<?php

namespace ArtinCMS\LVS;

use Illuminate\Support\ServiceProvider;

class LVSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
    	// the main router
        $this->loadRoutesFrom( __DIR__.'/Routes/backend_lvs_route.php');
        $this->loadRoutesFrom( __DIR__.'/Routes/frontend_lvs_route.php');
	    $this->publishes([
		    __DIR__ . '/Database/Migrations/' => database_path('migrations')
	    ], 'migrations');

	    // for publish the assets files into main app
	    $this->publishes([
		    __DIR__.'/assets' => public_path('vendor/laravel_visitable'),
	    ], 'public');

	    // for publish the sms_ir config file to the main app config folder
	    $this->publishes([
		    __DIR__ . '/Config/LVS.php' => config_path('laravel_visitable.php'),
	    ]);
        $this->publishes([
            __DIR__ . '/Traits/LaravelVisitablesSystem.php' => app_path('Traits/LaravelVisitablesSystem.php'),
        ]);
        $this->publishes([
            __DIR__ . '/Components' => resource_path('assets/js/components/laravel_visitable'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    	// set the main config file
	    $this->mergeConfigFrom(
		    __DIR__ . '/Config/LVS.php', 'laravel_likeable_system'
	    );

		// bind the LVS Facade
	    $this->app->bind('LVS', function () {
		    return new LVS;
	    });
    }
}
