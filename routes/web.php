<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Agents
    Route::delete('agents/destroy', 'AgentsController@massDestroy')->name('agents.massDestroy');
    Route::post('agents/media', 'AgentsController@storeMedia')->name('agents.storeMedia');
    Route::post('agents/ckmedia', 'AgentsController@storeCKEditorImages')->name('agents.storeCKEditorImages');
    Route::resource('agents', 'AgentsController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientController@storeMedia')->name('clients.storeMedia');
    Route::post('clients/ckmedia', 'ClientController@storeCKEditorImages')->name('clients.storeCKEditorImages');
    Route::resource('clients', 'ClientController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Access Token
    Route::delete('access-tokens/destroy', 'AccessTokenController@massDestroy')->name('access-tokens.massDestroy');
    Route::resource('access-tokens', 'AccessTokenController');

    // Quote
    Route::delete('quotes/destroy', 'QuoteController@massDestroy')->name('quotes.massDestroy');
    Route::resource('quotes', 'QuoteController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::resource('customers', 'CustomerController');

    // Disclaimer Group
    Route::delete('disclaimer-groups/destroy', 'DisclaimerGroupController@massDestroy')->name('disclaimer-groups.massDestroy');
    Route::resource('disclaimer-groups', 'DisclaimerGroupController');

    // Disclaimer Type
    Route::delete('disclaimer-types/destroy', 'DisclaimerTypeController@massDestroy')->name('disclaimer-types.massDestroy');
    Route::post('disclaimer-types/media', 'DisclaimerTypeController@storeMedia')->name('disclaimer-types.storeMedia');
    Route::post('disclaimer-types/ckmedia', 'DisclaimerTypeController@storeCKEditorImages')->name('disclaimer-types.storeCKEditorImages');
    Route::resource('disclaimer-types', 'DisclaimerTypeController');

    // Disclaimer Variable
    Route::delete('disclaimer-variables/destroy', 'DisclaimerVariableController@massDestroy')->name('disclaimer-variables.massDestroy');
    Route::resource('disclaimer-variables', 'DisclaimerVariableController');

    // Email History
    Route::delete('email-histories/destroy', 'EmailHistoryController@massDestroy')->name('email-histories.massDestroy');
    Route::resource('email-histories', 'EmailHistoryController');

    // Keyword
    Route::delete('keywords/destroy', 'KeywordController@massDestroy')->name('keywords.massDestroy');
    Route::resource('keywords', 'KeywordController');

    // Lending Officer
    Route::delete('lending-officers/destroy', 'LendingOfficerController@massDestroy')->name('lending-officers.massDestroy');
    Route::resource('lending-officers', 'LendingOfficerController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
