<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartiesTypeController;
use App\Http\Controllers\GSTBillsController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ReminderController;

Route::get('/', [AuthController::class, 'login'])->name('home'); // Added root route
Route::get('/login', [AuthController::class, 'login'])->name('login');
//Route::get('/', [AuthController::class, 'login']);
Route::post('login_post', [AuthController::class, 'login_post']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);

Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::post('forgot-password', [AuthController::class, 'sendResetLink']);

Route::get('reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/send-gst-reminders', [ReminderController::class, 'sendReminderEmails']);

Route::get('/home', function () {
    return view('home');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class,  'dashboard']);

    Route::get('admin/parties_type', [PartiesTypeController::class, 'parties_type']);
    Route::get('admin/parties_type/add', [PartiesTypeController::class, 'parties_type_add']); 
    Route::post('admin/parties_type/add', [PartiesTypeController::class, 'parties_type_insert']);
    Route::get('admin/parties_type/edit/{id}', [PartiesTypeController::class, 'parties_type_edit']);
    Route::post('admin/parties_type/edit/{id}', [PartiesTypeController::class, 'parties_type_update']);
    Route::get('admin/parties_type/delete/{id}',[PartiesTypeController::class, 'parties_type_delete']);

    Route::get('admin/parties_type/pdf_generator', [PartiesTypeController::class, 'parties_type_pdf_generator']);
    Route::get('admin/parties_type/pdf_single/{id}', [PartiesTypeController::class, 'parties_type_pdf_single']);

    Route::get('admin/parties/pdf_single/{id}', [PartiesTypeController::class, 'parties_pdf_single_download']);

    Route::get('admin/parties/view/{id}', [PartiesTypeController::class, 'parties_view_single']);

    Route::get('admin/parties',[PartiesTypeController::class, 'parties']); 
    Route::get('admin/parties/add', [PartiesTypeController::class, 'parties_add']);
    Route::post('admin/parties/add', [PartiesTypeController::class, 'parties_insert']);
    Route::get('admin/parties/edit/{id}', [PartiesTypeController::class, 'parties_edit']);
    Route::post('admin/parties/edit/{id}', [PartiesTypeController::class, 'parties_update']);
    Route::get('admin/parties/delete/{id}', [PartiesTypeController::class, 'parties_delete']);

    Route::get('admin/parties/pdf', [PartiesTypeController::class, 'parties_pdf_download']);

    
    Route::get('admin/gst_bills',[GSTBillsController::class, 'gst_bills']);
    Route::get('admin/gst_bills/add', [GSTBillsController::class, 'gst_bills_add']);
    Route::post('admin/gst_bills/add', [GSTBillsController::class, 'gst_bills_insert']);
    
    Route::get('admin/gst_bills/edit/{id}', [GSTBillsController::class, 'gst_bills_edit']);
    Route::post('admin/gst_bills/edit/{id}', [GSTBillsController::class, 'gst_bills_update']);

    Route::get('admin/gst_bills/delete/{id}', [GSTBillsController::class, 'gst_bills_delete']);
    Route::get('admin/gst_bills/view/{id}', [GSTBillsController::class, 'gst_bills_view']);
    
    Route::get('admin/gst_bills/pdf-download', [GSTBillsController::class, 'gst_bills_download']);
    Route::get('admin/gst_bills/pdf_single_row_download/{id}', [GSTBillsController::class, 'gst_bills_pdf_download']);

    Route::get('admin/my_account', [MyAccountController::class, 'my_account']);
    Route::post('admin/my_account/update', [MyAccountController::class, 'my_account_update']);

    Route::get('admin/setting', [SettingController::class, 'setting']);
    Route::post('admin/setting/update', [SettingController::class, 'setting_update']);
});

Route::get('logout', [AuthController::class, 'logout']);