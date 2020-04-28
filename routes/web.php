<?php

/*
* Auth routes
*/
Route::any('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes(['verify' => true]);
// Home page & Welcome
Route::get('/', 'HomeController')->name('home');
// Lang
Route::get('/lang/{locale}', 'LocalizationController@update')->name('lang');

/*** Guest Routes ***/
Route::group(['middleware' => 'guest'], function () {
    Route::view('/faq', 'faq')->name('faq');
    /**
     * Bands
     */
    Route::group(['prefix' => 'bands'], function () {
        Route::view('/request', 'bands.request')->name('bands.request');
        Route::post('/request', 'Bands\BandRequestController@store')->name('bands.request');
    });

    /**
     * Tickets
     */
    Route::group(['prefix' => 'tickets'], function() {
        Route::get('/request', 'Tickets\TicketRequestController@show')->name('tickets.request');
        Route::post('/request', 'Tickets\TicketRequestController@store')->name('tickets.request');
    });

    /**
     * Squadrons Online interviews
     */
    Route::get('/bands/squadrons/online-interview', 'Interviews\SquadronsInterviewController@index');
    Route::post('/bands/squadrons/online-interview/ticket', 'Interviews\SquadronsInterviewController@ticket');
    Route::get('/bands/squadrons/approved', 'Interviews\SquadronsInterviewController@approved');
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    /**
     * Band
     */
    Route::group(['prefix' => 'bands'], function () {
        // View band settings
        Route::get('/{band}/settings', 'Bands\BandController@edit')->name('bands.edit');
        // Update band settings
        Route::patch('/{band}', 'Bands\BandController@update')->name('bands.update');
        // View band statistics
        Route::get('/{band}', 'Bands\BandController@show')->name('bands.show'); // unfinished
        // View band messaging service
        Route::get('/{band}/messaging', 'Bands\BandMessagingController@show')->name('bands.messaging.show');
        // Link or unlink messaging service
        Route::patch('/{band}/messaging', 'Bands\BandMessagingController@update')->name('bands.messaging.update');
    });

    Route::get('users', function () {})->name('users.index');
    /**
     * Batches // unfinished
     */
    Route::resource('/batches', 'Batches\BatchController');
    Route::get('/api/batches', 'Api\Batches\BatchController@index');
    Route::get('/api/batches/{batch}/groups', 'Api\Batches\BatchGroupsController@index');
    Route::get('/api/batches/{batch}/students', 'Api\Batches\BatchStudentsController@index');

    /**
     * Tickets
     */
    Route::group(['prefix' => 'tickets'], function () {
        // View requested tickets
        Route::get('/', 'Tickets\TicketController@index')->name('tickets.index');
        // Update a ticket status
        Route::patch('/', 'Tickets\TicketController@update')->name('tickets.update');
        // Delete a ticket
        Route::delete('/{ticket}', 'Tickets\TicketController@destroy')->name('tickets.destroy');
        // View student & instructor tickets distributed by band owner
        Route::get('/unrequested', 'Tickets\UnrequestedTicketController@index')->name('tickets.unrequested.index');
        // View unrequested tickets edit page
        Route::get('/unrequested/edit', 'Tickets\UnrequestedTicketController@edit')->name('tickets.unrequested.edit');
        // Update an unrequested ticket
        Route::patch('/unrequested', 'Tickets\UnrequestedTicketController@update')->name('tickets.unrequested.update');
    });

    /**
     * Categories
     */
    Route::resource('/categories', 'Categories\CategoryController');

    /**
     * Lessons
     */

    Route::resource('/lessons', 'Lessons\LessonController');
    Route::get('/api/lessons', 'Api\Lessons\LessonController@index');

    /**
     * Posts
     */
    Route::resource('/posts', 'Posts\PostController');
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/{post}/comments', 'Comments\PostCommentsController@index');
        Route::post('/{post}/comments', 'Comments\PostCommentsController@store');
        Route::patch('/{post}/comments/{comment}', 'Comments\PostCommentsController@update');
        Route::delete('/{post}/comments/{comment}', 'Comments\PostCommentsController@destroy');
        Route::post('/{post}/subscriptions', 'Subscriptions\PostSubscriptionsController@store');
        Route::delete('/{post}/subscriptions', 'Subscriptions\PostSubscriptionsController@destroy');
        Route::post('/{post}/rates', 'Posts\PostRatesController@store');
        Route::patch('/{post}/rates', 'Posts\PostRatesController@update');
        Route::delete('/{post}/rates', 'Posts\PostRatesController@destroy');
    });
    /**
     * Profiles
     */
    Route::get('/profile/{user?}', 'Profiles\ProfileController@show')->name('profiles.show'); // view as others, view latest, ..
    Route::patch('/profile', 'Profiles\ProfileController@update')->name('profiles.update');

    /**
     * Payments
     */
    Route::resource('payments', 'Payments\BatchPaymentController');
});

/**
 * Groups
 */
Route::resource('/groups', 'Groups\GroupController')->except('create');
Route::get('/api/groups', 'Api\Groups\GroupController@index');
Route::patch('/groups/{group}/members', 'Groups\GroupMembersController@update');

Route::get('/api/band/students', 'Api\Users\BandStudentsController@index')->name('band.users');

Route::get('/notifications', 'Notifications\UserNotificationsController@index')->name('notifications.index'); // finished but needs refactory
Route::get('/tasks/{task}/task-based', 'Tasks\TaskBasedController@show')->name('task-based.show');
Route::post('/tasks/{task}/task-based', 'Tasks\TaskBasedController@store')->name('task-based.store');
Route::get('/tasks/{task}/solve', 'Tasks\TaskSolvingController@show')->name('tasks.solve');
Route::post('/tasks/{task}/solve', 'Tasks\TaskSolvingController@store')->name('tasks.solve');
Route::resource('tasks', 'Tasks\TaskController');


/**
 * Docs
 */
Route::group(['prefix' => 'docs'], function () {
    Route::get('/tickets', 'DocsController@index')->name('docs.tickets');
});


// Localization
Route::get('/js/lang.js', 'LocalizationController@index')->name('assets.lang');
