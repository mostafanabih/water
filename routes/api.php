<?php

use Illuminate\Http\Request;


Route::get('/mm', function (){
    $order_date = \App\Order::find(23)->created_at;

    echo $order_date;
    echo '<br>';
    echo date('Y-m-d', strtotime("next tuesday", strtotime($order_date)));
});

Route::group(['prefix' => 'v1'], function () {
    //auth operations
    Route::post('login', ['uses' => 'Api\client\AuthController@Login']);
    Route::post('sign-up', ['uses' => 'Api\client\AuthController@SignUp']);
    Route::post('reset-password', ['uses' => 'Api\client\AuthController@ResetPassword']);
    Route::post('new-password-save', ['uses' => 'Api\client\AuthController@NewPasswordSave']);

    //fixed pages
    Route::get('/fixed-pages', ['uses' => 'Api\client\V1APIController@FixedPages']);
    Route::get('/fixed-page/{id}', ['uses' => 'Api\client\V1APIController@FixedPageDetails']);

    //companies & products
    Route::get('/companies', ['uses' => 'Api\client\V1APIController@GetCompanies']);
    Route::get('/products/{company_id}/{kind}', ['uses' => 'Api\client\V1APIController@GetProducts']);
    Route::get('/mosque-products/{id}', ['uses' => 'Api\client\V1APIController@GetMosqueProducts']);
    Route::get('/offer-products/{id}', ['uses' => 'Api\client\V1APIController@GetOfferProducts']);

    /*contact us*/
    Route::get('/site-info', ['uses' => 'Api\client\V1APIController@SiteInfo']);
    Route::get('/contact-us-info', ['uses' => 'Api\client\V1APIController@ContactUsInfo']);
    Route::post('contact-us', ['uses' => 'Api\client\V1APIController@ContactUs']);

    /* company dates */
    Route::get('/company-dates/{id}', ['uses' => 'Api\client\V1APIController@GetCompanyDates']);

    /* search */
    Route::post('/search', ['uses' => 'Api\client\V1APIController@Search']);
    /* cities */
    Route::get('/get-cities', ['uses' => 'Api\client\V1APIController@GetCities']);
    /* companies of city */
    Route::get('/get-companies-of-city/{id}', ['uses' => 'Api\client\V1APIController@GetCompaniesOfCity']);

    Route::group(['middleware' => 'IsClient'], function () {
        //auth operations
        Route::post('logout', ['uses' => 'Api\client\AuthController@Logout']);

        //profile operations
        Route::get('edit-client', ['uses' => 'Api\client\V1APIController@EditClient']);
        Route::post('update-client', ['uses' => 'Api\client\V1APIController@UpdateClient']);
        Route::post('update-password', ['uses' => 'Api\client\V1APIController@UpdatePassword']);

        //previous locations
        Route::get('show-locations', ['uses' => 'Api\client\V1APIController@ShowLocations']);
        Route::post('add-location', ['uses' => 'Api\client\V1APIController@AddLocation']);
        Route::post('remove-location/{id}', ['uses' => 'Api\client\V1APIController@RemoveLocation']);

        //add order
        Route::post('add-order', ['uses' => 'Api\client\V1APIController@AddOrder']);

        //get orders
        Route::get('current-orders', ['uses' => 'Api\client\V1APIController@GetCurrentOrders']);
        Route::get('done-orders', ['uses' => 'Api\client\V1APIController@GetDoneOrders']);

        //rate order
        Route::post('rate-order', ['uses' => 'Api\client\V1APIController@RateOrder']);
        //cancel order
        Route::post('cancel-order', ['uses' => 'Api\client\V1APIController@CancelOrder']);
        Route::get('cancel-reason/{id}', ['uses' => 'Api\client\V1APIController@GetCancelReason']);

        //order details
        Route::get('order-details/{id}', ['uses' => 'Api\client\V1APIController@GetOrderDetails']);

        //notifications
        Route::get('/notifications', ['uses' => 'Api\client\V1APIController@GetNotifications']);
        Route::post('/read-notification/{id}', ['uses' => 'Api\client\V1APIController@ReadNotification']);

        /* check coupon */
        Route::post('/check-coupon', ['uses' => 'Api\client\V1APIController@CheckCoupon']);
    });



    /* representative here */
    Route::post('rep-login', ['uses' => 'Api\representative\AuthController@Login']);

    Route::group(['middleware' => 'IsRepresentative_'], function (){
        Route::post('rep-logout', ['uses' => 'Api\representative\AuthController@Logout']);

        //profile operations
        Route::get('edit-representative', ['uses' => 'Api\representative\V1APIController@EditRepresentative']);
        Route::post('update-representative', ['uses' => 'Api\representative\V1APIController@UpdateRepresentative']);
        Route::post('rep-update-password', ['uses' => 'Api\representative\V1APIController@RepUpdatePassword']);

        //notifications
        Route::get('/rep-notifications', ['uses' => 'Api\representative\V1APIController@RepGetNotifications']);
        Route::post('/rep-read-notification/{id}', ['uses' => 'Api\representative\V1APIController@RepReadNotification']);

        //get orders
        Route::get('rep-current-orders', ['uses' => 'Api\representative\V1APIController@RepGetCurrentOrders']);
        Route::get('rep-done-orders', ['uses' => 'Api\representative\V1APIController@RepGetDoneOrders']);

        //order details
        Route::get('rep-order-details/{id}', ['uses' => 'Api\representative\V1APIController@RepGetOrderDetails']);

        //cancel order
        Route::post('rep-cancel-order', ['uses' => 'Api\representative\V1APIController@RepCancelOrder']);

        //deliver order
        Route::post('rep-deliver-order', ['uses' => 'Api\representative\V1APIController@RepDeliverOrder']);
    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
