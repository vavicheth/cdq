@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.title.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.titles.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.title.fields.title').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title for user and staff']) !!}
                    <p class="help-block">Title for user and staff</p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title_kh', trans('quickadmin.title.fields.title-kh').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title_kh', old('title_kh'), ['class' => 'form-control', 'placeholder' => 'Title in Khmer']) !!}
                    <p class="help-block">Title in Khmer</p>
                    @if($errors->has('title_kh'))
                        <p class="help-block">
                            {{ $errors->first('title_kh') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('abr', trans('quickadmin.title.fields.abr').'', ['class' => 'control-label']) !!}
                    {!! Form::text('abr', old('abr'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('abr'))
                        <p class="help-block">
                            {{ $errors->first('abr') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('abr_kh', trans('quickadmin.title.fields.abr-kh').'', ['class' => 'control-label']) !!}
                    {!! Form::text('abr_kh', old('abr_kh'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('abr_kh'))
                        <p class="help-block">
                            {{ $errors->first('abr_kh') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('active', trans('quickadmin.title.fields.active').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, old('active', true), ['required' => '']) !!}
                    <p class="help-block">Title active</p>
                    @if($errors->has('active'))
                        <p class="help-block">
                            {{ $errors->first('active') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

