<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyMeals;
use App\Http\Requests\HomePostRequest;
use App\Services\StatisticsService;
use Auth;
use App\Services\ChartService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(HomePostRequest $request)
    {
       $statisticsService = new StatisticsService();
       //When the user is a dou.
       $mealsPerDou = $statisticsService
                        ->statsPerMealsPerDou(
                            Carbon::now()->format('Y-m-d'),
                            //'2024-05-15',
                            auth()->user()->code_dou);

       //When the user is Onou.

       //When the user is Residence

        // create a chart for monthly meals
       if($request->month) {
            $chart = (new ChartService)->MonthlyMeals($request->month);
       }
       else
            $chart = (new ChartService) ->MonthlyMeals(Carbon::now()->month);
       return view('Home.home', ['mealsPerDou' => $mealsPerDou,'chart' => $chart]);
    }


    public function stats(HomePostRequest $request)
    {
        $page = $request->page;
        return view('Home.stats');
    }
}
