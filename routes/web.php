<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
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


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::prefix('app-info')->group(function() {
    Route::get('/', [AppInfoController::class, 'view']);
    Route::post('/', [AppInfoController::class, 'update']);
});


Route::prefix('category')->group(function() {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'view']);
});

Route::get('/category-by-slug', [CategoryController::class, 'categoryBySlug']);
Route::get('/category-one', [CategoryController::class, 'indexOne']);
Route::get('/category-places', [CategoryController::class, 'categoryPlaces']);
Route::get('/category-places-by-search', [CategoryController::class, 'categoryPlacesSearchByNameCitySlug']);

/* CITY */
Route::get('/city', [CityController::class, 'index']);
Route::get('/city-all', [CityController::class, 'indexAll']);
Route::get('/city-one', [CityController::class, 'indexOne']);
Route::get('/city-places-by-search', [CityController::class, 'cityPlacesSearchByName']);
Route::get('/city-places', [CityController::class, 'cityPlaces']);
Route::get('/city-by-slug', [CityController::class, 'cityBySlug']);
Route::get('/city-category-places', [CityController::class, 'cityCategoryPlaces']);
/* PLACE */
Route::prefix('place')->group(function() {
    Route::get('/', [PlaceController::class, 'index']);
    Route::get('/{id}', [PlaceController::class, 'view']);
});
Route::get('/place-one', [PlaceController::class, 'indexOne']);
/* PROVINCES */
Route::prefix('province')->group(function() {
    Route::get('/', [ProvinceController::class, 'index']);
    Route::get('/{id}', [ProvinceController::class, 'view']);
});
Route::get('/province-all', [ProvinceController::class, 'indexAll']);
Route::get('/province-cities', [ProvinceController::class, 'provinceCities']);
Route::get('/province-by-slug', [ProvinceController::class, 'provinceBySlug']);
Route::get('/province-category-places', [ProvinceController::class, 'provinceCategoryPlaces']);
/* ROLE */
Route::prefix('role')->group(function() {
    Route::get('/', [RoleController::class, 'index']);
    Route::get('/{id}', [RoleController::class, 'view']);
});






