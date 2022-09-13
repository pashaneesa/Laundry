<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::prefix('auth')->group(function() {
//     Route::post('register', [UserController::class, 'register']);
//     Route::post('login', [UserController::class, 'login']);
//     Route::post('checkToken', [UserController::class, 'checkToken']);
//     Route::post('logout', [UserController::class, 'logout']);
// });
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['jwt.verify']], function(){
		Route::resource('member', 'MemberController');
        Route::resource('paket', 'PaketController');

		Route::resource('member', 'MemberController');
    
    Route::resource('transaksi', 'TransaksiController');
    Route::resource('dtransaksi', 'DetailTransaksiController');

    // Route::group(['middleware' => ['api.admin']], function()
	// {
	// 	Route::post('/siswa', 'SiswaController@store');
	// 	Route::put('/siswa/{id}', 'SiswaController@update');
	// 	Route::delete('/siswa/{id}', 'SiswaController@destroy');
	// });
});
