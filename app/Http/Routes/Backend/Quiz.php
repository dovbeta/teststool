<?phpRoute::group([    'prefix'     => 'quiz',    'namespace'  => 'Quiz',], function() {    /**     * Category Management     */    Route::group(['namespace' => 'Category'], function() {        Route::resource('categories', 'CategoryController');    });    /**     * Question Management     */    Route::group(['namespace' => 'Question'], function() {        Route::get('questions/create/{category_id}', 'QuestionController@create')->name('quiz.questions.create.category');        Route::get('questions/category', 'QuestionController@index')->name('quiz.questions.category');        Route::get('questions/category/{category_id}', 'QuestionController@index')->name('quiz.questions.of-category');        Route::resource('questions', 'QuestionController');    });    /**     * Poll Management     */    Route::group(['namespace' => 'Poll'], function() {        Route::resource('polls', 'PollController');    });    /**     * Tasks Management     */    Route::group(['namespace' => 'Task'], function() {        Route::get('tasks/completed', 'TaskController@completed')->name('admin.quiz.tasks.completed');        Route::get('tasks/active', 'TaskController@active')->name('admin.quiz.tasks.active');        Route::resource('tasks', 'TaskController');    });    /**     * Results Management     */    Route::group(['namespace' => 'Result'], function() {        Route::group(['prefix' => 'result/{task_id}', 'where' => ['task_id' => '[0-9]+']], function() {            Route::get('show', 'ResultController@show')->name('admin.quiz.results.show');        });    });});