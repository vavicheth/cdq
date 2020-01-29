@extends('layouts.app')

<style>

    .select2-container {
        width: 100% !important;
        padding: 0;
    }

</style>


@section('content')
    <h3 class="page-title">បញ្ជីយាមប្រចាំការ</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th class="col-md-2">Date</th>
                            <td field-key='date'>{{date('d-m-Y',strtotime($duty->date))}}</td>
                        </tr>
                        <tr>
                            <th class="col-md-2">Date</th>
                            <td field-key='date_kh'>{{ $duty->date_kh }}</td>
                        </tr>
                        <tr>
                            <th>Board de Qart</th>
                            <td field-key='board_duty_id'>{{$duty->staff_board->title->title_kh. ' ' .$duty->staff_board->name_kh }}</td>
                        </tr>
                        <tr>
                            <th>Chef de Qart </th>
                            <td field-key='chef_duty_id'>{{$duty->staff_qart->title->title_kh. ' ' .$duty->staff_qart->name_kh }}</td>
                        </tr>
                        <tr>
                            <th>Chef de Salle</th>
                            <td field-key='chef_salle_id'>{{$duty->staff_salle->title->title_kh. ' ' .$duty->staff_salle->name_kh }}</td>
                        </tr>
                        <tr>
                            <th>Beds Total</th>
                            <td field-key='beds'>{{ $duty->beds }}</td>
                        </tr>
                        <tr>
                            <th>Restants</th>
                            <td field-key='restants'>{{ $duty->restants }}</td>
                        </tr>
                        <tr>
                            <th>Dispo</th>
                            <td field-key='dispo'>{{ $duty->dispo }}</td>
                        </tr>
                        <tr>
                            <th>Payants</th>
                            <td field-key='payants'>{{ $duty->payants }}</td>
                        </tr>
                        <tr>
                            <th>Examen1</th>
                            <td field-key='examen1'><span style="white-space: pre-line"> {{$duty->examen1}}</span> </td>
                        </tr>
                        <tr>
                            <th>Examen2</th>
                            <td field-key='examen2'><span style="white-space: pre-line">{{ $duty->examen2 }}</span></td>
                        </tr>

                        <tr>
                            <td colspan="2" field-key='staff_duty'>
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

                            </td>
                        </tr>

                    </table>


                </div>
            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#staff" aria-controls="staff" role="tab" data-toggle="tab">Data Service</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="staff">
                    <br>
                    <button type="button" class="btn btn-success p-4" data-toggle="modal" data-target="#addnewModal">
                        @lang('quickadmin.qa_add_new')
                    </button>

                    <div class="modal fade" id="addnewModal" tabindex="-1" role="dialog" aria-labelledby="addnewModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="addnewModalLabel">Add new data</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {!! Form::open(['method' => 'POST', 'route' => ['admin.statistic.store']]) !!}

                                <div class="modal-body">
                                    <input hidden name="duty_id" value="{{$duty->id}}">

                                    <div class="col-sm-12">

                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                {!! Form::label('department_id', 'Department/Services', ['class' => 'control-label']) !!}
                                                {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control','id'=>'selectdepartment']) !!}
                                                <p class="help-block"></p>
                                                @if($errors->has('department_id'))
                                                    <p class="help-block">
                                                        {{ $errors->first('department_id') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>


                                        <!-- Entrants -->
                                        <div class="col-11 col-sm-6">
                                            <p><b>Entrants:</b></p>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('et_payant', 'Payant'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('et_payant', old('et_payant',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('et_payant'))
                                                            <p class="help-block">
                                                                {{ $errors->first('et_payant') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('et_gratuit', 'Gratuit'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('et_gratuit', old('et_gratuit',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('et_gratuit'))
                                                            <p class="help-block">
                                                                {{ $errors->first('et_gratuit') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('et_credit', 'Credit'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('et_credit', old('et_credit',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('et_credit'))
                                                            <p class="help-block">
                                                                {{ $errors->first('et_credit') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('et_bss', 'NSSF'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('et_bss', old('et_bss',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('et_bss'))
                                                            <p class="help-block">
                                                                {{ $errors->first('et_bss') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('et_hef', 'HEF'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('et_hef', old('et_hef',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('et_hef'))
                                                            <p class="help-block">
                                                                {{ $errors->first('et_hef') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('et_indigent', 'Indigent'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('et_indigent', old('et_indigent',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('et_indigent'))
                                                            <p class="help-block">
                                                                {{ $errors->first('et_indigent') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Entrants -->


                                        <!-- Restants -->
                                        <div class="col-11 col-sm-6">
                                            <p><b>Réstants:</b></p>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('rt_payant', 'Payant'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('rt_payant', old('rt_payant',0), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_payant']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('rt_payant'))
                                                            <p class="help-block">
                                                                {{ $errors->first('rt_payant') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('rt_gratuit', 'Gratuit'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('rt_gratuit', old('rt_gratuit',0), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_gratuit']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('rt_gratuit'))
                                                            <p class="help-block">
                                                                {{ $errors->first('rt_gratuit') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('rt_credit', 'Credit'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('rt_credit', old('rt_credit',0), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_credit']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('rt_credit'))
                                                            <p class="help-block">
                                                                {{ $errors->first('rt_credit') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('rt_bss', 'NSSF'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('rt_bss', old('rt_bss',0), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_bss']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('rt_bss'))
                                                            <p class="help-block">
                                                                {{ $errors->first('rt_bss') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('rt_hef', 'HEF'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('rt_hef', old('rt_hef',0), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_hef']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('rt_hef'))
                                                            <p class="help-block">
                                                                {{ $errors->first('rt_hef') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 form-group">
                                                        {!! Form::label('rt_indigent', 'Indigent'.'', ['class' => 'control-label']) !!}
                                                        {!! Form::number('rt_indigent', old('rt_indigent',0), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_indigent']) !!}
                                                        <p class="help-block"></p>
                                                        @if($errors->has('rt_indigent'))
                                                            <p class="help-block">
                                                                {{ $errors->first('rt_indigent') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Entrants -->

                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                {!! Form::label('sortant', 'Sortant'.'', ['class' => 'control-label']) !!}
                                                {!! Form::number('sortant', old('sortant',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                <p class="help-block"></p>
                                                @if($errors->has('sortant'))
                                                    <p class="help-block">
                                                        {{ $errors->first('sortant') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                {!! Form::label('sida', 'SIDA'.'', ['class' => 'control-label']) !!}
                                                {!! Form::number('sida', old('sida',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                <p class="help-block"></p>
                                                @if($errors->has('sida'))
                                                    <p class="help-block">
                                                        {{ $errors->first('sida') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                {!! Form::label('hiv', 'HIV'.'', ['class' => 'control-label']) !!}
                                                {!! Form::number('hiv', old('hiv',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                <p class="help-block"></p>
                                                @if($errors->has('hiv'))
                                                    <p class="help-block">
                                                        {{ $errors->first('hiv') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 form-group">
                                                {!! Form::label('dece', 'Décéder'.'', ['class' => 'control-label']) !!}
                                                {!! Form::number('dece', old('dece',0), ['class' => 'form-control', 'placeholder' => '']) !!}
                                                <p class="help-block"></p>
                                                @if($errors->has('dece'))
                                                    <p class="help-block">
                                                        {{ $errors->first('dece') }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>


                    <table class="table table-bordered table-striped {{ count($statistics) > 0 ? 'datatable' : '' }}">
                        <thead style="vertical-align: center !important;">
                        <tr align="center">
                            <th rowspan="2">Services</th>
                            <th rowspan="2">Lits</th>
                            <th colspan="7">Entrants</th>
                            <th rowspan="2" width="4%">Sor tants</th>
                            <th colspan="7">Réstants</th>
                            <th rowspan="2">Dispo</th>
                            <th rowspan="2">TOL</th>
                            <th rowspan="2">Décé</th>
                            <th rowspan="2" width="10%">Action</th>

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
                                    <td field-key='beds'>{{ $statistic->beds }}</td>
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

                                    @if( request('show_deleted') == 1 )
                                        <td align="left">
                                            @can('staff_delete')
                                                {!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'POST',
                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                'route' => ['admin.staff.restore', $statistic->id])) !!}
                                                {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                            @can('staff_delete')
                                                {!! Form::open(array(
                'style' => 'display: inline-block;',
                'method' => 'DELETE',
                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                'route' => ['admin.staff.perma_del', $statistic->id])) !!}
                                                {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    @else
                                        <td align="left">
                                            @can('staff_view')
                                                <a href="{{ route('admin.statistic.show',[$statistic->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                            @endcan
                                            @can('staff_edit')
                                                <a href="{{ route('admin.statistic.edit',[$statistic->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                            @endcan
                                            @can('staff_delete')
                                                {!! Form::open(array(
                                                                                        'style' => 'display: inline-block;',
                                                                                        'method' => 'DELETE',
                                                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                        'action'=>['Admin\StatisticController@destroy',$statistic->id])) !!}
                                                {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="15">@lang('quickadmin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>

                        <tfoot align="right" style="font-weight: bold">
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

                        </tfoot>



                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.duty.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
            <a href="{{ url('/admin/duty/print/'.$duty->id)}}" class="btn btn-success pull-right"><i class="fa fa-print"></i>  Print</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>

        $("#dispo").focus(function(){
            var sum1=Number($('#rt_payant').val()) + Number($('#rt_gratuit').val()) + Number($('#rt_credit').val()) + Number($('#rt_bss').val()) + Number($('#rt_hef').val()) + Number($('#rt_indigent').val());
            sum1=Number($('#beds').val()) - sum1;
            $('#dispo').val(sum1);
        });


        $(function(){

            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });

        });

        $(document).ready(function(){
            $('#selectdepartment').on('change', function (e) {
                        console.log(this.value);
            });
        });



    </script>

@stop


