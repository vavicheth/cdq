<?php

namespace App\Http\Controllers;

use App\Duty;
use App\Statistic;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Charts\DailyChart;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $entrant_chart=new DailyChart();
        $restant_chart=new DailyChart();
        $c=date("Y-m-d", strtotime("yesterday"));
        $duties=Duty::where('date','=',$c)->first();

        if(!$duties){
            return view('welcome');
        }

        $statistics=$duties->statistic()->get();

        $entrant=[$statistics->sum('et_payant'),$statistics->sum('et_bss'),$statistics->sum('et_credit'),$statistics->sum('et_gratuit'),$statistics->sum('et_hef'),$statistics->sum('et_indigent')];
        $restant=[$statistics->sum('rt_payant'),$statistics->sum('rt_bss'),$statistics->sum('rt_credit'),$statistics->sum('rt_gratuit'),$statistics->sum('rt_hef'),$statistics->sum('rt_indigent')];


        /* Entrant Charts */
        $entrant_chart->labels(['Payant','NFSS','Forfait','Gratuit','HEF','Indigent']);
        $entrant_chart->dataset('Entrants', 'doughnut', $entrant)->backgroundColor(['blue','green','orange','red','pink','yellow']);
        $entrant_chart->displayAxes(false);
        $entrant_chart->displayLegend(true);

        /* Restant Charts */
        $restant_chart->labels(['Payant','NFSS','Forfait','Gratuit','HEF','Indigent']);
        $restant_chart->dataset('Entrants', 'doughnut', $restant)->backgroundColor(['blue','green','orange','red','pink','yellow']);
        $restant_chart->displayAxes(false);
        $restant_chart->displayLegend(true);




        return view('home',compact('entrant_chart','restant_chart','duties','statistics'));
    }
}
