<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;

use App\Models\Post;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // create Post
// Route::post('/posts', [PostController::class, 'store']);

// // get all Post Route
// Route::get('/posts', [PostController::class, 'index']);

// // Single Post Route
// Route::get('/posts/{id}', [PostController::class, 'show']);

// // Update Post Route
// Route::put('/posts/{id}', [PostController::class, 'update']);

// // Delete route
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::resource('posts', BlogController::class);
});




