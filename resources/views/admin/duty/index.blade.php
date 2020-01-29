@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">បញ្ជីយាមប្រចាំការ</h3>
    @can('staff_create')
        <p>
            <a href="{{ route('admin.duty.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

        </p>
    @endcan

    {{--@can('staff_delete')--}}
        {{--<p>--}}
        {{--<ul class="list-inline">--}}
            {{--<li><a href="{{ route('admin.staff.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |--}}
            {{--<li><a href="{{ route('admin.staff.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>--}}
        {{--</ul>--}}
        {{--</p>--}}
    {{--@endcan--}}


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($duties) > 0 ? 'datatable' : '' }} ">
                <thead>
                <tr>
                    {{--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>--}}
                    <th>កាលបរិច្ឆេទ</th>
                    <th>ថ្នាក់ដឹកនាំ</th>
                    <th>នាយដឺកា</th>
                    <th>នាយសាល</th>
                    <th>ចំនួនគ្រែ</th>
                    <th>អ្នកជំងឺសរុប</th>
                    <th>គ្រែនៅសល់</th>
                    <th>Payants</th>

                        <th>&nbsp;</th>

                </tr>
                </thead>

                <tbody>
                @if (count($duties) > 0)
                    @foreach ($duties as $duty)
                        <tr data-entry-id="{{ $duty->id }}">
                            {{--<td></td>--}}
                            <td field-key='date'>{{ date('d-m-Y',strtotime($duty->date))}}</td>
                            <td field-key='board_duty_id'>{{$duty->staff_board->title->title_kh. ' ' .$duty->staff_board->name_kh }}</td>
                            <td field-key='chef_duty'>{{ $duty->staff_qart->title->title_kh. ' ' .$duty->staff_qart->name_kh }}</td>
                            <td field-key='chef_salle'>{{ $duty->staff_salle->title->title_kh. ' ' .$duty->staff_salle->name_kh }}</td>
                            <td field-key='beds'>{{ $duty->beds }}</td>
                            <td field-key='restants'>{{ $duty->restants }}</td>
                            <td field-key='dispo'>{{ $duty->dispo }}</td>
                            <td field-key='payants'>{{ $duty->payants}}</td>


                                <td>

                                        <a href="{{ route('admin.duty.show',[$duty->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                        <a href="{{ route('admin.duty.edit',[$duty->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.duty.destroy', $duty->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                </td>

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
        {{--@can('staff_delete')--}}
            {{--@if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.staff.mass_destroy') }}'; @endif--}}
        {{--@endcan--}}

    </script>
@endsection
