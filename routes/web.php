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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name
    ('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/mynotes', 'App\Http\Controllers\DashboardController@mynotes')
        ->name('dashboard.mynotes');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/changeNote/{id}', 'App\Http\Controllers\DashboardController@changeNote')
        ->name('dashboard.changeNote');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/changeNoteRequest/{id}', 'App\Http\Controllers\DashboardController@changeNoteRequest')
        ->name('dashboard.changeNoteRequest');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/dashboard/deleteNote/{id}', 'App\Http\Controllers\DashboardController@deleteNote')
        ->name('dashboard.deleteNote');
});


Route::get('/image-upload', [App\Http\Controllers\AddNotesController::class, 'createForm']);
Route::post('/image-upload', [App\Http\Controllers\AddNotesController::class, 'fileUpload'])->name('imageUpload');


/*
// for admin
Route::group(['middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/dashboard/administrator', 'App\Http\Controllers\DashboardController@administrator')
        ->name('dashboard.administrator');
});

// for superadmin
Route::group(['middleware' => ['auth', 'role:superadministrator']], function () {
    Route::get('/dashboard/superadministrator', 'App\Http\Controllers\DashboardController@superadministrator')
        ->name('dashboard.superadministrator');
});
*/

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
