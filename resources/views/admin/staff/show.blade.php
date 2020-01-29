@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.staff.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.staff.fields.title')</th>
                            <td field-key='title'>{{ $staff->title->title_kh ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.name')</th>
                            <td field-key='name'>{{ $staff->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.name-kh')</th>
                            <td field-key='name_kh'>{{ $staff->name_kh }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.gender')</th>
                            <td field-key='gender'>{{ $staff->gender }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.dob')</th>
                            <td field-key='dob'>{{ $staff->dob }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.staff-code')</th>
                            <td field-key='staff_code'>{{ $staff->staff_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.phone')</th>
                            <td field-key='phone'>{{ $staff->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.email')</th>
                            <td field-key='email'>{{ $staff->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.department-code')</th>
                            <td field-key='department_code'>{{ $staff->department_code->name_kh ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.staff.fields.active')</th>
                            <td field-key='active'>{{ Form::checkbox("active", 1, $staff->active == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.staff.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
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
