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
     *
     */
    'answers_table' => 'answers',

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
];