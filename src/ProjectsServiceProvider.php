<?php
namespace duncanrmorris\projectsmodule;

use Illuminate\Support\ServiceProvider;

class ProjectsServiceProvider extends ServiceProvider

{
    
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','projectsmodule');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        
    }

    public function register()
    {
        
    }
}

