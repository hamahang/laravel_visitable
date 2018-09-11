<?php
Route::group(['prefix' => config('laravel_visitable.backend_lvs_route_prefix'), 'namespace' => 'ArtinCMS\LVS\Controllers', 'middleware' => config('laravel_visitable.backend_lvs_middlewares')], function () {
    Route::get('manageLvs', ['as' => 'LLS.manageLvs', 'uses' => 'VisitController@manageLvs']);
    Route::post('getVisitsGrid', ['as' => 'LVS.getVisitsGrid', 'uses' => 'VisitController@getVisitsGrid']);
});