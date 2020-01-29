@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <i class="fa fa-line-chart"></i>
                    <h3 class="box-title">Summary</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-dismissible">
                        {!! $summary_chart->render() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <i class="fa fa-line-chart"></i>
                    <h3 class="box-title">Entrants</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-dismissible">
                        {!! $entrant_chart->render() !!}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-line-chart"></i>
                    <h3 class="box-title">Restants</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-dismissible">
                        {!! $restant_chart->render() !!}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

@endsection
