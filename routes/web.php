<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SendEmailController;
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
static $val = [];
Route::get('/', function () use (&$val) {
    $val[] = time();
    dd($val);
});

// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::post('/products', [ProductController::class, 'index'])->name('products');
//     Route::get('/aaaa', [ProductController::class, 'info']);
//     Route::get('/test', [ProductController::class, 'test']);
//     Route::get('/test2', [ProductController::class, 'test2']);
// });

// Route::get('test', function () {
//     dd('Hello World!');
// });
// Route::get('login', function () {
//     return view('components.login.login');
// })->name('login');

// Route::get('provider', function(){
//     dd(app('service')->appId() == spl_object_hash(app()) ? 'Same' : 'Different');
// });

Route::get('send-email', [SendEmailController::class, 'index']);
