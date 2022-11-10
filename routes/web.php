<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\profileController as AdminProfileController;
use App\Http\Controllers\AssignSubjectController;
use App\Http\Controllers\Backend\BackendConroller;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ClassGroupController;
use App\Http\Controllers\Backend\ExamTypeController;
use App\Http\Controllers\Backend\FeeCategoryAmountController;
use App\Http\Controllers\Backend\ShiftController;
use App\Http\Controllers\Backend\StudentClassController;
use App\Http\Controllers\Backend\StudentFeeController;
use App\Http\Controllers\Backend\SubjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Models\Banner;

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

// Route::get('/',[FrontendController::class,'index'])->name('frontend.home');
Route::get('/',[HomeController::class,'index'])->name('frontend.home');

Auth::routes();
Route::name('Backend.')->group(function(){
    Route::get('/dashboard', [BackendConroller::class, 'index'])->name('home');
     Route::resource('/banner',BannerController::class)->except(['show']);
     Route::get('banner/status/{banner}',[BannerController::class,"statusUpdate"])->name('banner.status.update');
     Route::get('banner/restore/{id}',[BannerController::class,"bannerRestore"])->name('banner.restore');
     Route::get('banner/parmanent/delete/{id}',[BannerController::class,"bannerDelete"])->name('banner.parmanent.delete');

     
    
});

Route::name('Profile.')->group(function(){
     Route::resource('/admin',profileController::class);
});

Route::name('Student.')->group(function(){
    Route::resource('/class',StudentClassController::class);
    Route::resource('/group',ClassGroupController::class);
    Route::resource('/shift',ShiftController::class);
    Route::resource('/fee',StudentFeeController::class);
    Route::resource('/fee_amount',FeeCategoryAmountController::class);
     Route::resource('/exam',ExamTypeController::class);
     Route::resource('/subject',SubjectController::class);
     Route::resource('/Assign_subject',AssignSubjectController::class);
});


