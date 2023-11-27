<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Editor\EditorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/',[StoreController::class,'index'])->name('home_page');


//ADMIN:

Route::middleware(['admin'])->group(function () {
    Route::resource("products",ProductController::class);
    Route::resource("categories",CategoryController::class);

// routes/web.php

Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin_dashboard');
Route::get('/admin/dashboard',[DashboardController::class,'countEtudiant'])->name('admin_dashboard');
Route::get('/search','App\Http\Controllers\DashboardController@search');
Route::get('/searchCategory','App\Http\Controllers\DashboardController@searchCategory');
Route::get('/searchProduct','App\Http\Controllers\DashboardController@searchProduct');

});
Route::middleware(['editor'])->group(function () {

    Route::get('/editor/dashboard', [\App\Http\Controllers\Editor\EditorController::class,'index'])->name('editor_dashboard');
    // Other routes for editors can be added here
});





Auth::routes();

