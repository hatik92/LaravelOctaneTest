<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SanctumController;
use App\Http\Controllers\SendEmailController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user/{id}', function(Request $request, $id){
    $user = User::find($id);
    if(!$user) return response('', 404);
    return $user;
});

Route::post('/sign-in', [AuthController::class, 'logIn']);
Route::post('/auth', [SanctumController::class, 'create']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


Route::get('send-email', [SendEmailController::class, 'index']);
