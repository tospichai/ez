<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/data', [HomeController::class, 'data'])->name('data');
Route::post('/setting', [HomeController::class, 'setting'])->name('setting');
Route::get('login', [SocialController::class, 'login'])->name('login');
Route::post('login', [SocialController::class, 'loginAuth']);
Route::get('check', [SocialController::class, 'check'])->name('check');
Route::get('register', [SocialController::class, 'register'])->name('register');
Route::post('register', [SocialController::class, 'registerAuth']);
Route::post('logout', [SocialController::class, 'logout'])->name('logout');

Route::prefix('import')->name('import.')->group(function () {
    Route::get('/', [ImportController::class, 'index'])->name('index');
    Route::get('/type', [ImportController::class, 'type'])->name('type');
    Route::post('/type', [ImportController::class, 'importType']);
    Route::get('/issurer', [ImportController::class, 'issurer'])->name('issurer');
    Route::post('/issurer', [ImportController::class, 'importIssurer']);
    Route::get('/work', [ImportController::class, 'work'])->name('work');
    Route::post('/work', [ImportController::class, 'importWork']);
    Route::get('/project', [ImportController::class, 'project'])->name('project');
    Route::post('/project', [ImportController::class, 'importProject']);
});

Route::prefix('manage')->name('manage.')->group(function () {
    Route::get('/', [ManageController::class, 'index'])->name('index');
    Route::get('/add', [ManageController::class, 'add'])->name('add');
    Route::get('/profile', [ManageController::class, 'profile'])->name('profile');
    Route::post('/profile', [ManageController::class, 'updateprofile']);
});
