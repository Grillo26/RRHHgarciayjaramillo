<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\myController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\AttendanceController;

use Illuminate\Support\Facades\Route;



Route::get('/home', function () { return view('/frontend_dashboard'); })->middleware(['auth'])->name('frontend');

Route::get('/about', function () { return view('frontend.about_index');})->middleware(['auth'])->name('about');
Route::get('/service', function () { return view('frontend.service');})->middleware(['auth'])->name('service');
Route::get('/portfolio', function () { return view('frontend.portfolio');})->middleware(['auth'])->name('portfolio');
Route::get('/ourblog', function () { return view('frontend.ourblog');})->middleware(['auth'])->name('ourblog');
Route::get('/ourblog/details', function () { return view('frontend.ourblog_details');})->middleware(['auth'])->name('ourblog.details');
Route::get('/contact', function () { return view('frontend.contact');})->middleware(['auth'])->name('contact');

Route::get('/', function () { return view('welcome');})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::controller(AttendanceController::class)->group(function() {
    // Ruta para mostrar el formulario de entrada y salida por la manana
    Route::get('/checkin-morning', 'showCheckInMorningForm')->name('checkinMorning');
    Route::post('/checkin-morning', 'checkInMorning')->name('checkinMorning');
    Route::get('/checkout-morning', 'showCheckOutMorningForm')->name('checkoutMorning');
    Route::post('/checkout-morning', 'checkOutMorning')->name('checkoutMorning');

    Route::get('/historial', 'historial')->name('historial');
    Route::get('/historial-asistencia', 'historialAll')->name('historialAll');

    // Ruta para mostrar el formulario de entrada y salida por la tarde
    Route::get('/checkin-afternoon', 'showCheckInAfternoonForm')->name('checkinAfternoon');
    Route::post('/checkin-afternoon', 'checkInAfternoon')->name('checkinAfternoon');
    Route::get('/checkout-afternoon', 'showCheckOutAfternoonForm')->name('checkoutAfternoon');
    Route::post('/checkout-afternoon', 'checkOutAfternoon')->name('checkoutAfternoon');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin_logout', 'destroy')->name('admin.logout');
    Route::get('/admin_profile', 'profile')->name('admin.profile');
    Route::get('/admin_edit_profile', 'editProfile')->name('admin.edit.profile');
    Route::post('/admin_store_profile', 'storeProfile')->name('admin.store.profile');

    // change_password

    Route::get('/change_password', 'ChangePassword')->name('password_change');
    Route::post('/update_password', 'updatePassword')->name('password_update');
});
// home page
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home_slider', 'homeSlider')->name('home.slider');
    Route::post('/home_slider/update', 'homeSliderUpdate')->name('home.slider.update');
});
// about page
Route::controller(AboutController::class)->group(function () {
    Route::get('/about_page', 'index')->name('about.page');
    Route::post('/about_page/update', 'aboutPageUpdate')->name('about.page.update');
});



