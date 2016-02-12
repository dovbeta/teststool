<?php

return [
    /*
     * Categories table used to store categories
     */
    'categories_table' => 'categories',

    /*
     * Questions table used to store questions
     */
    'questions_table' => 'questions',

    /*
     * Category question table used to save relationship between categories and questions to the database.
     */
    'category_question_table' => 'category_question',

    /*
     * Answers table used to store answers for the questions
     */
    'answers_table' => 'answers',

    /*
     * Tasks table used to store tasks
     */
    'tasks_table' => 'tasks',

    /*
     * Table to store relations between tasks, questions and answers for them
     */
    'tasks_questions_answers_table' => 'tasks_questions_answers',

    /*
     * Configurations for the category
     */
    'categories' => [
        /*
         * Administration tables
         */
        'default_per_page' => 25,
    ],

    /*
     * Configurations for the question
     */
    'questions' => [
        /*
         * Administration tables
         */
        'default_per_page' => 25,
    ],

    'tasks' => [
        'default_per_page' => 25,
    ]
];