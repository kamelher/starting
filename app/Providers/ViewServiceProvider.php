<?php

namespace App\Providers;

use App;
use App\Models\Register;
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

        //********* registers Views
        View::composer(['registers.fields'], function ($view) {
            $ServiceItems = $this->nullSelected+Service::all()->pluck('name_'.App::getLocale(), 'id')->toArray();
            $typeItems = (new Register())->types[App::getLocale()];
            $categoryItems = (new Register())->categories[App::getLocale()];
            $view->with('ServiceItems', $ServiceItems)
                 ->with('typeItems', $typeItems)
                 ->with('categoryItems', $categoryItems);
        });

        //********* Circulation send form fields Views
        View::composer(['circulation.send.fields'], function ($view) {
            $registersItems = \Auth::user()->service->registers()->where('category',2)->pluck('label_'.App::getLocale(), 'id')->toArray();
            $ServiceItems = Service::where('id','!=', \Auth::user()->service->id)->get()->pluck('name_'.App::getLocale(), 'id')->toArray();
            $view->with('ServiceItems', $ServiceItems)
                 ->with('registersItems', $registersItems);
        });

        //********* Circulation record form fields Views
        View::composer(['circulation.record.fields'], function ($view) {
            $registersItems = \Auth::user()->service->registers()->where('category',1)->pluck('label_'.App::getLocale(), 'id')->toArray();
            $ServiceItems = Service::where('id','!=', \Auth::user()->service->id)->get()->pluck('name_'.App::getLocale(), 'id')->toArray();
            $view->with('ServiceItems', $ServiceItems)
                 ->with('registersItems', $registersItems);
        });
        //********* Circulation processing form fields Views
        View::composer(['circulation.process.fields'], function ($view) {
            $actionItems = App\Models\Action::all()->pluck('name_'.App::getLocale(), 'id')->toArray();
            $ServiceItems = Service::where('id','!=', \Auth::user()->service->id)->get()->pluck('name_'.App::getLocale(), 'id')->toArray();
            $view->with('ServiceItems', $ServiceItems)
                 ->with('actionItems', $actionItems);
        });
        //********* Circulation SendProcessing form fields Views
        View::composer(['circulation.send_process.fields'], function ($view) {
            $registersItems = \Auth::user()->service->registers()->where('category',2)->pluck('label_'.App::getLocale(), 'id')->toArray();
            $ServiceItems = Service::where('id','!=', \Auth::user()->service->id)->get()->pluck('name_'.App::getLocale(), 'id')->toArray();
            $view->with('ServiceItems', $ServiceItems)
                ->with('registersItems', $registersItems);
        });

    }
}
