<?php

namespace App\Providers;

use App;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use jeremykenedy\LaravelRoles\Models\Role;
use View;

class ViewServiceProvider extends ServiceProvider
{
    private $nullSelected = [null => 'Select .... '];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //********* Users Views
        View::composer(['users.fields'], function ($view) {
            $rolesItems = $this->nullSelected+Role::all()->pluck('description', 'id')->toArray();
            $ServiceItems = $this->nullSelected+Service::all()->pluck('name_'.App::getLocale(), 'id')->toArray();
            $view->with('rolesItems', $rolesItems)
                 ->with('ServiceItems', $ServiceItems);
        });
    }
}
