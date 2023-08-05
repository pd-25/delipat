<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalseforceController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('services', ServiceController::class);
Route::get('salseforces', [SalseforceController::class, 'index'])->name('salseforces.index');
Route::get('salseforces/create', [SalseforceController::class, 'create'])->name('salseforces.create');
Route::get('salseforces-content/create', [SalseforceController::class, 'sConCreate'])->name('salseforces.sConCreate');


Route::post('/change-status', [ServiceController::class, 'changeStatus'])->name('service.status');
Route::get('/add-content', [ServiceController::class, 'addContent'])->name('add-content');
Route::post('/add-content', [ServiceController::class, 'createContent'])->name('createContent');
Route::post('/edit-content/{id}', [ServiceController::class, 'editContent'])->name('editContent');
Route::get('/pageService/{service_slug}', [ServiceController::class, 'serviceContent'])->name('serviceContent');
Route::get('/site-information', [HomeController::class, 'siteInfo'])->name('siteInfo');
Route::post('/site-information', [HomeController::class, 'updateSite'])->name('updateSite');
Route::get('log-out', [HomeController::class, 'adminLogout'])->name('admin.logout');


// 


});
