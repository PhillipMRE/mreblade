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

    // Lending Officer
    Route::apiResource('lending-officers', 'LendingOfficerApiController');
});
