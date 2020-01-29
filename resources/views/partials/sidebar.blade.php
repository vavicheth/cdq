@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">



            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-tachometer"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user-md"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-list"></i>
                            <span>@lang('quickadmin.user-actions.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>@endcan

            @can('data_basic_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>@lang('quickadmin.data-basic.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('title_access')
                    <li>
                        <a href="{{ route('admin.titles.index') }}">
                            <i class="fa fa-user-circle"></i>
                            <span>@lang('quickadmin.title.title')</span>
                        </a>
                    </li>@endcan

                    @can('department_access')
                    <li>
                        <a href="{{ route('admin.departments.index') }}">
                            <i class="fa fa-building-o"></i>
                            <span>@lang('quickadmin.departments.title')</span>
                        </a>
                    </li>@endcan

                    @can('staff_access')
                    <li>
                        <a href="{{ route('admin.staff.index') }}">
                            <i class="fa fa-user-md"></i>
                            <span>@lang('quickadmin.staff.title')</span>
                        </a>
                    </li>@endcan

                </ul>
            </li>@endcan

            @can('duty_access')
            <li >
                <a href="{{ route('admin.duty.index') }}">
                    <i class="fa fa-h-square"></i>
                    <span class="title">Duty</span>
                </a>
            </li >@endcan

            @can('reports_access')
            <li >
                <a href="{{ route('admin.reports.index') }}">
                    <i class="fa fa-paper-plane"></i>
                    <span class="title">Reports</span>
                </a>
            </li >@endcan

            <li>
                <a href="{{ route('admin.reports.monthly_report') }}">
                    <i class="fa fa-paperclip"></i>
                    <span class="title">Monthly Report</span>
                </a>
            </li >

            @can('charts_access')
            <li >
                <a href="{{ route('admin.charts.index') }}">
                    <i class="fa fa-bar-chart"></i>
                    <span class="title">Charts</span>
                </a>
            </li >@endcan




            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

