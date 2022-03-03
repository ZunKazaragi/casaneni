<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;

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
Route::get('/prototype', [HomeController::class, 'index']);
Route::resources([
    '/proto/transaction' => TransactionController::class
]);

// Route::get('/{path?}', function () {
//     return view('app');
// });

// Route::get('/login', function() {
//     return view('app');
// })->name('login');

