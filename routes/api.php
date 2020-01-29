<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('titles', 'TitlesController', ['except' => ['create', 'edit']]);

        Route::resource('departments', 'DepartmentsController', ['except' => ['create', 'edit']]);

        Route::resource('staff', 'StaffController', ['except' => ['create', 'edit']]);

});
