<?php

namespace App\Http\Controllers\Admin;

use App\Charts\DailyChart;
use App\Duty;
use App\Staff;
use App\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duties=Duty::orderBy('date','desc')->get();
        $staff=Staff::all();

        return view('admin.reports.index', compact('duties','staff'));
    }

    public function monthly_report()
    {
//        dd($request->all());
        $entrant_chart=new DailyChart();
        $restant_chart=new DailyChart();
        $fromdate=date("Y-m-d", strtotime("yesterday"));
        $todate=date("Y-m-d", strtotime("yesterday"));
        $duties=Duty::where('date','=',$fromdate)->first();

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

        return view('admin.reports.monthly_report',compact('entrant_chart','restant_chart','duties','statistics','fromdate','todate'));
    }

    public function monthly_report_view(Request $request)
    {
        $fromdate=date("Y-m-d", strtotime($request->fromdate));
        $todate=date("Y-m-d", strtotime($request->todate));

        $entrant_chart=new DailyChart();
        $restant_chart=new DailyChart();
        $c=date("Y-m-d", strtotime("yesterday"));
        $duties=Duty::whereBetween('date',[$fromdate,$todate])->get();
        $duties_id=Duty::whereBetween('date',[$fromdate,$todate])->get(['id']);

//        dd($duties);

        if(!$duties){
            return view('welcome');
        }

//        $statistics=$duties->statistic()->get();
        $statistics=Statistic::whereIn('duty_id',$duties_id)->get();

//        dd($statistics);

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

        return view('admin.reports.monthly_report',compact('entrant_chart','restant_chart','duties','statistics','fromdate','todate'));
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
