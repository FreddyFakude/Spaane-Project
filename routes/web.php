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

Route::view('/employee/register/{phone_number}/{email}', 'auth.company.login')->name('employee.register');
Route::get('/employee/login', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'loginForm'])->name('employee.login.form');
Route::post('/employee/login', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'login'])->name('employee.login');


Route::view('/company/login', 'auth.company.login')->name('company.login.form');
Route::post('/company/login', [\App\Http\Controllers\Auth\Company\LoginController::class, 'login'])->name('company.login');
Route::post('/company/logout', [\App\Http\Controllers\Auth\Company\LoginController::class, 'logout'])->name('company.logout');

Route::group(['middleware'=>['auth:company'], 'prefix'=>'company'], function (){
    Route::get('/dashboard/index', [\App\Http\Controllers\Company\DashboardController::class, 'index'])->name('dashboard.company.index');
    Route::get('/dashboard/stats', [\App\Http\Controllers\Company\DashboardController::class, 'stats'])->name('dashboard.company.stats');
    Route::get('/dashboard/calendar', [\App\Http\Controllers\Company\DashboardController::class, 'calendar'])->name('dashboard.company.index.calendar');
    Route::get('/dashboard/employees/list', [\App\Http\Controllers\Company\EmployeeController::class, 'list'])->name('dashboard.company.talent.list');
    Route::get('/dashboard/employees/view/{talent}', [\App\Http\Controllers\Company\EmployeeController::class, 'viewTalent'])->name('dashboard.company.employee.view');
//    Route::get('/dashboard/employees/view/{talent}/delete', [\App\Http\Controllers\Business\TalentController::class, 'delete'])->name('dashboard.business.employee.delete');
    Route::post('/dashboard/employees/invite', [\App\Http\Controllers\Company\EmployeeController::class, 'inviteTalent'])->name('dashboard.business.employee.invite');
//    Route::post('/dashboard/talents/interview-request', [\App\Http\Controllers\Business\InterviewController::class, 'submitRequestInterview'])->name('dashboard.business.interview.request');
//    Route::get('/dashboard/talents/{talent}', [\App\Http\Controllers\Business\ExternalTalentController::class, 'viewTalent'])->name('dashboard.business.view-talent');
//    Route::post('/dashboard/hire', [\App\Http\Controllers\Business\ProjectController::class, 'submitProjectRequest'])->name('dashboard.business.project.request');
    Route::get('/dashboard/chats', [\App\Http\Controllers\Company\CompanyChatController::class, 'chats'])->name('dashboard.company.chats');
    Route::get('/dashboard/chat/{chat:hash}', [\App\Http\Controllers\Company\CompanyChatController::class, 'chat'])->name('dashboard.company.chat.employee');
    Route::get('/dashboard/chat/start/{employee}', [\App\Http\Controllers\Company\CompanyChatController::class, 'startChat'])->name('dashboard.company.chat.new');
    Route::get('/dashboard/chat/{chat:hash}/messages', [\App\Http\Controllers\Company\CompanyChatController::class, 'loadMessages'])->name('dashboard.company.chat.employee.messages');
    Route::post('/dashboard/chat/{chat:hash}/send-message', [\App\Http\Controllers\Company\CompanyChatController::class, 'SendMessages'])->name('dashboard.company.chat.send.messages');
//    Route::get('/dashboard/profile', [\App\Http\Controllers\Business\ProfileController::class, 'profile'])->name('dashboard.business.profile');
//    Route::post('/dashboard/profile/save', [\App\Http\Controllers\Business\ProfileController::class, 'updateProfile'])->name('dashboard.business.profile.save');
});


Route::post('/talent/logout', [\App\Http\Controllers\Auth\Employee\LoginController::class, 'logout'])->name('employee.logout');
Route::group(['middleware'=>['auth:employee'], 'prefix'=>'employee'], function (){
    Route::get('/dashboard/index', [\App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard.employee.index');
    Route::get('/dashboard/profile/edit', [\App\Http\Controllers\Employee\ProfileController::class, 'editProfile'])->name('dashboard.employee.profile.edit');
    Route::get('/dashboard/profile/view', [\App\Http\Controllers\Employee\ProfileController::class, 'index'])->name('dashboard.employee.profile.view');
    Route::post('/dashboard/profile/save', [\App\Http\Controllers\Employee\ProfileController::class, 'saveProfile'])->name('dashboard.talent.profile.save');
});
