<?php

use App\Http\Controllers\GuestListManagementController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Mail\MyTestEmail;
use App\Models\Event;
use App\Models\Guest;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\GuestController;
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


Route::group(['middleware' => 'auth'], function () {


    Route::get('/', [HomeController::class, 'home']);
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('billing', function () {
        return view('billing');
    })->name('billing');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');

    Route::get('user-management', function () {
        return view('laravel-examples/user-management');
    })->name('user-management');

    // Route::get('attendees', function () {
    //    return view('laravel-examples/attandees');
    // })->name('attendees');

    Route::get('tables', function () {
        return view('tables');
    })->name('tables');

    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');

    Route::get('static-sign-in', function () {
        return view('static-sign-in');
    })->name('sign-in');

    Route::get('static-sign-up', function () {
        return view('static-sign-up');
    })->name('sign-up');


    //Guest Management
    Route::get('/Registrationform', [GuestListManagementController::class, 'create'])->name('guest.registrationform');
    Route::post('/Registrationform', [GuestListManagementController::class, 'store'])->name('guest.store');
    Route::get('/GuestList', [GuestListManagementController::class, 'GuestList']);
    Route::get('/Events', [GuestListManagementController::class, 'EventTables']);
    Route::get('/Edit/{id}', [GuestListManagementController::class, 'ShowEdit'])->name('guest.edit');
    Route::post('/Edit/{id}', [GuestListManagementController::class, 'edit'])->name('guest.edit');
    Route::get('/guest/{id}/Representativeform', [GuestListManagementController::class, 'RepresentativeCreate'])->name('guest.representativeform');
    Route::post('/guest/{id}/Representativeform', [GuestListManagementController::class, 'RepresentativeStore'])->name('guest.RepresentativeStore');

    Route::get('/guest/{id}/Updateattendanceform', [GuestListManagementController::class, 'Updateattendanceshow'])->name('guest.representativeform');
    Route::post('/guest/{id}/Updateattendanceform', [GuestListManagementController::class, 'Updateattendancestore'])->name('guest.Updateattendancestore');

    Route::get('/Walk-inRegistrationform', [GuestListManagementController::class, 'walkincreate'])->name('guest.walkinregistrationform');
    Route::post('/Walk-inRegistrationform', [GuestListManagementController::class, 'walkinstore'])->name('guest.walkinstore');

    Route::get('/Thankyouform', [GuestListManagementController::class, 'ThankYou'])->name('guest.Thankyouform');


    //get guest filter by event
    Route::get('/guestlist/{event}', [GuestController::class, 'index'])->name('guestl.index');
    Route::get('/guestlist/create/{event}', [GuestController::class, 'create'])->name('guestl.create');
    Route::post('/guestlist/{guest}', [GuestController::class, 'update'])->name('guestl.update');
    Route::get('/guestlist/{id}/edit', [GuestController::class, 'edit'])->name('guestl.edit');
    Route::delete('/guestlist/{guest}', [GuestController::class, 'destroy'])->name('guestl.destroy');
    Route::get('/guestlist/{guest}', [GuestController::class, 'show'])->name('guestl.show');
    Route::post('/guestlist', [GuestController::class, 'store'])->name('guestl.store');



    //Qr Code
    Route::get('/QRcode/{id}', [QRCodeController::class, 'QRcode'])->name('guest.qrcode');
    Route::get('/checkin/{id}', [QRCodeController::class, 'checkin'])->name('guest.checkin');
    Route::post('/checkin/{id}', [QRCodeController::class, 'checkinupdate'])->name('guest.checkinupdate');




    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
        return view('dashboard');
    })->name('sign-up');

    //event page
    Route::get('event', [EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/{event}', [EventController::class, 'update'])->name('event.update');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::delete('/event/{event}', [EventController::class, 'destroy'])->name('event.destroy');
    Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    //

    //guestcategory page
    Route::get('guestcategory/{event}', [GuestCategoryController::class, 'index'])->name('guestcategory.index');
    Route::get('/guestcategory/create/{event}', [GuestCategoryController::class, 'create'])->name('guestcategory.create');
    Route::post('/guestcategory/{guestcategory}', [GuestCategoryController::class, 'update'])->name('guestcategory.update');
    Route::get('/guestcategory/{id}/edit', [GuestCategoryController::class, 'edit'])->name('guestcategory.edit');
    Route::delete('/guestcategory/{guestcategory}', [GuestCategoryController::class, 'destroy'])->name('guestcategory.destroy');
    Route::get('/guestcategory/{guestcategory}', [GuestCategoryController::class, 'show'])->name('guestcategory.show');
    Route::post('/guestcategory', [GuestCategoryController::class, 'store'])->name('guestcategory.store');

    //
});

//send invitation email
Route::get('/testroute/{guest}', [NotificationController::class, 'sendInvitation'])->name('email.send');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
