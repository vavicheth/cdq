<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Table lis member</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('print/style_print.css')}}">
</head>

<body style="background: rgb(204,204,204);">

<page size='A4' layout='landscape'>
    <br>
    <div><a class="pl-4">{{date('d-m-Y',strtotime($duty->date))}}</a><br></div>
    <div align="center"  >
        <a class='fcontent'>{{$duty->date_kh}}</a><br>
        <div style="width: 120px; align-self: center">
            <hr>
        </div>
    </div>

    <div class="pr-5" style="width: 250px; float: right; font-size: 11px">
        <a class='fcontent_arial_11'><b>Nom de Lits: </b> {{$duty->beds}}</a>
        <a class='fcontent_arial_11'><br> <b>Restants: </b> {{$duty->restants}}</a><br>
        <a class='fcontent_arial_11'><b>Lits Dispo: </b> {{$duty->dispo}}</a><br>
        <a class='fcontent_arial_11'><b>Payants: </b> {{$duty->payants}}</a><br>
    </div>
    <div class="pl-5 ml-2" style="width: 50%">
        <a class='fcontent_arial_12'><b>ថ្នាក់ដឹកនាំ: </b> {{$duty->staff_board->title->title_kh. ' ' .$duty->staff_board->name_kh }}</a><br>
        <a class='fcontent_arial_12'><b>នាយដឺការ: </b> {{$duty->staff_qart->title->title_kh. ' ' .$duty->staff_qart->name_kh }}</a><br>
        <a class='fcontent_arial_12'><b>នាយសាល: </b> {{$duty->staff_salle->title->title_kh. ' ' .$duty->staff_salle->name_kh }}</a>
    </div>


    <div id="table" class=" p-2 clearfix">
        <table class="table-bordered ml-5 mr-5 mb-1 fcontent_arial_11" width="90%" style="font-size: 11px">
            <thead style="vertical-align: center !important; font-weight: bold !important;">
            <tr align="center">
                <th rowspan="2">Services</th>
                <th rowspan="2">Lits</th>
                <th colspan="7">Entrants</th>
                <th rowspan="2" width="4%">Sor tants</th>
                <th colspan="7">Réstants</th>
                <th rowspan="2">Dispo</th>
                <th rowspan="2">TOL</th>
                <th rowspan="2">Décé</th>
                <th rowspan="2">Autre</th>

            </tr>
            <tr align="center">
                <th width="4%">P</th>
                <th width="4%">N</th>
                <th width="4%">F</th>
                <th width="4%">G</th>
                <th width="4%">H</th>
                <th width="4%">I</th>
                <th width="4%">Total</th>
                <th width="4%">P</th>
                <th width="4%">N</th>
                <th width="4%">F</th>
                <th width="4%">G</th>
                <th width="4%">H</th>
                <th width="4%">I</th>
                <th width="4%">Total</th>
            </tr>
            </thead>

            <tbody>
            @if (count($statistics) > 0)
                @foreach ($statistics as $statistic)
                    <tr align="right" data-entry-id="{{ $statistic->id }}">
                        <td field-key='department_id' align="left">{{ $statistic->department->name }}</td>
                        <td field-key='beds'>{{ $statistic->department->beds }}</td>
                        <td field-key='et_payant'>{{ $statistic->et_payant }}</td>
                        <td field-key='et_bss'>{{ $statistic->et_bss }}</td>
                        <td field-key='et_credit'>{{ $statistic->et_credit }}</td>
                        <td field-key='et_gratuit'>{{ $statistic->et_gratuit }}</td>
                        <td field-key='et_hef'>{{ $statistic->et_hef }}</td>
                        <td field-key='et_indigent'>{{  $statistic->et_indigent }}</td>
                        <td field-key='et_total'>{{ App\Statistic::where('id','=',$statistic->id)->select(DB::raw('sum(et_payant + et_gratuit + et_credit + et_bss + et_hef + et_indigent) as et_total'))->pluck('et_total')->first() }}</td>
                        <td field-key='sortant'>{{ $statistic->sortant }}</td>
                        <td field-key='rt_payant'>{{ $statistic->rt_payant }}</td>
                        <td field-key='rt_bss'>{{ $statistic->rt_bss }}</td>
                        <td field-key='rt_credit'>{{ $statistic->rt_credit }}</td>
                        <td field-key='rt_gratuit'>{{ $statistic->rt_gratuit }}</td>
                        <td field-key='rt_hef'>{{ $statistic->rt_hef }}</td>
                        <td field-key='rt_indigent'>{{  $statistic->rt_indigent }}</td>
                        <td field-key='rt_total'>{{ App\Statistic::where('id','=',$statistic->id)->select(DB::raw('sum(rt_payant + rt_gratuit + rt_credit + rt_bss + rt_hef + rt_indigent) as rt_total'))->pluck('rt_total')->first() }}</td>
                        <td field-key='disop'>{{ $statistic->dispo }}</td>
                        <td field-key='tol'>{{number_format(((App\Statistic::where('id','=',$statistic->id)->select(DB::raw('sum(rt_payant + rt_gratuit + rt_credit + rt_bss + rt_hef + rt_indigent) as rt_total'))->pluck('rt_total')->first())/($statistic->beds))* 100),2}}%</td>
                        <td bgcolor="{{$statistic->dece > 0 ? '#d3d3d3' : '' }}" field-key='dece'>{{ $statistic->dece}}</td>
                        <td bgcolor="" field-key='autre'></td>
                    </tr>
                @endforeach
            @endif
            </tbody>

            <tfoot align="right" style="font-weight: 900">
            <td>Total:</td>
            <td>{{$statistics->sum('beds')}}</td>
            <td>{{$statistics->sum('et_payant')}}</td>
            <td>{{$statistics->sum('et_bss')}}</td>
            <td>{{$statistics->sum('et_credit')}}</td>
            <td>{{$statistics->sum('et_gratuit')}}</td>
            <td>{{$statistics->sum('et_hef')}}</td>
            <td>{{$statistics->sum('et_indigent')}}</td>
            <td>{{$statistics->sum('et_payant') + $statistics->sum('et_bss') + $statistics->sum('et_credit') + $statistics->sum('et_gratuit') + $statistics->sum('et_hef') + $statistics->sum('et_indigent')}}</td>
            <td>{{$statistics->sum('sortant')}}</td>
            <td>{{$statistics->sum('rt_payant')}}</td>
            <td>{{$statistics->sum('rt_bss')}}</td>
            <td>{{$statistics->sum('rt_credit')}}</td>
            <td>{{$statistics->sum('rt_gratuit')}}</td>
            <td>{{$statistics->sum('rt_hef')}}</td>
            <td>{{$statistics->sum('rt_indigent')}}</td>
            <td>{{$statistics->sum('rt_payant') + $statistics->sum('rt_bss') + $statistics->sum('rt_credit') + $statistics->sum('rt_gratuit') + $statistics->sum('rt_hef') + $statistics->sum('rt_indigent')}}</td>
            <td>{{$statistics->sum('dispo')}}</td>
            @if($statistics->sum('beds') == 0)
                <td></td>
            @else
                <td>{{number_format((($statistics->sum('rt_payant') + $statistics->sum('rt_bss') + $statistics->sum('rt_credit') + $statistics->sum('rt_gratuit') + $statistics->sum('rt_hef') + $statistics->sum('rt_indigent'))/($statistics->sum('beds')))* 100),2}}%</td>
            @endif
            <td>{{$statistics->sum('dece')}}</td>
            <td></td>
            </tfoot>

        </table>
    </div>

    <div id="examen1" class="ml-5 mr-5 float-right" style="white-space: pre-line; width: 40%; font-size: 11px" >
        {{$duty->examen1}}
    </div>

    <div id="examen2" class="pl-3 ml-5 mr-5" style="white-space: pre-line; width: 40%; font-size: 11px">
        {{$duty->examen2}}
    </div>
    <div class="pl-5 ml-2 mr-5 mt-3" style="white-space: pre-line; font-size: 12px">
        <p class="ml-5">Direction générale &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;Chef de quart</p> <br>

        <a style="font-size: 11px">Note: P=Payant, N=NSSF, F=Forfaits, G=Gratuit, H=HEF, I=Indigent</a>
    </div>


</page>


<page size='A4' layout='landscape'>
    <br>
    <div align="center"  >
        <a class='title2'>បញ្ជីរាយនាមបុគ្គលិកយាមប្រចាំការ</a><br>
    </div>
    <div class="m-2 mr-5 pr-5" style="font-size: 11px">
        <ul>
            @foreach($duty->staff()->groupBy('department_code_id')->pluck('department_code_id')->toArray() as $dep)
                <li>
                    <b>{{App\Department::findOrFail($dep)->name_kh}}:</b>

                    @foreach($duty->staff()->where('department_code_id','=',$dep)->get() as $st )
                        &nbsp;{{$st->name_kh}},
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>




</page>


</body>
</html>
