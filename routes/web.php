<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('titles', 'Admin\TitlesController');
    Route::post('titles_mass_destroy', ['uses' => 'Admin\TitlesController@massDestroy', 'as' => 'titles.mass_destroy']);
    Route::post('titles_restore/{id}', ['uses' => 'Admin\TitlesController@restore', 'as' => 'titles.restore']);
    Route::delete('titles_perma_del/{id}', ['uses' => 'Admin\TitlesController@perma_del', 'as' => 'titles.perma_del']);
    Route::resource('departments', 'Admin\DepartmentsController');
    Route::post('departments_mass_destroy', ['uses' => 'Admin\DepartmentsController@massDestroy', 'as' => 'departments.mass_destroy']);
    Route::post('departments_restore/{id}', ['uses' => 'Admin\DepartmentsController@restore', 'as' => 'departments.restore']);
    Route::delete('departments_perma_del/{id}', ['uses' => 'Admin\DepartmentsController@perma_del', 'as' => 'departments.perma_del']);
    Route::resource('staff', 'Admin\StaffController');
    Route::post('staff_mass_destroy', ['uses' => 'Admin\StaffController@massDestroy', 'as' => 'staff.mass_destroy']);
    Route::post('staff_restore/{id}', ['uses' => 'Admin\StaffController@restore', 'as' => 'staff.restore']);
    Route::delete('staff_perma_del/{id}', ['uses' => 'Admin\StaffController@perma_del', 'as' => 'staff.perma_del']);
    Route::resource('user_actions', 'Admin\UserActionsController');

    Route::resource('duty', 'Admin\DutyController');
    Route::get('duty/print/{id}',['uses' =>'Admin\DutyController@print', 'as' => 'admin.duty.print']);
    Route::resource('statistic', 'Admin\StatisticController');
    Route::resource('charts', 'Admin\ChartsController');
    Route::resource('reports', 'Admin\ReportsController');
    Route::get('monthly_report', ['uses' => 'Admin\ReportsController@monthly_report', 'as' => 'reports.monthly_report']);
    Route::post('monthly_report_view', ['uses' => 'Admin\ReportsController@monthly_report_view', 'as' => 'reports.monthly_report_view']);

    //get Bed when select department
    Route::get('getBed/{id}','Admin\DepartmentsController@getBed');


});

