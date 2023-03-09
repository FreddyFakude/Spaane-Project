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

Route::redirect('/', '/company/login');

Route::view('/employee/register/', 'auth.company.login')->name('employee.register');
Route::get('/employee/login', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'loginForm'])->name('employee.login.form');
Route::post('/employee/login', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'login'])->name('employee.login');
Route::post('/talent/logout', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'logout'])->name('employee.logout');


Route::view('/company/login', 'auth.company.login')->name('company.login.form');
Route::post('/company/login', [\App\Http\Controllers\Auth\Company\LoginController::class, 'login'])->name('company.login');
Route::post('/company/logout', [\App\Http\Controllers\Auth\Company\LoginController::class, 'logout'])->name('company.logout');

Route::group(['middleware'=>['auth:company'], 'prefix'=>'company'], function (){
    Route::get('/dashboard/index', [\App\Http\Controllers\Company\DashboardController::class, 'index'])->name('dashboard.company.index');
    Route::get('/dashboard/stats', [\App\Http\Controllers\Company\DashboardController::class, 'stats'])->name('dashboard.company.stats');
    Route::get('/dashboard/calendar', [\App\Http\Controllers\Company\DashboardController::class, 'calendar'])->name('dashboard.company.index.calendar');
    Route::get('/dashboard/employees/list', [\App\Http\Controllers\Company\EmployeeController::class, 'list'])->name('dashboard.company.employee.list');
    Route::get('/dashboard/employees/view/{employee}', [\App\Http\Controllers\Company\EmployeeController::class, 'viewTalent'])->name('dashboard.company.employee.view');
    Route::post('/dashboard/employees/view/{employee}/leave', [\App\Http\Controllers\Company\EmployeeLeaveController::class, 'updateEmployeeLeaveDay'])->name('dashboard.company.employee.update.leave');
    Route::get('/dashboard/employees/view/{employee}/leave/{hash}/approve', [\App\Http\Controllers\Company\EmployeeLeaveController::class, 'approveLeave'])->name('dashboard.company.employee.approve.leave');
    Route::post('/dashboard/employees/invite', [\App\Http\Controllers\Company\EmployeeController::class, 'inviteEmployee'])->name('dashboard.business.employee.invite');
    Route::post('/dashboard/employee/update/{employee:hash}', [\App\Http\Controllers\Company\EmployeeController::class, 'updateEmployeeProfile'])->name('dashboard.business.employee.update');

    Route::get('/dashboard/chats', [\App\Http\Controllers\Company\CompanyChatController::class, 'chats'])->name('dashboard.company.chats');
    Route::get('/dashboard/chats/bulk-messages', [\App\Http\Controllers\Company\CompanyChatController::class, 'bulkMessages'])->name('dashboard.company.chats.bulk-messages');
    Route::post('/dashboard/chats/bulk-messages', [\App\Http\Controllers\Company\CompanyChatController::class, 'sendBulkMessages'])->name('dashboard.company.chats.bulk-messages.send');
    Route::get('/dashboard/chat/{chat:hash}', [\App\Http\Controllers\Company\CompanyChatController::class, 'chat'])->name('dashboard.company.chat.employee');
    Route::get('/dashboard/chat/start/{employee}', [\App\Http\Controllers\Company\CompanyChatController::class, 'startChat'])->name('dashboard.company.chat.new');
    Route::get('/dashboard/chat/{chat:hash}/messages', [\App\Http\Controllers\Company\CompanyChatController::class, 'loadMessages'])->name('dashboard.company.chat.employee.messages');
    Route::post('/dashboard/chat/{chat:hash}/send-message', [\App\Http\Controllers\Company\CompanyChatController::class, 'SendMessages'])->name('dashboard.company.chat.send.messages');
    Route::get('/dashboard/payroll', [\App\Http\Controllers\Company\CompanyPayslipController::class, 'index'])->name('dashboard.business.payroll.index');
    Route::get('/dashboard/payroll/{date}', [\App\Http\Controllers\Company\CompanyPayslipController::class, 'show'])->name('dashboard.business.payroll.show');
    Route::post('/dashboard/payroll/store', [\App\Http\Controllers\Company\CompanyPayslipController::class, 'store'])->name('dashboard.business.payroll.store');
//    Route::get('/dashboard/payroll/{company_payslip:hash}', [\App\Http\Controllers\Company\CompanyPayslipController::class, 'show'])->name('dashboard.business.payroll.show');
});

Route::group(['middleware'=>['auth:employee'], 'prefix'=>'employee'], function (){
    Route::get('/dashboard/index', [\App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard.employee.index');
    Route::get('/dashboard/profile/edit', [\App\Http\Controllers\Employee\ProfileController::class, 'editProfile'])->name('dashboard.employee.profile.edit');
    Route::get('/dashboard/profile/view', [\App\Http\Controllers\Employee\ProfileController::class, 'index'])->name('dashboard.employee.profile.view');
    Route::post('/dashboard/profile/save', [\App\Http\Controllers\Employee\ProfileController::class, 'saveProfile'])->name('dashboard.talent.profile.save');
});

//routes by Remmone
Route::view('/company/leave/', 'dashboard.company.leave')->name('dashboard.company.leave');

