@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.departments.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.departments.fields.name')</th>
                            <td field-key='name'>{{ $department->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.departments.fields.name-kh')</th>
                            <td field-key='name_kh'>{{ $department->name_kh }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.departments.fields.abr')</th>
                            <td field-key='abr'>{{ $department->abr }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.departments.fields.beds')</th>
                            <td field-key='beds'>{{ $department->beds }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.departments.fields.description')</th>
                            <td field-key='description'>{{ $department->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.departments.fields.order')</th>
                            <td field-key='order'>{{ $department->order }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.departments.fields.active')</th>
                            <td field-key='active'>{{ Form::checkbox("active", 1, $department->active == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">

<li role="presentation" class="active"><a href="#staff" aria-controls="staff" role="tab" data-toggle="tab">Staff</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="staff">
<table class="table table-bordered table-striped {{ count($staff) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.staff.fields.title')</th>
                        <th>@lang('quickadmin.staff.fields.name')</th>
                        <th>@lang('quickadmin.staff.fields.name-kh')</th>
                        <th>@lang('quickadmin.staff.fields.gender')</th>
                        <th>@lang('quickadmin.staff.fields.dob')</th>
                        <th>@lang('quickadmin.staff.fields.staff-code')</th>
                        <th>@lang('quickadmin.staff.fields.phone')</th>
                        <th>@lang('quickadmin.staff.fields.email')</th>
                        <th>@lang('quickadmin.staff.fields.department-code')</th>
                        <th>@lang('quickadmin.staff.fields.active')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($staff) > 0)
            @foreach ($staff as $staff)
                <tr data-entry-id="{{ $staff->id }}">
                    <td field-key='title'>{{ $staff->title->title_kh ?? '' }}</td>
                                <td field-key='name'>{{ $staff->name }}</td>
                                <td field-key='name_kh'>{{ $staff->name_kh }}</td>
                                <td field-key='gender'>{{ $staff->gender }}</td>
                                <td field-key='dob'>{{ $staff->dob }}</td>
                                <td field-key='staff_code'>{{ $staff->staff_code }}</td>
                                <td field-key='phone'>{{ $staff->phone }}</td>
                                <td field-key='email'>{{ $staff->email }}</td>
                                <td field-key='department_code'>{{ $staff->department_code->name_kh ?? '' }}</td>
                                <td field-key='active'>{{ Form::checkbox("active", 1, $staff->active == 1 ? true : false, ["disabled"]) }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('staff_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.staff.restore', $staff->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('staff_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.staff.perma_del', $staff->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('staff_view')
                                    <a href="{{ route('admin.staff.show',[$staff->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('staff_edit')
                                    <a href="{{ route('admin.staff.edit',[$staff->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('staff_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.staff.destroy', $staff->id])) !!}
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
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.departments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


