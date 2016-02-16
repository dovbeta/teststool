<?php

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Task', 'prefix' => 'tasks/{id}', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('begin', 'TaskController@begin')->name('frontend.tasks.begin');
        Route::get('resume', 'TaskController@continue')->name('frontend.tasks.resume');
    });
});