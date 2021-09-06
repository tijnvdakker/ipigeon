<?php

namespace App\Modules;

/**
 * ServiceProvider
 *
 * The service provider for the modules. After being registered
 * it will make sure that each of the modules are properly loaded
 * i.e. with their routes, views etc.
 *
 * @author kundan Roy <query@programmerlab.com>
 * @package App\Modules
 */

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ModulesServiceProvider extends ServiceProvider {

    /**
     * Will make sure that the required modules have been fully loaded
     *
     * @return void routeModule
     */
    public function boot() {
        // For each of the registered modules, include their routes and Views
        $modules=config("module.modules");

        foreach ($modules as $module) {
            // Load the routes for each of the modules
            if (file_exists( __DIR__.'/'.$module.'/routes.php')) {
                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group( __DIR__.'/'.$module.'/routes.php');
            }
            if (is_dir( __DIR__.'/'.$module.'/Views')) {
                $this->loadViewsFrom( __DIR__.'/'.$module.'/Views',$module);
            }
        }
    }

    public function register() { }

}