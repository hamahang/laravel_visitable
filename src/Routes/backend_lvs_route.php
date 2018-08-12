<?php
Route::group(['prefix' => config('laravel_visitable.backend_lcs_route_prefix'), 'namespace' => 'ArtinCMS\LVS\Controllers', 'middleware' => config('laravel_visitable.backend_lvs_middlewares')], function () {

});