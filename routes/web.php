<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureController;
use App\Http\Livewire\Customercontactdropdown;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\DropdownController;

Route::get('dropdown', [DropdownController::class, 'view'])->name('dropdownView');
Route::get('get-states', [DropdownController::class, 'getStates'])->name('getStates');
Route::get('get-stock', [DropdownController::class, 'getStockes'])->name('getStockes');
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

Auth::routes();

Route::resource('type-services', App\Http\Controllers\TypeServiceController::class);

Route::resource('type-maintenances', App\Http\Controllers\TypeMaintenanceController::class);

Route::resource('ticket-statuses', App\Http\Controllers\TicketStatusController::class);

Route::resource('statuses', App\Http\Controllers\StatusController::class);

Route::resource('report-statuses', App\Http\Controllers\ReportStatusController::class);

Route::resource('order-statuses', App\Http\Controllers\OrderStatusController::class);

Route::resource('customers', App\Http\Controllers\CustomerController::class);

Route::resource('contacts', App\Http\Controllers\ContactController::class);

Route::resource('departments', App\Http\Controllers\DepartmentController::class);

Route::resource('employees', App\Http\Controllers\EmployeeController::class);

Route::resource('tickets', App\Http\Controllers\TicketController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('signature_pad', [SignatureController::class, 'index']);

Route::post('signature_pad', [SignatureController::class, 'store'])->name('signature_pad.store');

Route::resource('service-orders', App\Http\Controllers\ServiceOrderController::class);

Route::resource('materials', App\Http\Controllers\MaterialController::class);

Route::resource('material-assigneds', App\Http\Controllers\MaterialAssignedController::class);

Route::resource('tools', App\Http\Controllers\ToolController::class);

Route::resource('tool-assigneds', App\Http\Controllers\ToolAssignedController::class);

Route::resource('employee-orders', App\Http\Controllers\EmployeeOrderController::class);

Route::resource('services', App\Http\Controllers\ServiceController::class);

Route::resource('service-reports', App\Http\Controllers\ServiceReportController::class);

Route::resource('activities', App\Http\Controllers\ActivityController::class);

Route::resource('priorities', App\Http\Controllers\PriorityController::class);

Route::get('customercontactdropdown', Customercontactdropdown::class);

Route::resource('supervisor-employees', App\Http\Controllers\SupervisorEmployeeController::class);

Route::resource('classified-materials', App\Http\Controllers\ClassifiedMaterialController::class);

//Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);