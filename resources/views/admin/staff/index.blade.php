@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.staff.title')</h3>
    @can('staff_create')
    <p>
        <a href="{{ route('admin.staff.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

    </p>
    @endcan

    @can('staff_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.staff.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.staff.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($staff) > 0 ? 'datatable' : '' }} @can('staff_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('staff_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('staff_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='title'>{{ $staff->title->title_kh ?? '' }}</td>
                                <td field-key='name'>{{ $staff->name }}</td>
                                <td field-key='name_kh'>{{ $staff->name_kh }}</td>
                                <td field-key='gender'>{{ $staff->gender==1? 'ប្រុស':'ស្រី' }}</td>
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
@stop

@section('javascript')
    <script>
        @can('staff_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.staff.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
