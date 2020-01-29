@extends('layouts.app')

@section('content')
    <h3 class="page-title">បញ្ជីយាមប្រចាំការ</h3>
    {!! Form::model($duties, ['method' => 'PUT', 'route' => ['admin.duty.update', $duties->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', 'Date'.'', ['class' => 'control-label']) !!}
                    {!! Form::text('date' ,old('date', date('d-m-Y', strtotime($duties->date))) , ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date_kh', 'Date in Khmer'.'', ['class' => 'control-label']) !!}
                    {!! Form::text('date_kh', old('date_kh',$duties->date_kh), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date_kh'))
                        <p class="help-block">
                            {{ $errors->first('date_kh') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('board_duty_id', 'Board de Qart'.'', ['class' => 'control-label']) !!}
                    {!! Form::select('board_duty_id', $staffs, old('board_duty_id',$duties->board_duty_id), ['class' => 'form-control select2','placeholder' => 'Please select one...']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('board_duty_id'))
                        <p class="help-block">
                            {{ $errors->first('board_duty_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('chef_duty_id', 'Chef de Qart'.'', ['class' => 'control-label']) !!}
                    {!! Form::select('chef_duty_id', $staffs, old('chef_duty_id',$duties->chef_duty_id), ['class' => 'form-control select2','placeholder' => 'Please select one...']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('chef_duty_id'))
                        <p class="help-block">
                            {{ $errors->first('chef_duty_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('chef_salle_id', 'Chef de Salle'.'', ['class' => 'control-label']) !!}
                    {!! Form::select('chef_salle_id', $staffs, old('chef_salle_id',$duties->chef_salle_id), ['class' => 'form-control select2','placeholder' => 'Please select one...']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('chef_salle_id'))
                        <p class="help-block">
                            {{ $errors->first('chef_salle_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('beds', 'Beds Total'.'', ['class' => 'control-label']) !!}
                    {!! Form::number('beds', old('beds',$duties->beds), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('beds'))
                        <p class="help-block">
                            {{ $errors->first('beds') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('restants', 'Restants'.'', ['class' => 'control-label']) !!}
                    {!! Form::number('restants', old('restants',$duties->restants), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('restants'))
                        <p class="help-block">
                            {{ $errors->first('restants') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dispo', 'Dispo'.'', ['class' => 'control-label']) !!}
                    {!! Form::number('dispo', old('dispo',$duties->dispo), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dispo'))
                        <p class="help-block">
                            {{ $errors->first('dispo') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('payants', 'Payants'.'', ['class' => 'control-label']) !!}
                    {!! Form::number('payants', old('payants',$duties->payants), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('payants'))
                        <p class="help-block">
                            {{ $errors->first('payants') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('examen1', 'Examen1'.'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('examen1', old('examen1',$duties->examen1), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('examen1'))
                        <p class="help-block">
                            {{ $errors->first('examen1') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('examen2', 'Examen2'.'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('examen2', old('examen2',$duties->examen2), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('examen2'))
                        <p class="help-block">
                            {{ $errors->first('examen2') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('duty_staff', 'Staff Qart'.'', ['class' => 'control-label']) !!}
                    {!! Form::select('duty_staff[]', $staffs, old('duty_staff',$duties->staff()->pluck('staff_id')->toArray()), ['multiple'=>true,'class' => 'form-control select2']) !!}

                    <p class="help-block"></p>
                    @if($errors->has('duty_staff'))
                        <p class="help-block">
                            {{ $errors->first('duty_staff') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });

        });
    </script>

@stop
