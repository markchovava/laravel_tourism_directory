<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\PlaceCategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceGuideController;
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
    /* CATEGORY */
    Route::prefix('category')->group(function() {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'view']);
        Route::post('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'delete']);
    });
    Route::get('/category-all', [CategoryController::class, 'indexAll']);
    /* ADVERTS */
    Route::prefix('advert')->group(function() {
        Route::get('/', [AdvertController::class, 'index']);
        Route::post('/', [AdvertController::class, 'store']);
        Route::get('/{id}', [AdvertController::class, 'view']);
        Route::post('/{id}', [AdvertController::class, 'update']);
        Route::delete('/{id}', [AdvertController::class, 'delete']);
    });
    Route::get('advert-by-user', [AdvertController::class, 'indexByUser']);
    /* EVENTS */
    Route::prefix('event')->group(function() {
        Route::get('/', [EventController::class, 'index']);
        Route::post('/', [EventController::class, 'store']);
        Route::get('/{id}', [EventController::class, 'view']);
        Route::post('/{id}', [EventController::class, 'update']);
        Route::delete('/{id}', [EventController::class, 'delete']);
    });
    Route::get('event-by-user', [EventController::class, 'indexByUser']);
    /* PROVINCE */
    Route::prefix('province')->group(function() {
        Route::get('/', [ProvinceController::class, 'index']);
        Route::post('/', [ProvinceController::class, 'store']);
        Route::get('/{id}', [ProvinceController::class, 'view']);
        Route::post('/{id}', [ProvinceController::class, 'update']);
        Route::delete('/{id}', [ProvinceController::class, 'delete']);
    });
    Route::get('/province-all', [ProvinceController::class, 'indexAll']);
    /* CITY */
    Route::prefix('city')->group(function() {
        Route::get('/', [CityController::class, 'index']);
        Route::post('/', [CityController::class, 'store']);
        Route::get('/{id}', [CityController::class, 'view']);
        Route::post('/{id}', [CityController::class, 'update']);
        Route::delete('/{id}', [CityController::class, 'delete']);
    });
    Route::get('/city-all', [CityController::class, 'indexAll']);
    /* PLACE */
    Route::prefix('place')->group(function() {
        Route::get('/', [PlaceController::class, 'index']);
        Route::post('/', [PlaceController::class, 'store']);
        Route::get('/{id}', [PlaceController::class, 'view']);
        Route::post('/{id}', [PlaceController::class, 'update']);
        Route::delete('/{id}', [PlaceController::class, 'delete']);
    });
    Route::get('/place-province-guide', [PlaceController::class, 'indexProvinceGuide']);
    Route::get('/place-city-guide', [PlaceController::class, 'indexCityGuide']);


    Route::prefix('place-image')->group(function() {
        Route::delete('/{id}', [PlaceImageController::class, 'delete']);
    });

    /* GUIDE */
    Route::prefix('guide')->group(function() {
        Route::get('/', [GuideController::class, 'index']);
        Route::post('/', [GuideController::class, 'store']);
        Route::get('/{id}', [GuideController::class, 'view']);
        Route::post('/{id}', [GuideController::class, 'update']);
        Route::delete('/{id}', [GuideController::class, 'delete']);
    });
    Route::get('/guide-all', [GuideController::class, 'indexAll']);

    /* PLACE-GUIDE */
    Route::prefix('place-guide')->group(function() {
        Route::post('/', [PlaceGuideController::class, 'store']);
        Route::delete('/{id}', [PlaceGuideController::class, 'delete']);
    });
    Route::get('/place-guide-by-id/{id}', [PlaceGuideController::class, 'guidesByPlaceId']);

    /* PLACE CATEGORY */
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
