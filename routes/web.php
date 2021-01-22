<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// TRACKER MANAGEMENT
  Route::get('/tracker-management',[
    'uses' => 'Manager\TrackerManagementController@index',
    'as'   => 'manager.tracker-management.index'
  ]);
  Route::get('/tracker-management/add',[
    'uses' => 'Manager\TrackerManagementController@add',
    'as'   => 'manager.tracker-management.add'
  ]); 
  Route::post('/tracker-management/store/',[
    'uses' => 'Manager\TrackerManagementController@store',
    'as'   => 'manager.tracker-management.store'
  ]);
  Route::get('/tracker-management/edit/{id}',[
    'uses' => 'Manager\TrackerManagementController@edit',
    'as'   => 'manager.tracker-management.edit'
  ]);
  Route::post('/tracker-management/update/{id}',[
    'uses' => 'Manager\TrackerManagementController@update', 
    'as'   => 'manager.tracker-management.update'
  ]);
  Route::delete('/tracker-management/destroy/{id}',[
    'uses' => 'Manager\TrackerManagementController@destroy',
    'as'   => 'manager.tracker-management.destroy'
  ]);