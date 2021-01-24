<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\TrackerManagementController;
use App\Http\Controllers\Manager\ScorecardController;
use App\Http\Controllers\Manager\ProductivityReportController;
use App\Http\Controllers\Manager\ReportsManagementController;

use App\Http\Controllers\Supervisor\SupervisorDashboardController;
use App\Http\Controllers\Supervisor\ActivityMonitoringController;
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
  return redirect()->to('/login');
});

Route::middleware('auth')->group(function(){
  Route::middleware('user:Manager')->group(function(){
    // DASHBOARD
    Route::get('/dashboard', [ManagerDashboardController::class, 'index']);

    // TRACKER MANAGEMENT
    Route::get('/admin/tracker-management', [TrackerManagementController::class, 'index']);
    Route::get('/admin/tracker-management/add', [TrackerManagementController::class, 'add']);
    Route::post('/admin/tracker-management/store', [TrackerManagementController::class, 'store']);
    Route::get('/admin/tracker-management/edit/{id}', [TrackerManagementController::class, 'edit']);
    Route::post('/admin/tracker-management/update/{id}', [TrackerManagementController::class, 'update']);
    // Route::post('/tracker-management/destroy/{id}', [TrackerManagementController::class, 'destroy']);

    // SCORECARD
    Route::get('/admin/scorecard', [ScorecardController::class, 'index']);

    // PRODUCTIVITY REPORT
    Route::get('/admin/productivity-report', [ProductivityReportController::class, 'index']);
    
    // REPORTS MANAGEMENT
    Route::get('/admin/reports-management', [ReportsManagementController::class, 'index']);
  });
});

Route::middleware('auth')->group(function(){
  Route::middleware('user:Supervisor')->group(function(){

    // DASHBOARD
    Route::get('/supervisor', [SupervisorDashboardController::class, 'index']);

    // ACTIVITY MONITORING
    Route::get('/supervisor/activity-monitoring', [ActivityMonitoringController::class, 'index']);
    Route::get('/supervisor/activity-monitoring/add-task', [TrackerManagementController::class, 'add']);
    Route::post('/supervisor/activity-monitoring/store', [TrackerManagementController::class, 'store']);
    // Route::get('/supervisor/activity-monitoring/edit/{id}', [TrackerManagementController::class, 'edit']);
    Route::post('/supervisor/activity-monitoring/update/{id}', [TrackerManagementController::class, 'update']);
    // Route::post('/tracker-management/destroy/{id}', [TrackerManagementController::class, 'destroy']);

    // SCORECARD
    Route::get('/supervisor/scorecard', [ScorecardController::class, 'index']);

    // PRODUCTIVITY REPORT
    Route::get('/supervisor/productivity-report', [ProductivityReportController::class, 'index']);
    
    // SCHEDULING MANAGEMENT
    Route::get('/supervisor/reports-management', [ReportsManagementController::class, 'index']);
  });
});

// TRACKER MANAGEMENT
  // Route::get('/tracker-management',[
  //   'uses' => 'Manager\TrackerManagementController@index',
  //   'as'   => 'manager.tracker-management.index'
  // ]);
  // Route::get('/tracker-management/add',[
  //   'uses' => 'Manager\TrackerManagementController@add',
  //   'as'   => 'manager.tracker-management.add'
  // ]); 
  // Route::post('/tracker-management/store/',[
  //   'uses' => 'Manager\TrackerManagementController@store',
  //   'as'   => 'manager.tracker-management.store'
  // ]);
  // Route::get('/tracker-management/edit/{id}',[
  //   'uses' => 'Manager\TrackerManagementController@edit',
  //   'as'   => 'manager.tracker-management.edit'
  // ]);
  // Route::post('/tracker-management/update/{id}',[
  //   'uses' => 'Manager\TrackerManagementController@update', 
  //   'as'   => 'manager.tracker-management.update'
  // ]);
  // Route::delete('/tracker-management/destroy/{id}',[
  //   'uses' => 'Manager\TrackerManagementController@destroy',
  //   'as'   => 'manager.tracker-management.destroy'
  // ]);

  // SCORECARD
  // Route::get('/scorecard',[
  //   'uses' => 'Manager\ScorecardController@index',
  //   'as'   => 'manager.scorecard.index'
  // ]);

  // // PRODUCTIVITY REPORT
  // Route::get('/productivity-report',[
  //   'uses' => 'Manager\ProductivityReportController@index',
  //   'as'   => 'manager.productivity-report.index'
  // ]);

  // // REPORTS MANAGEMENT
  // Route::get('/reports-management',[
  //   'uses' => 'Manager\ReportsManagementController@index',
  //   'as'   => 'manager.reports-management.index'
  // ]); 
  // Route::get('/scheduling-management/metric/add',[
  //   'uses' => 'Manager\ReportsManagementController@add',
  //   'as'   => 'manager.reports-management.add'
  // ]);