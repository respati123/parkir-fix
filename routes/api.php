<?php

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:api'], function(){

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function(){
        Route::resource('permissions', 'PermissionsController', ['expect' => ['create','edit']]);
    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function(){
        Route::resource('tariff', 'TariffController', ['expect' => ['create','edit']]);
        Route::post('getTariff', 'TariffController@getTariff');
    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function () {
        Route::resource('categories', 'CategoriesController', ['expect' => ['create', 'edit']]);
    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function () {
        Route::resource('vehicletypes', 'VehicleTypesController', ['expect' => ['create', 'edit']]);
    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function () {
        Route::resource('classes', 'classesController', ['expect' => ['create', 'edit']]);
    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function () {
        Route::resource('building', 'BuildingController', ['expect' => ['create', 'edit']]);
    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function () {
        Route::resource('location', 'LocationsController', ['expect' => ['create', 'edit']]);
    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function(){
        Route::resource('roles', 'RolesController', ['expect' => ['create','edit']]);
        Route::get('/getAllPermissions', function(){
            $permission = \App\Permission::all();
            return response()->json([
                'data' => $permission
            ]);
        });
    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function(){
        Route::resource('menus', 'MenusController', ['expect' => ['create','edit']]);
        Route::post('/deleteMenus', 'MenusController@deleteMenus');
        Route::get('/getMenus', 'RolesController@getMenus');
        Route::get("/get-last-id", "MenusController@getLastId");

    });

    Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function(){
        Route::resource('users', 'UsersController', ['expect' => ['create','edit']]);
        Route::post("/get_data_user", "UsersController@getDataUser");
    });


});

Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function () {
    Route::post('/login/check', 'LoginController@login')->name('checkLogin');
});

Route::group(['prefix' => '/v1', 'namespace' => 'Api\v1', 'as' => 'api.'], function () {
    Route::post('/register/admin', 'RegisterAdminController@register')->name('register');
});


// api not route

