<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Settings\SettingsController;

use App\Http\Controllers\Manager\ManagerDashboardController;
use App\Http\Controllers\Manager\TrackerManagementController;
use App\Http\Controllers\Manager\EmployeeManagementController;
use App\Http\Controllers\Manager\ScorecardManagementController;
use App\Http\Controllers\Manager\ScheduleManagementController;
use App\Http\Controllers\Manager\ManagerGenerateReportController;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\Manager\ProductivityReportController;


use App\Http\Controllers\Supervisor\SupervisorDashboardController;
use App\Http\Controllers\Supervisor\ActivityTrackerController;
use App\Http\Controllers\Supervisor\SupervisorGenerateReportController;

use App\Http\Controllers\Frontliner\FrontlinerDashboardController;

use App\Http\Controllers\LogoutController;
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

// Route::get('/', [LandingPageController::class, 'index']);


// MANAGER
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

    // EMPLOYEE MANAGEMENT
    Route::get('/admin/employee-management', [EmployeeManagementController::class, 'index']);
    Route::get('/admin/employee-management/add', [EmployeeManagementController::class, 'add']);
    Route::post('/admin/employee-management/store', [EmployeeManagementController::class, 'store']);
    Route::get('/admin/employee-management/edit/{id}', [EmployeeManagementController::class, 'edit']);
    Route::post('/admin/employee-management/update/{id}', [EmployeeManagementController::class, 'update']);

    // SCORECARD MANAGEMENT
    Route::get('/admin/scorecard-management', [ScorecardManagementController::class, 'index']);
    Route::get('/admin/scorecard-management/add', [ScorecardManagementController::class, 'add']);
    Route::get('/admin/scorecard-management/edit/{id}', [ScorecardManagementController::class, 'edit']);

    // SCHEDULE MANAGEMENT
    Route::get('/admin/schedule-management', [ScheduleManagementController::class, 'index']);

    // GENERATE REPORT
    Route::get('/admin/generate-report', [ManagerGenerateReportController::class, 'index']);
    
    // PDF
    Route::get('/generate-pdf-activity/{reference}/{status}/{search}/{date_from}/{date_to}', [PDFController::class, 'indexActivity']);

    // PRODUCTIVITY REPORT
    Route::get('/admin/productivity-report', [ProductivityReportController::class, 'index']);

    
    // SETTINGS
    Route::get('/admin/settings/edit', [SettingsController::class, 'edit']);
    Route::post('/admin/settings/update/{id}', [SettingsController::class, 'update']);
    
  });
});

// SUPERVISOR
Route::middleware('auth')->group(function(){
  Route::middleware('user:Supervisor')->group(function(){

    // DASHBOARD
    Route::get('/supervisor/dashboard', [ManagerDashboardController::class, 'index']);

    // ACTIVITY TRACKER
    Route::get('/supervisor/activity-tracker', [ActivityTrackerController::class, 'index']);
    Route::get('/supervisor/activity-tracker/add-task', [ActivityTrackerController::class, 'add']);
    Route::post('/supervisor/activity-tracker/store/', [ActivityTrackerController::class, 'store']);
    Route::post('/supervisor/activity-tracker/update/{id}/{status}', [ActivityTrackerController::class, 'update']);

    // SCORECARD MANAGEMENT
    Route::get('/supervisor/scorecard-management', [ScorecardManagementController::class, 'index']);

    // PRODUCTIVITY REPORT
    Route::get('/supervisor/productivity-report', [ProductivityReportController::class, 'index']);
    
    // GENERATE REPORT
    Route::get('/supervisor/generate-report', [SupervisorGenerateReportController::class, 'index']);
    
    // SETTINGS
    Route::get('/supervisor/settings/edit', [SettingsController::class, 'edit']);
    Route::post('/supervisor/settings/update/{id}', [SettingsController::class, 'update']);
  });
});

// FRONTLINER
Route::middleware('auth')->group(function(){
  Route::middleware('user:Frontliner')->group(function(){

    // DASHBOARD
    Route::get('/frontliner/dashboard', [ManagerDashboardController::class, 'index']);

    // ACTIVITY TRACKER
    Route::get('/frontliner/activity-tracker', [ActivityTrackerController::class, 'index']);
    Route::get('/frontliner/activity-tracker/add-task', [ActivityTrackerController::class, 'add']);
    Route::post('/frontliner/activity-tracker/store/', [ActivityTrackerController::class, 'store']);
    Route::post('/frontliner/activity-tracker/update/{id}/{status}', [ActivityTrackerController::class, 'update']);

    // SCORECARD MANAGEMENT
    Route::get('/frontliner/scorecard-management', [ScorecardManagementController::class, 'index']);

    // PRODUCTIVITY REPORT
    Route::get('/frontliner/productivity-report', [ProductivityReportController::class, 'index']);
    
    // GENERATE REPORT
    Route::get('/frontliner/generate-report', [SupervisorGenerateReportController::class, 'index']);
    
    // SETTINGS
    Route::get('/frontliner/settings/edit', [SettingsController::class, 'edit']);
    Route::post('/frontliner/settings/update/{id}', [SettingsController::class, 'update']);
  });
});

Route::get('/logout', [LogoutController::class, 'logout']);


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