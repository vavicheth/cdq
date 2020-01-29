@extends('layouts.app')

@section('content')
    <h3 class="page-title">ទិន្នន័យតាមផ្នែក</h3>
    {!! Form::model($statistics, ['method' => 'PUT', 'route' => ['admin.statistic.update', $statistics->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <input hidden name="duty_id" value="{{$duty}}">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department_id', 'Department/Services', ['class' => 'control-label']) !!}
                    {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control select2','id'=>'selectdepartment']) !!}
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
                            {!! Form::number('et_payant', old('et_payant'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                            {!! Form::number('et_gratuit', old('et_gratuit'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                            {!! Form::number('et_credit', old('et_credit'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                            {!! Form::number('et_bss', old('et_bss'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                            {!! Form::number('et_hef', old('et_hef'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                            {!! Form::number('et_indigent', old('et_indigent'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                            {!! Form::number('rt_payant', old('rt_payant'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_payant']) !!}
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
                            {!! Form::number('rt_gratuit', old('rt_gratuit'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_gratuit']) !!}
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
                            {!! Form::number('rt_credit', old('rt_credit'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_credit']) !!}
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
                            {!! Form::number('rt_bss', old('rt_bss'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_bss']) !!}
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
                            {!! Form::number('rt_hef', old('rt_hef'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_hef']) !!}
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
                            {!! Form::number('rt_indigent', old('rt_indigent'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'rt_indigent']) !!}
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
                    {!! Form::number('sortant', old('sortant'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::number('sida', old('sida'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::number('hiv', old('hiv'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('dece', 'Déceder'.'', ['class' => 'control-label']) !!}
                    {!! Form::number('dece', old('dece'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
