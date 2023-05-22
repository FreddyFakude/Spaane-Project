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

Route::view('/', 'frontend.index')->name('index');
Route::view('/about', 'frontend.about')->name('index');

//Route::view('/employee/register/', 'auth.company.login')->name('employee.register');
Route::get('/employee/login', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'loginForm'])->name('employee.login.form');
Route::post('/employee/login', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'login'])->name('employee.login');
Route::post('/talent/logout', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'logout'])->name('employee.logout');


Route::get('/company/register', [\App\Http\Controllers\Auth\Company\RegisterController::class, 'index'])->name('company.register.form');
Route::post('/company/profile/register', [\App\Http\Controllers\Auth\Company\RegisterController::class, 'store'])->name('company.register');
Route::get('/company/login', [\App\Http\Controllers\Auth\Company\LoginController::class, 'loginForm'])->name('company.login.form');
Route::post('/company/login', [\App\Http\Controllers\Auth\Company\LoginController::class, 'login'])->name('company.login');
Route::post('/company/logout', [\App\Http\Controllers\Auth\Company\LoginController::class, 'logout'])->name('company.logout');

Route::group(['middleware'=>['auth:company']], function (){
    Route::get('/company/profile', [\App\Http\Controllers\Company\CompanyProfileController::class, 'index'])->name('dashboard.company.profile');
    Route::post('/company/profile/update', [\App\Http\Controllers\Company\CompanyProfileController::class, 'update'])->name('dashboard.company.update.profile');
    Route::get('/company/admin/profile', [\App\Http\Controllers\Company\AdminProfileController::class, 'index'])->name('dashboard.company.admin.profile');
    Route::post('/company/admin/profile/update', [\App\Http\Controllers\Company\AdminProfileController::class, 'update'])->name('company.update.admin.profile');
});


Route::group(['middleware'=>['auth:company', 'companyHasProfile'], 'prefix'=>'company'], function (){
    Route::get('/dashboard/index', [\App\Http\Controllers\Company\DashboardController::class, 'index'])->name('dashboard.company.index');
    Route::get('/dashboard/stats', [\App\Http\Controllers\Company\DashboardController::class, 'stats'])->name('dashboard.company.stats');
    Route::get('/dashboard/calendar', [\App\Http\Controllers\Company\DashboardController::class, 'calendar'])->name('dashboard.company.index.calendar');
    Route::get('/dashboard/employees/list', [\App\Http\Controllers\Company\EmployeeController::class, 'list'])->name('dashboard.company.employee.list');
    Route::get('/dashboard/employees/view/{employee}', [\App\Http\Controllers\Company\EmployeeController::class, 'viewTalent'])->name('dashboard.company.employee.view');

    Route::resource('/dashboard/contributions', \App\Http\Controllers\Company\CompanyRemunerationContributionController::class,  ['as' => 'dashboard.company']);
    Route::get('/dashboard/contributions/{companyRemunerationContribution:hash}/{state}', [\App\Http\Controllers\Company\CompanyRemunerationContributionController::class, 'updateStatus'])->name('dashboard.company.contributions.update.status');
//    Route::post('/dashboard/contributions/{}/update', [\App\Http\Controllers\Company\CompanyRemunerationContributionController::class, 'update'])->name('dashboard.company.contributions.update');


    Route::post('/dashboard/employees/{employee:hash}/leave/manual-request', [\App\Http\Controllers\Company\EmployeeLeaveController::class, 'leaveManualRequest'])->name('dashboard.company.employee.leave.manual-request');
    Route::post('/dashboard/employees/{employee:hash}/leave/add-policy', [\App\Http\Controllers\Company\EmployeeLeavePolicyController::class, 'addLeavePolicy'])->name('dashboard.company.employee.add.leave-policy');
    Route::get('/dashboard/employees/{employee:hash}/{leavePolicy}/remove-policy', [\App\Http\Controllers\Company\EmployeeLeavePolicyController::class, 'removeLeavePolicy'])->name('dashboard.company.employee.remove.leave-policy');
    Route::get('/dashboard/employees/{employee:hash}/leave/{leave_request:hash}/approve', [\App\Http\Controllers\Company\EmployeeLeaveController::class, 'approveLeave'])->name('dashboard.company.employee.approve.leave');

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
    Route::post('/dashboard/payroll/{employee:hash}/store', [\App\Http\Controllers\Company\CompanyPayslipController::class, 'store'])->name('dashboard.business.payroll.store');
    Route::get('/dashboard/payroll/{employee:hash}/{payslip:hash}', [\App\Http\Controllers\Company\CompanyPayslipController::class, 'downloadPayslip'])->name('dashboard.business.payroll.download');
    Route::post('/dashboard/payroll/generate-all', [\App\Http\Controllers\Company\CompanyPayslipController::class, 'createAll'])->name('dashboard.business.payroll.generate.all');
});

Route::group(['middleware'=>['auth:employee'], 'prefix'=>'employee'], function (){
    Route::get('/dashboard/index', [\App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard.employee.index');
    Route::get('/dashboard/profile/edit', [\App\Http\Controllers\Employee\ProfileController::class, 'editProfile'])->name('dashboard.employee.profile.edit');
    Route::get('/dashboard/profile/view', [\App\Http\Controllers\Employee\ProfileController::class, 'index'])->name('dashboard.employee.profile.view');
    Route::post('/dashboard/profile/save', [\App\Http\Controllers\Employee\ProfileController::class, 'saveProfile'])->name('dashboard.talent.profile.save');
});

//routes by Remmone
Route::view('/company/leave/', 'dashboard.company.leave')->name('dashboard.company.leave');

