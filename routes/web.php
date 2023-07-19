<?php
namespace App\Http\Controllers;

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
    return view('welcome');
});
Route:: get('/welcome', function () {
    echo "selamat datang di laravel";
});

Route::get('/greeting', function() {
    return view('greeting');
});

Route::middleware(['Auth'])->group(function(){
    Route::get('/mobil',[MobilController::class, 'index']);
    Route::get('/mobil/create',[MobilController::class, 'create']);
    Route::post('/mobil/simpanData',[MobilController::class, 'store']);

//route merk
    Route::get('/merk', [MerkController::class,'index']);
    Route::get('/merk/create',[MerkController::class, 'create']);
    Route::post('/merk/simpan-data',[MerkController::class, 'store']);
    Route::get('/merk/edit/{id}', [MerkController::class, 'edit']);
    Route::post('/merk/update/{id}', [MerkController::class, 'update']);
    Route::get('/merk/delete/{id}', [MerkController::class,'delete']);

    //route tipe mobil
    Route::get('/tipemobil',[TipeMobilController::class,'index']);
    Route::get('/tipemobil/create',[TipeMobilController::class,'create']);
    Route::post('/tipemobil/simpan-data',[TipeMobilController::class,'store']);
    Route::get('/tipemobil/edit/{id}',[TipeMobilController::class,'edit']);
    Route::post('/tipemobil/update/{id}',[TipeMobilController::class,'update']);
    Route::get('/tipemobil/delete/{id}',[TipeMobilController::class,'delete']);
});



Route::get('/login',[auth\LoginController::class, 'index'])->name('l ogin');
Route::post('/login/proses', [Auth\LoginController::class, 'login']);
Route::get('/logout',[auth\LoginController::class, 'logout']);

Route::get('/register',[auth\registerController::class, 'index']);
Route::post('/register/proses', [Auth\registerController::class, 'register']);