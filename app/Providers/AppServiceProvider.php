<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Department;
use App\Models\User;

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
        //Admin panel
        view()->composer('admins.users.index', function($view){
            $view->with('departments' , Department::sectors());
        });

        view()->composer('admins.tasks.index', function($view){
            $view->with('sektors' , Department::sectors());
        });
        view()->composer('admins.tasks.show', function($view){
            $view->with('departments' , Department::sectors())
                 ->with('managers' , User::managers())
                 ->with('sellers' , User::sellers());
        });
        view()->composer('admins.tasks.create', function($view){
            $view->with('departments' , Department::sectors())
                 ->with('managers' , User::managers())
                 ->with('sellers' , User::sellers());
        });
        view()->composer('admins.tasks.edit', function($view){
            $view->with('departments' , Department::sectors())
                 ->with('managers' , User::managers())
                 ->with('sellers' , User::sellers());
        });

        // Manager panel
        view()->composer('tasks.index', function($view){
            $view->with('sektors' , Department::sectors());
        });
        view()->composer('tasks.create', function($view){
            $view->with('departments' , Department::sectors())
                 ->with('sellers' , User::sellers());
        });
        view()->composer('tasks.show', function($view){
            $view->with('departments' , Department::sectors())
                 ->with('sellers' , User::sellers());
        });
        view()->composer('tasks.edit', function($view){
            $view->with('departments' , Department::sectors())
                 ->with('sellers' , User::sellers());
        });

    }
}
