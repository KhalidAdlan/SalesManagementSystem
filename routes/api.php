<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('products', 'ProductsApiController');
});

Route::post('login', 'Api\AppUsersController@login');
Route::post('register', 'Api\AppUsersController@register');

Route::group(['middleware' => 'auth:api'], function()
{
   Route::post('details', 'Api\AppUsersController@details');
   Route::get('customers', 'Api\AppUsersController@details');
});

// Route::group([
//     'middleware' => 'api',
//     'prefix'     => 'auth',
// ], function ($router) {
//     Route::post('login', 'AuthController@login');
//     Route::patch('update', 'AuthController@update');
//     Route::post('register', 'AuthController@register');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
// });
