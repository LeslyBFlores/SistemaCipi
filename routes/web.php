<?php

Route::get('/', 'Auth\LoginController@showLoginForm')->name('/');

Route::get('home', 'HomeController@index')->name('home');

Route::post('login' , 'Auth\LoginController@login')->name('login');
Route::post('logout' , 'Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('admin/users', 'UsersController@index')->name('admin.users')->middleware('permission:admin.users');
    Route::get('admin/users/create', 'UsersController@create')->name('admin.users.create')->middleware('permission:admin.users');
    Route::post('admin/users/new', 'UsersController@store')->name('admin.users.store')->middleware('permission:admin.users');
    Route::get('admin/users/edit/{id}', 'UsersController@edit')->name('admin.users.edit')->middleware('permission:admin.users');
    Route::put('admin/users/puts', 'UsersController@update')->name('admin.users.update')->middleware('permission:admin.users');
    Route::delete('admin/users/{id}', 'UsersController@destroy')->name('admin.users.destroy')->middleware('permission:admin.users');

    Route::get('projects', 'ProjectsController@index')->name('projects')->middleware('permission:projects');
    Route::get('projects/create', 'ProjectsController@create')->name('projects.create')->middleware('permission:projects');
    Route::post('projects/new', 'ProjectsController@store')->name('projects.store')->middleware('permission:projects');
    Route::get('projects/edit/{id}', 'ProjectsController@edit')->name('projects.edit')->middleware('permission:projects');
    Route::put('projects/puts', 'ProjectsController@update')->name('projects.update')->middleware('permission:projects');
    Route::delete('projects/{id}', 'ProjectsController@destroy')->name('projects.destroy')->middleware('permission:projects');

    Route::get('users/documents', 'DocumentosController@index')->name('documents')->middleware('permission:documents.users');
    Route::get('users/documents/create', 'DocumentosController@create')->name('documents.create')->middleware('permission:documents.users');
    Route::get('users/documents/fase/{categoria}', 'DocumentosController@getFase')->middleware('permission:documents.users');
    Route::post('users/documents/new', 'DocumentosController@store')->name('documents.store')->middleware('permission:documents.users');

    Route::get('res/documents', 'DocumentsController@list')->name('documents.res')->middleware('permission:documents.res');
    Route::get('res/documents/list/{categoria}', 'DocumentsController@index')->name('documents.res.list')->middleware('permission:documents.res');
    Route::delete('documents/{id}', 'DocumentsController@destroy')->name('documents.res.destroy')->middleware('permission:documents.res');

    Route::get('documents/show/{id}', 'DocumentosController@show')->name('documents.show')->middleware('permission:documents.users');
    Route::get('res/documents/show/{id}', 'DocumentosController@show')->name('documents.res.show')->middleware('permission:documents.res');

    Route::post('comm', 'ComentariosController@store')->name('comm.store');
});

