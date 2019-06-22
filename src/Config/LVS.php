<?php

return [

    /* Important Settings */
    'backend_lvs_middlewares' =>  env('BACKEND_LVS_MIDDLEWARES', 'web'),
    'frontend_lvs_middlewares' => env('FRONTEND_LVS_MIDDLEWARES', 'web'),
    // you can change default route from sms-admin to anything you want
    'backend_lvs_route_prefix' =>  env('BACKEND_LVS_ROUTE_PERFIX', 'LVS'),
    'frontend_lvs_route_prefix' =>  env('FRONTEND_LVS_ROUTE_PERFIX', 'LVS'),
];