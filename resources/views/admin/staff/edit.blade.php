@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.staff.title')</h3>

    {!! Form::model($staff, ['method' => 'PUT', 'route' => ['admin.staff.update', $staff->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title_id', trans('quickadmin.staff.fields.title').'', ['class' => 'control-label']) !!}
                    {!! Form::select('title_id', $titles, old('title_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title_id'))
                        <p class="help-block">
                            {{ $errors->first('title_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.staff.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name_kh', trans('quickadmin.staff.fields.name-kh').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name_kh', old('name_kh'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name_kh'))
                        <p class="help-block">
                            {{ $errors->first('name_kh') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gender', trans('quickadmin.staff.fields.gender').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gender'))
                        <p class="help-block">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('gender', '1', false, []) !!}
                            Male
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('gender', '2', false, []) !!}
                            Female
                        </label>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dob', trans('quickadmin.staff.fields.dob').'', ['class' => 'control-label']) !!}
                    {!! Form::text('dob', old('dob'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dob'))
                        <p class="help-block">
                            {{ $errors->first('dob') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('staff_code', trans('quickadmin.staff.fields.staff-code').'', ['class' => 'control-label']) !!}
                    {!! Form::text('staff_code', old('staff_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('staff_code'))
                        <p class="help-block">
                            {{ $errors->first('staff_code') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone', trans('quickadmin.staff.fields.phone').'', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.staff.fields.email').'', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department_code_id', trans('quickadmin.staff.fields.department-code').'', ['class' => 'control-label']) !!}
                    {!! Form::select('department_code_id', $department_codes, old('department_code_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('department_code_id'))
                        <p class="help-block">
                            {{ $errors->first('department_code_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('active', trans('quickadmin.staff.fields.active').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, old('active', old('active')), ['required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('active'))
                        <p class="help-block">
                            {{ $errors->first('active') }}
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
