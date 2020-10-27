<?php
Route::get('/', 'Auth\AuthController@login')->name('login');
Route::get('/login', 'Auth\AuthController@login');

Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/login")
      ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    //User List
    Route::get('/user-list', 'HomeController@add_user_view')->name('user-list');
    Route::post('/save-user', 'UserController@addNewUser')->name('save-user');

    //Smart Pharmacy
    Route::get('/spe-list', 'SmartPharmacyController@index')->name('spe-list');
    Route::post('/save-pharmacy', 'SmartPharmacyController@addNewPharmacy')->name('save-pharmacy');

    //Change Request
    Route::get('/change-request', 'ChangeRequestController@index')->name('change-request');
    Route::post('/save-cr', 'ChangeRequestController@addNewCR')->name('save-cr');

    //Coupon 
    Route::get('/coupon', 'CouponController@index')->name('coupon');
    Route::post('/generate-coupon', 'CouponController@generate_coupon')->name('generate-coupon');
    //Route::post('/apply-subscription', 'CouponController@applySubscription')->name('apply-subscription');

    //Monthly Bill
    Route::get('/monthly-bill', 'MonthlyBillController@monthlyBill')->name('monthly-bill');
    Route::post('/save-monthly-bill', 'MonthlyBillController@addNewMonthlyBill')->name('save-monthly-bill');
});

Route::post('/apply-subscription', 'CouponController@applySubscription')->name('apply-subscription');

