<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('hastalars', 'HastalarApiController');

    Route::apiResource('takiplers', 'TakiplerApiController');

    Route::apiResource('notlars', 'NotlarApiController');

    Route::apiResource('dokumanlars', 'DokumanlarApiController');

    Route::apiResource('laboratuvars', 'LaboratuvarApiController');

    Route::apiResource('ameliyatlars', 'AmeliyatlarApiController');

    Route::apiResource('usgs', 'UsgApiController');

    Route::apiResource('muayanes', 'MuayaneApiController');

    Route::apiResource('trimesterbirs', 'TrimesterbirApiController');

    Route::apiResource('trimesterikiucs', 'TrimesterikiucApiController');

    Route::apiResource('hasta-kategorileris', 'HastaKategorileriApiController');

    Route::apiResource('ilaclars', 'IlaclarApiController');

    Route::apiResource('recetelers', 'RecetelerApiController');

    Route::apiResource('receteitems', 'ReceteitemApiController');
});
