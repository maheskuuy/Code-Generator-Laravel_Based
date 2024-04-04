<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Form_Tables_ConfigurationController;

/** for side bar menu active */
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('dashboard.home');
    });
    Route::get('users_configuration', function () {
        return view('pages.users_configuration.index');
    })->name('users_configuration');
    Route::get('form_tables_configuration', function () {
        return view('pages.form_tables_configuration.index');
    })->name('form_tables_configuration');
    Route::get('menu_configuration', function () {
        return view('pages.menu_configuration.index');
    })->name('menu_configuration');
});

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    // -----------------------------login----------------------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('logout/page', 'logoutPage')->name('logout/page');
    });

    // ------------------------------ register ----------------------------------//
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'storeUser')->name('register');
    });

    // ----------------------------- forget password ----------------------------//
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('forget-password', 'getEmail')->name('forget-password');
        Route::post('forget-password', 'postEmail')->name('forget-password');
    });

    // ----------------------------- reset password -----------------------------//
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('reset-password/{token}', 'getPassword');
        Route::post('reset-password', 'updatePassword');
    });
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // -------------------------- main dashboard ----------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->middleware('auth')->name('home');
    });
});


Route::get('/form-tables-configuration', [Form_Tables_ConfigurationController::class, 'index'])->name('form_tables_configuration.index');
Route::post('/form-tables-configuration', [Form_Tables_ConfigurationController::class, 'store'])->name('form_tables_configuration.store');
Route::get('/form-tables-configuration', [Form_Tables_ConfigurationController::class, 'get'])->name('form_tables_configuration.get');
Route::post('/form-tables-configuration/{id}', [Form_Tables_ConfigurationController::class, 'update'])->name('form_tables_configuration.update');
Route::get('/form-tables-configuration/{id}', [Form_Tables_ConfigurationController::class, 'show'])->name('form_tables_configuration.show');
