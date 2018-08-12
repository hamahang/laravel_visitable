<?php
Route::group(['prefix' => config('laravel_visitable.frontend_lvs_route_prefix'), 'namespace' => 'ArtinCMS\LVS\Controllers', 'middleware' => config('laravel_visitable.frontend_lvs_middlewares')], function () {
    Route::post('visitItem', ['as' => 'LVS.visitItem', 'uses' => 'VisitController@visitItem']);
});