<?php

/**
 * Bands Requests
 */

// Index bands requests
Route::get('/bands-request', 'Bands\BandRequestController@index')->name('bands-request.index');
// Show specific band request
Route::get('/bands-request/{bandRequest}', 'Bands\BandRequestController@show')->name('bands-request.show');
// Approve attaching a new band
Route::post('/bands-request/{bandRequest}/approve', 'Bands\BandRequestController@approve')->name('bands-request.approve');
