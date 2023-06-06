<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Agents
    Route::post('agents/media', 'AgentsApiController@storeMedia')->name('agents.storeMedia');
    Route::apiResource('agents', 'AgentsApiController');

    // Client
    Route::post('clients/media', 'ClientApiController@storeMedia')->name('clients.storeMedia');
    Route::apiResource('clients', 'ClientApiController');

    // Post
    Route::post('posts/media', 'PostApiController@storeMedia')->name('posts.storeMedia');
    Route::apiResource('posts', 'PostApiController');

    // Access Token
    Route::apiResource('access-tokens', 'AccessTokenApiController');

    // Quote
    Route::apiResource('quotes', 'QuoteApiController');

    // Customer
    Route::apiResource('customers', 'CustomerApiController');

    // Disclaimer Group
    Route::apiResource('disclaimer-groups', 'DisclaimerGroupApiController');

    // Disclaimer Type
    Route::post('disclaimer-types/media', 'DisclaimerTypeApiController@storeMedia')->name('disclaimer-types.storeMedia');
    Route::apiResource('disclaimer-types', 'DisclaimerTypeApiController');

    // Disclaimer Variable
    Route::apiResource('disclaimer-variables', 'DisclaimerVariableApiController');

    // Email History
    Route::apiResource('email-histories', 'EmailHistoryApiController');

    // Keyword
    Route::apiResource('keywords', 'KeywordApiController');

    // Keyword App
    Route::apiResource('keyword-apps', 'KeywordAppApiController');

    // Keyword Prerender
    Route::apiResource('keyword-prerenders', 'KeywordPrerenderApiController');

    // Lending Officer
    Route::post('lending-officers/media', 'LendingOfficerApiController@storeMedia')->name('lending-officers.storeMedia');
    Route::apiResource('lending-officers', 'LendingOfficerApiController');

    // Listing
    Route::apiResource('listings', 'ListingApiController');

    // Note
    Route::apiResource('notes', 'NoteApiController');

    // Listing Pocket
    Route::apiResource('listing-pockets', 'ListingPocketApiController');

    // Board
    Route::post('boards/media', 'BoardApiController@storeMedia')->name('boards.storeMedia');
    Route::apiResource('boards', 'BoardApiController');

    // State Resident
    Route::apiResource('state-residents', 'StateResidentApiController');

    // State
    Route::apiResource('states', 'StateApiController');

    // Status Type
    Route::apiResource('status-types', 'StatusTypeApiController');

    // Carrier
    Route::apiResource('carriers', 'CarrierApiController');

    // Chart
    Route::apiResource('charts', 'ChartApiController');

    // Phone
    Route::apiResource('phones', 'PhoneApiController');

    // Sponsor
    Route::post('sponsors/media', 'SponsorApiController@storeMedia')->name('sponsors.storeMedia');
    Route::apiResource('sponsors', 'SponsorApiController');

    // Sms Template
    Route::apiResource('sms-templates', 'SmsTemplateApiController');

    // Sms Template Default
    Route::apiResource('sms-template-defaults', 'SmsTemplateDefaultApiController');
});
