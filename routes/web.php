<?php

// Keep all your existing routes as they are
Route::get('/','LandingPageController@index');
Route::get('/login','LandingPageController@index');
Route::post('/CheckUserName','LandingPageController@check_username');
Route::post('/getCountryCode','LandingPageController@GetCountryCode');
Route::post('/checkUserEmailId','LandingPageController@check_email');
Route::post('/CheckPhoneNumber','LandingPageController@check_phoneNumber');
Route::post('/getRegister','RegistrationController@getRegister');
Route::post('/firebase-register','RegistrationController@firebaseRegister');
Route::get('/activation/{id}','RegistrationController@accountActivation');
Route::post('/getlogindata','RegistrationController@getLogin');
Route::post('/firebase-login','RegistrationController@firebaseLogin');
Route::get('/home','RegistrationController@userHomePage');
Route::get('/logout','RegistrationController@logout');
Route::post('/forgot-pass-mail','RegistrationController@forgotPassMail');
Route::get('/service','LandingPageController@service');
Route::get('/about-us','LandingPageController@about_us');
Route::get('/contact','LandingPageController@contact');
Route::get('/faq','LandingPageController@faq');
Route::get('/change-password','RegistrationController@change_password');
Route::post('/change-password-data','RegistrationController@change_password_data');

// OLD deposit route (kept for compatibility - points to old RegistrationController)
Route::get('/deposit', 'RegistrationController@depositPage');

Route::get('/api/leaderboard','RegistrationController@leaderboardApi');
Route::get('/leaderboard', function(){ return view('leaderboard'); });
Route::get('/academy','RegistrationController@academyPage');
Route::get('/shop','RegistrationController@shopPage');
Route::get('/api/products','RegistrationController@productsApi');

// Cart endpoints
Route::post('/api/cart/add','CartController@addToCart');
Route::post('/api/cart/remove','CartController@removeFromCart');
Route::post('/api/cart/update','CartController@updateCart');
Route::get('/api/cart','CartController@getCartItems');
Route::post('/api/cart/clear','CartController@clearCart');

// Payment endpoints
Route::post('/api/checkout','PaymentController@initiateCheckout');
Route::post('/api/checkout/success','PaymentController@checkoutSuccess');
Route::get('/api/orders','PaymentController@orderHistory');
Route::post('/api/webhooks/stripe','PaymentController@stripeWebhook');
Route::post('/api/webhooks/paypal','PaymentController@paypalWebhook');

// Betting/Football routes
Route::get('/football','BettingController@footballPage');
Route::get('/hockey','BettingController@hockeyPage');
Route::get('/basketball','BettingController@basketballPage');
Route::get('/boxing','BettingController@boxingPage');
Route::get('/golf', function(){ return view('golf'); });
Route::get('/baseball', function(){ return view('baseball'); });
Route::get('/tennis', function(){ return view('tennis'); });
Route::get('/american-football','BettingController@americanFootballPage');
Route::get('/api/fixtures','BettingController@getFixtures');
Route::post('/api/bet/place','BettingController@placeBet');
Route::get('/api/bet/slip','BettingController@getBetSlip');
Route::post('/api/bet/remove','BettingController@removeBet');
Route::post('/api/bet/submit','BettingController@submitBetSlip');
Route::post('/search-username','NewsFeedController@SearchByUsername');

//-----newsfeed start-----------//
Route::get('/register', ['uses'=>'RegistrationController@Register','as'=>'Register']);
Route::get('/test-upload','testing@index');
Route::get('/post-upload','testing@postUpload');

// ============================================
// NEW: Flutterwave Payment Routes
// ============================================
Route::group(['middleware' => 'auth'], function () {
    // Wallet and deposit pages
    Route::get('/my-wallet', 'FlutterwaveController@wallet')->name('wallet.index');
    Route::get('/payment-page', 'FlutterwaveController@showDepositPage')->name('deposit.page');
    
    // Payment processing
    Route::post('/process-deposit', 'FlutterwaveController@initializeDeposit')->name('flutterwave.deposit');
    Route::get('/payment-callback', 'FlutterwaveController@callback')->name('flutterwave.callback');
    
    // Admin: Confirm manual payments (crypto & Skrill)
    Route::get('/admin/confirm-payment/{transactionId}', 'FlutterwaveController@confirmManualPayment')->name('confirm.manual.payment');
});

// Note: 
// - Old /deposit route still works (uses RegistrationController@depositPage)
// - New payment system uses: /payment-page, /my-wallet, /process-deposit