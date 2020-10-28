<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/login', 'Admin\AuthController@get_admin_login')->name('adminLogin');
Route::post('admin/post-login', 'Admin\AuthController@post_admin_login')->name('post-login');

Route::group(['middleware'=>['check-auth-admin'],'prefix' => 'admin','namespace'=>'Admin'],function(){
    Route::get('/logout','AuthController@logout')->name('logout');

    Route::get('/','MainController@main')->name('admin');
    Route::resource('client','ClientController');
    Route::resource('product','ProductController');
    Route::resource('company','CompanyController');
    Route::resource('coupon','CouponController');
    Route::resource('order','OrderController');
    Route::resource('representative','RepresentativeController');
    Route::resource('user','UserController');
    Route::resource('setting','SettingController');
    Route::resource('page','FixedPagesController');
    Route::resource('companyaccount','CompanyAccountController');
    Route::resource('representativeaccount','RepresentativeAccountController');
    Route::resource('commission','CommissionController');
    Route::resource('company_register','CompanyRegisterController');
    Route::put('user-change-password/{id}','UserController@changePassword');
    Route::put('rep-change-password/{id}','RepresentativeController@changePassword');
    Route::put('company-change-password/{id}','CompanyController@changePassword');
    Route::put('stopclient/{id}','ClientController@stopclient');
    Route::put('stopcompany/{id}','CompanyController@stopcompany');
    Route::put('stoprepresentative/{id}','RepresentativeController@stoprep');
    Route::put('agreecompany/{id}','CompanyRegisterController@agreeComp');
    Route::put('confirmcommission/{id}','CommissionController@confirm');
    Route::put('cancelorder/{id}','OrderController@cancel');
    Route::get('notices','NotificationController@notify');
    Route::post('post-notices','NotificationController@notification')->name("post-notices");

    Route::get('value-added','OrderController@reportValueAdded')->name("value-added");

    Route::resource('city', 'CityController');
});






// company routes
Route::get('/company/register', 'Company\AuthController@getRegister');
Route::post('/company/register', 'Company\AuthController@Register');
Route::get('/company/login', 'Company\AuthController@get_company_login');
Route::post('company/post-login', 'Company\AuthController@post_company_login')->name('login-company');
Route::group(['middleware'=>['check-auth-company'],'prefix' => 'company','namespace'=>'Company'],function(){
    Route::get('/logout', 'AuthController@logout')->name('company-logout');

    Route::get('/home', 'HomeController@index')->name('home-company');
    Route::resource('orders', 'OrderController');
    Route::resource('commission', 'CommissionController');
    Route::resource('previous_order', 'PreviousOrderController');
    Route::resource('representative', 'RepresentativeController');
    Route::put('rep-change-password/{id}','RepresentativeController@changePassword');
    Route::put('stoprepresentative/{id}','RepresentativeController@stoprep');
    Route::resource('representative_report', 'RepresentativeReportController');
    Route::get('mydata', 'DataController@index');
    Route::put('mydata/{company_id}', 'DataController@update');
    Route::resource('site_account', 'SiteAccountController');
    Route::put('cancelorder/{id}','OrderController@cancel');
    Route::put('confirmorder/{id}','OrderController@confirm');
    Route::put('confirmRep/{id}','OrderController@confirmRep');
    Route::put('confirmcommission/{id}','SiteAccountController@confirm');


    Route::resource('products', 'ProductController');
});