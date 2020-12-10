<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Department;

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
        //Admin
        view()->composer('admins.users.index', function($view){
                $view->with('departments' , Department::sectors() );
        });
        view()->composer('admins.tasks.create', function($view){
            $view->with('departments' , Department::sectors() );
        });

        // Manager
        view()->composer('tasks.create', function($view){
            $view->with('departments' , Department::sectors() );
        });


    }
}
