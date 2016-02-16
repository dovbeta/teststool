<?php

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Task'], function() {
        Route::get('tasks', 'TaskController@index')->name('frontend.tasks.index');
    });
    Route::group(['namespace' => 'Task', 'prefix' => 'tasks/{id}', 'where' => ['id' => '[0-9]+']], function() {
        Route::get('begin', 'TaskController@begin')->name('frontend.tasks.begin');
        Route::get('resume', 'TaskController@resume')->name('frontend.tasks.resume');
        Route::get('results', 'TaskController@results')->name('frontend.tasks.results');
    });
});