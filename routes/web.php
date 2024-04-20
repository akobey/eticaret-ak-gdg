<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\front\CardController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\DashboardController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\MyOrdersController;
use App\Http\Controllers\front\ProductController;
use Illuminate\Support\Facades\Route;


/************** FRONT ******************/
Route::get('/', [FrontController::class, "index"])->name('index');

Route::get('/urun-listesi', [ProductController::class, "list"]);
Route::get('/urun-detay', [ProductController::class, "detail"]);

Route::get("/sepet", [CardController::class, 'card']);
Route::get("/odeme", [CheckoutController::class, 'index']);

Route::get("/siparislerim", [MyOrdersController::class, "index"]);
Route::get("/siparislerim-detay", [MyOrdersController::class, "detail"]);
/************** FRONT ******************/





/************ ADMIN ************/
Route::prefix("admin")->name('admin.')->middleware('auth')->group(function (){

    Route::get("/", [DashboardController::class, 'index'])->name('index');

});
/************ ADMIN ************/


/************ AUTH ************/
Route::prefix("kayit-ol")->middleware('throttle:registration')->group(function()
{
    Route::get("/", [RegisterController::class, 'showForm'])->name("register");
    Route::post("/", [RegisterController::class, 'register']);
});
Route::prefix('giris')->middleware('throttle:100,60')->group(function ()
{
    Route::get("/", [LoginController::class, 'showForm'])->name('login');
    Route::post("/", [LoginController::class, 'login']);
});
Route::post('logout', [LoginController::class, 'logout'])->name("logout");
Route::get('/dogrula/{token}', [RegisterController::class, 'verify'])->name("verify");
/************ AUTH ************/
