<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PlaceCategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceImageController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::post('/password', [AuthController::class, 'password']);
    Route::get('/logout', [AuthController::class, 'logout']);
    
    Route::prefix('auth')->group(function() {
        Route::get('/', [AuthController::class, 'view']);
        Route::post('/', [AuthController::class, 'update']);
        Route::post('/email', [AuthController::class, 'emailUpdate']);
    });

    Route::prefix('category')->group(function() {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'view']);
        Route::post('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'delete']);
    });
    Route::get('/category-all', [CategoryController::class, 'indexAll']);

    Route::prefix('province')->group(function() {
        Route::get('/', [ProvinceController::class, 'index']);
        Route::post('/', [ProvinceController::class, 'store']);
        Route::get('/{id}', [ProvinceController::class, 'view']);
        Route::post('/{id}', [ProvinceController::class, 'update']);
        Route::delete('/{id}', [ProvinceController::class, 'delete']);
    });
    Route::get('/province-all', [ProvinceController::class, 'indexAll']);


    Route::prefix('city')->group(function() {
        Route::get('/', [CityController::class, 'index']);
        Route::post('/', [CityController::class, 'store']);
        Route::get('/{id}', [CityController::class, 'view']);
        Route::post('/{id}', [CityController::class, 'update']);
        Route::delete('/{id}', [CityController::class, 'delete']);
    });
    Route::get('/city-all', [CityController::class, 'indexAll']);


    Route::prefix('place')->group(function() {
        Route::get('/', [PlaceController::class, 'index']);
        Route::post('/', [PlaceController::class, 'store']);
        Route::get('/{id}', [PlaceController::class, 'view']);
        Route::post('/{id}', [PlaceController::class, 'update']);
        Route::delete('/{id}', [PlaceController::class, 'delete']);
    });
    Route::prefix('place-image')->group(function() {
        Route::delete('/{id}', [PlaceImageController::class, 'delete']);
    });

    Route::prefix('place-category')->group(function() {
        Route::post('/', [PlaceCategoryController::class, 'store']);
    });
    Route::delete('/place-category/{id}', [PlaceCategoryController::class, 'delete']);
    Route::get('/place-category-by-id/{id}', [PlaceCategoryController::class, 'categoriesByPlaceId']);
   

    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'view']);
        Route::post('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'delete']);
    });

    Route::prefix('role')->group(function() {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::get('/{id}', [RoleController::class, 'view']);
        Route::post('/{id}', [RoleController::class, 'update']);
        Route::delete('/{id}', [RoleController::class, 'delete']);
    });
    Route::get('/role-all', [RoleController::class, 'indexAll']);

    Route::prefix('app-info')->group(function() {
        Route::get('/', [AppInfoController::class, 'view']);
        Route::post('/', [AppInfoController::class, 'update']);
    });

   

});
