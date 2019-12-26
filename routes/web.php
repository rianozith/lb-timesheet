<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TaskController@index');
Route::get('/test', function () {
    return view('task.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', 'DashboardController@index')->name('dashboad.index');
Route::get('category_export_excel', 'ExportController@category_export_excel');
Route::get('task_export_excel', 'ExportController@task_export_excel');
Route::get('task_detail_export_excel', 'ExportController@task_detail_export_excel');
Route::resource('category', 'CategoryController');
Route::resource('task', 'TaskController');
Route::resource('task-detail', 'TaskDetailController');
Route::resource('chart', 'ChartController');

