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

    Route::delete('hastalars/destroy', 'HastalarController@massDestroy')->name('hastalars.massDestroy');

    Route::resource('hastalars', 'HastalarController');

    Route::delete('takiplers/destroy', 'TakiplerController@massDestroy')->name('takiplers.massDestroy');

    Route::resource('takiplers', 'TakiplerController');

    Route::post('takiplers/{id}', ['uses' => 'TakiplerController@store', 'as' => 'takiplers.store']);

    Route::delete('notlars/destroy', 'NotlarController@massDestroy')->name('notlars.massDestroy');

    Route::resource('notlars', 'NotlarController');
    Route::post('notlars/{id}', ['uses' => 'NotlarController@store', 'as' => 'notlars.store']);

    Route::delete('dokumanlars/destroy', 'DokumanlarController@massDestroy')->name('dokumanlars.massDestroy');

    Route::resource('dokumanlars', 'DokumanlarController');

    Route::post('dokumanlars/media', 'DokumanlarController@storeMedia')->name('dokumanlars.storeMedia');
    Route::post('dokumanlars/{id}', ['uses' => 'DokumanlarController@store', 'as' => 'dokumanlars.store']);

    Route::delete('laboratuvars/destroy', 'LaboratuvarController@massDestroy')->name('laboratuvars.massDestroy');

    Route::resource('laboratuvars', 'LaboratuvarController');
    Route::post('laboratuvars/{id}', ['uses' => 'LaboratuvarController@store', 'as' => 'laboratuvars.store']);


    Route::post('laboratuvars/media', 'LaboratuvarController@storeMedia')->name('laboratuvars.storeMedia');

    Route::delete('ameliyatlars/destroy', 'AmeliyatlarController@massDestroy')->name('ameliyatlars.massDestroy');

    Route::resource('ameliyatlars', 'AmeliyatlarController');
    Route::post('ameliyatlars/{id}', ['uses' => 'AmeliyatlarController@store', 'as' => 'ameliyatlars.store']);

    Route::delete('usgs/destroy', 'UsgController@massDestroy')->name('usgs.massDestroy');

    Route::resource('usgs', 'UsgController');

    Route::post('usgs/{id}', ['uses' => 'UsgController@store', 'as' => 'usgs.store']);


    Route::delete('muayanes/destroy', 'MuayaneController@massDestroy')->name('muayanes.massDestroy');

    Route::resource('muayanes', 'MuayaneController');

    Route::post('muayanes/{id}', ['uses' => 'MuayaneController@store', 'as' => 'muayanes.store']);


    Route::delete('trimesterbirs/destroy', 'TrimesterbirController@massDestroy')->name('trimesterbirs.massDestroy');

    Route::resource('trimesterbirs', 'TrimesterbirController');
    Route::post('trimesterbirs/{id}', ['uses' => 'TrimesterbirController@store', 'as' => 'trimesterbirs.store']);

    Route::delete('trimesterikiucs/destroy', 'TrimesterikiucController@massDestroy')->name('trimesterikiucs.massDestroy');

    Route::resource('trimesterikiucs', 'TrimesterikiucController');
    Route::post('trimesterikiucs/{id}', ['uses' => 'TrimesterikiucController@store', 'as' => 'trimesterikiucs.store']);

    Route::delete('hasta-kategorileris/destroy', 'HastaKategorileriController@massDestroy')->name('hasta-kategorileris.massDestroy');

    Route::resource('hasta-kategorileris', 'HastaKategorileriController');

    Route::delete('ilaclars/destroy', 'IlaclarController@massDestroy')->name('ilaclars.massDestroy');

    Route::resource('ilaclars', 'IlaclarController');

    Route::delete('recetelers/destroy', 'RecetelerController@massDestroy')->name('recetelers.massDestroy');

    Route::resource('recetelers', 'RecetelerController');
    Route::post('recetelers/{id}', ['uses' => 'RecetelerController@store', 'as' => 'recetelers.store']);


    Route::delete('receteitems/destroy', 'ReceteitemController@massDestroy')->name('receteitems.massDestroy');

    Route::resource('receteitems', 'ReceteitemController');
});
