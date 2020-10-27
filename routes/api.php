<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/apply-subscription', 'CouponController@applySubscription')->name('apply-subscription');
