@extends('layouts.app')

@section('content')


    <div class="row">

        <div class="col-12 col-sm-12 col-md-12">
            <!-- Report By Invoice State -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Report by Patient type</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open(['method' => 'POST', 'route' => ['admin.reports.monthly_report_view']]) !!}
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            {!! Form::label('fromdate', 'From Date'.'*', ['class' => 'control-label']) !!}
                            {!! Form::text('fromdate', old('fromdate'), ['class' => 'form-control fromdate', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('fromdate'))
                                <p class="help-block">
                                    {{ $errors->first('fromdate') }}
                                </p>
                            @endif
                        </div>

                        <div class="col-xs-6 form-group">
                            {!! Form::label('todate', 'To Date'.'*', ['class' => 'control-label']) !!}
                            {!! Form::text('todate', old('todate'), ['class' => 'form-control todate', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('todate'))
                                <p class="help-block">
                                    {{ $errors->first('todate') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 form-group">
                            {!! Form::submit('View', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">

                </div>
                <!-- /.footer -->
            </div>
            <!-- /.box -->
        </div>


        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon elevation-1" style="background-color: #00a65a"><i style="color: white"
                                                                                             class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Entrants</span>
                    <span class="info-box-number">
                        {{$statistics->sum('et_payant') + $statistics->sum('et_bss') + $statistics->sum('et_credit') + $statistics->sum('et_gratuit') + $statistics->sum('et_hef') + $statistics->sum('et_indigent')}}
                    </span>
                    <span class="sm badge">{{date('d-M-Y',strtotime($fromdate)) . ' to ' . date('d-M-Y',strtotime($todate)) }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon elevation-1" style="background-color: grey"><i style="color: white"
                                                                                          class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Sortants</span>
                    <span class="info-box-number">
                        {{$statistics->sum('sortant')}}
                    </span>
                    <span class="sm badge">{{date('d-M-Y',strtotime($fromdate)) . ' to ' . date('d-M-Y',strtotime($todate)) }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon elevation-1" style="background-color: #00c0ef"><i style="color: white"
                                                                                             class="fa fa-users"></i></span>

                <div class="info-box-content">

                    <span class="info-box-text">Restants</span>
                    <span class="info-box-number">
                        {{$statistics->sum('rt_payant') + $statistics->sum('rt_bss') + $statistics->sum('rt_credit') + $statistics->sum('rt_gratuit') + $statistics->sum('rt_hef') + $statistics->sum('rt_indigent')}}
                    </span>
                    <span class="sm badge">{{date('d-M-Y',strtotime($fromdate)) . ' to ' . date('d-M-Y',strtotime($todate)) }}</span>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        {{--<div class="clearfix hidden-md-up"></div>--}}


        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon elevation-1" style="background-color: red"><i style="color: white"
                                                                                         class="fa fa-user-circle"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Decé</span>
                    <span class="info-box-number">{{$statistics->sum('dece')}}</span>
                    <span class="sm badge">{{date('d-M-Y',strtotime($fromdate)) . ' to ' . date('d-M-Y',strtotime($todate)) }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <i class="fa fa-line-chart"></i>
                    <h3 class="box-title">Entrants</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-dismissible">
                        {!! $entrant_chart->container() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <i class="fa fa-line-chart"></i>
                    <h3 class="box-title">Restants</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-dismissible">
                        {!! $restant_chart->container() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>


@endsection

@section('javascript')
    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function () {
            moment.updateLocale('{{ App::getLocale() }}', {
                week: {dow: 1} // Monday is the first day of the week
            });

            $('.fromdate').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });

        });

        $(function () {
            moment.updateLocale('{{ App::getLocale() }}', {
                week: {dow: 1} // Monday is the first day of the week
            });

            $('.todate').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });

        });

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $entrant_chart->script() !!}
    {!! $restant_chart->script() !!}



@endsection
