<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Access Management',

            'permissions' => [
                'all' => 'All Permissions',
                'create' => 'Create Permission',
                'edit' => 'Edit Permission',
                'groups' => [
                    'all' => 'All Groups',
                    'create' => 'Create Group',
                    'edit' => 'Edit Group',
                    'main' => 'Groups',
                ],
                'main' => 'Permissions',
                'management' => 'Permission Management',
            ],

            'roles' => [
                'all' => 'All Roles',
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',
                'main' => 'Roles',
            ],

            'users' => [
                'all' => 'All Users',
                'change-password' => 'Change Password',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'main' => 'Users',
                'tasks' => 'User tasks',
            ],
        ],

        'quiz' => [
            'main' => 'Quiz',

            'categories' => [
                'title' => 'Categories',
                'all' => 'All Categories',
                'hierarchy' => 'Categories hierarchy',
                'create' => 'Create Category',
                'edit' => 'Edit Category',
                'main' => 'Categories',
            ],

            'questions' => [
                'title' => 'Questions',
                'all' => 'All questions',
                'create' => 'Create question',
                'edit' => 'Edit question',
                'main' => 'Questions',
            ],

            'polls' => [
                'title' => 'Polls',
                'all' => 'All polls',
                'create' => 'Create poll',
                'edit' => 'Edit poll',
                'main' => 'Polls',
            ],

            'tasks' => [
                'title' => 'Tasks',
                'all' => 'All tasks',
                'create' => 'Add task',
                'edit' => 'Edit task',
                'main' => 'Tasks',
                'active' => 'Active tasks',
                'completed' => 'Completed tasks',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'General',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'de' => 'German',
            'en' => 'English',
            'es' => 'Spanish',
            'fr' => 'French',
            'it' => 'Italian',
            'pt-BR' => 'Brazilian Portuguese',
            'sv' => 'Swedish',
            'uk' => 'Ukrainian',
        ],
    ],
];
