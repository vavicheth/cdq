<?php
namespace App\Http\Controllers\Admin;

use App\Duty;
use App\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Charts\DutyChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duties=Duty::all();
//        $restant_chart = new DutyChart();
//        $entrant_chart = new DutyChart();
//        $summary_chart= new DutyChart();
//
        $rt_payant=array();
        $rt_nfss=array();
        $rt_credit=array();
        $rt_gratuit=array();
        $rt_hef=array();
        $rt_indigent=array();

        $entrant=array();
        $sortant=array();
        $restant=array();
        $dispo=array();
        $sida=array();
        $hiv=array();

        $et_payant=array();
        $et_nfss=array();
        $et_credit=array();
        $et_gratuit=array();
        $et_hef=array();
        $et_indigent=array();


        foreach ($duties as $duty){
            $rt_payant[]=$duty->statistic()->sum('rt_payant');
            $rt_nfss[]=$duty->statistic()->sum('rt_bss');
            $rt_credit[]=$duty->statistic()->sum('rt_credit');
            $rt_gratuit[]=$duty->statistic()->sum('rt_gratuit');
            $rt_hef[]=$duty->statistic()->sum('rt_hef');
            $rt_indigent[]=$duty->statistic()->sum('rt_indigent');

            $dispo[]=$duty->statistic()->sum('dispo');
            $sida[]=$duty->statistic()->sum('sida');
            $hiv[]=$duty->statistic()->sum('hiv');
            $sortant[]=$duty->statistic()->sum('sortant');
            $entrant[]=$duty->statistic()->sum('et_payant') + $duty->statistic()->sum('et_bss') + $duty->statistic()->sum('et_credit') + $duty->statistic()->sum('et_gratuit') + $duty->statistic()->sum('et_hef') + $duty->statistic()->sum('et_indigent');
            $restant[]=$duty->statistic()->sum('rt_payant') + $duty->statistic()->sum('rt_bss') + $duty->statistic()->sum('rt_credit') + $duty->statistic()->sum('rt_gratuit') + $duty->statistic()->sum('rt_hef') + $duty->statistic()->sum('rt_indigent');

            $et_payant[]=$duty->statistic()->sum('et_payant');
            $et_nfss[]=$duty->statistic()->sum('et_bss');
            $et_credit[]=$duty->statistic()->sum('et_credit');
            $et_gratuit[]=$duty->statistic()->sum('et_gratuit');
            $et_hef[]=$duty->statistic()->sum('et_hef');
            $et_indigent[]=$duty->statistic()->sum('et_indigent');

        }

        $summary_chart= app()->chartjs
            ->name('Summary')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($duties->pluck('date')->toArray())
            ->datasets([
                [
                    "label" => "Entrants",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "blue",
                    "pointBorderColor" => "blue",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $entrant,
                ],
                [
                    "label" => "Sortant",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "Orange",
                    "pointBorderColor" => "Orange",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $sortant,
                ],
                [
                    "label" => "Restant",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "#00b2fc",
                    "pointBorderColor" => "#00b2fc",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $restant,
                ],
                [
                    "label" => "Dispo",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "green",
                    "pointBorderColor" => "green",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $dispo,
                ],
                [
                    "label" => "SIDA",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "pink",
                    "pointBorderColor" => "pink",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $sida,
                ],
                [
                    "label" => "HIV",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "yellow",
                    "pointBorderColor" => "yellow",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $hiv,
                ]
            ])
            ->options([]);

        /* Entrant Charts */
        $entrant_chart= app()->chartjs
            ->name('Entrant')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($duties->pluck('date')->toArray())
            ->datasets([
                [
                    "label" => "Payant",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "blue",
                    "pointBorderColor" => "blue",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $et_payant,
                ],
                [
                    "label" => "NFSS",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "Orange",
                    "pointBorderColor" => "Orange",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $et_nfss,
                ],
                [
                    "label" => "Forfait",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "#00b2fc",
                    "pointBorderColor" => "#00b2fc",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $et_credit,
                ],
                [
                    "label" => "Gratuit",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "green",
                    "pointBorderColor" => "green",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $et_gratuit,
                ],
                [
                    "label" => "HEF",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "pink",
                    "pointBorderColor" => "pink",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $et_hef,
                ],
                [
                    "label" => "Indigent",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "yellow",
                    "pointBorderColor" => "yellow",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $et_indigent,
                ]
            ])
            ->options([]);

        /* Entrant Charts */
        $restant_chart= app()->chartjs
            ->name('Restant')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($duties->pluck('date')->toArray())
            ->datasets([
                [
                    "label" => "Payant",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "blue",
                    "pointBorderColor" => "blue",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $rt_payant,
                ],
                [
                    "label" => "NFSS",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "Orange",
                    "pointBorderColor" => "Orange",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $rt_nfss,
                ],
                [
                    "label" => "Forfait",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "#00b2fc",
                    "pointBorderColor" => "#00b2fc",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $rt_credit,
                ],
                [
                    "label" => "Gratuit",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "green",
                    "pointBorderColor" => "green",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $rt_gratuit,
                ],
                [
                    "label" => "HEF",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "pink",
                    "pointBorderColor" => "pink",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $rt_hef,
                ],
                [
                    "label" => "Indigent",
                    'backgroundColor' => "rgba(0,0,0,0)",
                    'borderColor' => "yellow",
                    "pointBorderColor" => "yellow",
                    "pointBackgroundColor" => "white",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $rt_indigent,
                ]
            ])
            ->options([]);


        return view('admin.charts.index', compact('entrant_chart','restant_chart','summary_chart'));


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
