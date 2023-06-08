<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

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
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
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
    Route::post('posts/parse-csv-import', 'PostController@parseCsvImport')->name('posts.parseCsvImport');
    Route::post('posts/process-csv-import', 'PostController@processCsvImport')->name('posts.processCsvImport');
    Route::resource('posts', 'PostController');

    // Access Token
    Route::delete('access-tokens/destroy', 'AccessTokenController@massDestroy')->name('access-tokens.massDestroy');
    Route::resource('access-tokens', 'AccessTokenController');

    // Quote
    Route::delete('quotes/destroy', 'QuoteController@massDestroy')->name('quotes.massDestroy');
    Route::resource('quotes', 'QuoteController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/parse-csv-import', 'CustomerController@parseCsvImport')->name('customers.parseCsvImport');
    Route::post('customers/process-csv-import', 'CustomerController@processCsvImport')->name('customers.processCsvImport');
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

    // Keyword App
    Route::delete('keyword-apps/destroy', 'KeywordAppController@massDestroy')->name('keyword-apps.massDestroy');
    Route::resource('keyword-apps', 'KeywordAppController');

    // Keyword Prerender
    Route::delete('keyword-prerenders/destroy', 'KeywordPrerenderController@massDestroy')->name('keyword-prerenders.massDestroy');
    Route::resource('keyword-prerenders', 'KeywordPrerenderController');

    // Lending Officer
    Route::delete('lending-officers/destroy', 'LendingOfficerController@massDestroy')->name('lending-officers.massDestroy');
    Route::post('lending-officers/media', 'LendingOfficerController@storeMedia')->name('lending-officers.storeMedia');
    Route::post('lending-officers/ckmedia', 'LendingOfficerController@storeCKEditorImages')->name('lending-officers.storeCKEditorImages');
    Route::resource('lending-officers', 'LendingOfficerController');

    // Listing
    Route::delete('listings/destroy', 'ListingController@massDestroy')->name('listings.massDestroy');
    Route::resource('listings', 'ListingController');

    // Note
    Route::delete('notes/destroy', 'NoteController@massDestroy')->name('notes.massDestroy');
    Route::resource('notes', 'NoteController');

    // Listing Pocket
    Route::delete('listing-pockets/destroy', 'ListingPocketController@massDestroy')->name('listing-pockets.massDestroy');
    Route::resource('listing-pockets', 'ListingPocketController');

    // Board
    Route::delete('boards/destroy', 'BoardController@massDestroy')->name('boards.massDestroy');
    Route::post('boards/media', 'BoardController@storeMedia')->name('boards.storeMedia');
    Route::post('boards/ckmedia', 'BoardController@storeCKEditorImages')->name('boards.storeCKEditorImages');
    Route::resource('boards', 'BoardController');

    // State Resident
    Route::delete('state-residents/destroy', 'StateResidentController@massDestroy')->name('state-residents.massDestroy');
    Route::resource('state-residents', 'StateResidentController');

    // State
    Route::delete('states/destroy', 'StateController@massDestroy')->name('states.massDestroy');
    Route::post('states/parse-csv-import', 'StateController@parseCsvImport')->name('states.parseCsvImport');
    Route::post('states/process-csv-import', 'StateController@processCsvImport')->name('states.processCsvImport');
    Route::resource('states', 'StateController');

    // Status Type
    Route::delete('status-types/destroy', 'StatusTypeController@massDestroy')->name('status-types.massDestroy');
    Route::resource('status-types', 'StatusTypeController');

    // Carrier
    Route::delete('carriers/destroy', 'CarrierController@massDestroy')->name('carriers.massDestroy');
    Route::resource('carriers', 'CarrierController');

    // Chart
    Route::delete('charts/destroy', 'ChartController@massDestroy')->name('charts.massDestroy');
    Route::resource('charts', 'ChartController');

    // Phone
    Route::delete('phones/destroy', 'PhoneController@massDestroy')->name('phones.massDestroy');
    Route::resource('phones', 'PhoneController');

    // Sponsor
    Route::delete('sponsors/destroy', 'SponsorController@massDestroy')->name('sponsors.massDestroy');
    Route::post('sponsors/media', 'SponsorController@storeMedia')->name('sponsors.storeMedia');
    Route::post('sponsors/ckmedia', 'SponsorController@storeCKEditorImages')->name('sponsors.storeCKEditorImages');
    Route::post('sponsors/parse-csv-import', 'SponsorController@parseCsvImport')->name('sponsors.parseCsvImport');
    Route::post('sponsors/process-csv-import', 'SponsorController@processCsvImport')->name('sponsors.processCsvImport');
    Route::resource('sponsors', 'SponsorController');

    // Sms Template
    Route::delete('sms-templates/destroy', 'SmsTemplateController@massDestroy')->name('sms-templates.massDestroy');
    Route::resource('sms-templates', 'SmsTemplateController');

    // Sms Template Default
    Route::delete('sms-template-defaults/destroy', 'SmsTemplateDefaultController@massDestroy')->name('sms-template-defaults.massDestroy');
    Route::resource('sms-template-defaults', 'SmsTemplateDefaultController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
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
