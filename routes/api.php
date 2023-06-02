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
    Route::apiResource('clients', 'ClientApiController');

    // Post
    Route::post('posts/media', 'PostApiController@storeMedia')->name('posts.storeMedia');
    Route::apiResource('posts', 'PostApiController');
});
