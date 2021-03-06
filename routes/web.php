<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

    Route::post('products/upload', 'ProductsController@upload')->name('products.upload');

    Route::delete('suppliers/destroy', 'SuppliersController@massDestroy')->name('suppliers.massDestroy');

    Route::resource('suppliers', 'SuppliersController');

    Route::delete('sections/destroy', 'SectionsController@massDestroy')->name('sections.massDestroy');

    Route::resource('sections', 'SectionsController');

    Route::delete('salesPersons/destroy', 'SalesPersonsController@massDestroy')->name('salesPersons.massDestroy');

    Route::resource('salesPersons', 'SalesPersonsController');

    // Route::delete('customers/destroy', 'CustomersPersonsController@massDestroy')->name('customers.massDestroy');

    Route::resource('customers', 'CustomersController');
  
    Route::delete('purchases/destroy', 'PurchasesController@massDestroy')->name('purchases.massDestroy');

    Route::resource('purchases', 'PurchasesController');






    Route::get('/inventory', 'HomeController@inventory')->name('dashboards.inventory');
});
