<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'custom' => 'Custom',
        'actions' => 'Actions',
        'buttons' => [
            'save' => 'Save',
            'update' => 'Update',
        ],
        'hide' => 'Hide',
        'none' => 'None',
        'show' => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'permissions' => [
                'create' => 'Create Permission',
                'dependencies' => 'Dependencies',
                'edit' => 'Edit Permission',

                'groups' => [
                    'create' => 'Create Group',
                    'edit' => 'Edit Group',

                    'table' => [
                        'name' => 'Name',
                    ],
                ],

                'grouped_permissions' => 'Grouped Permissions',
                'label' => 'permissions',
                'management' => 'Permission Management',
                'no_groups' => 'There are no permission groups.',
                'no_permissions' => 'No permission to choose from.',
                'no_roles' => 'No Roles to set',
                'no_ungrouped' => 'There are no ungrouped permissions.',

                'table' => [
                    'dependencies' => 'Dependencies',
                    'group' => 'Group',
                    'group-sort' => 'Group Sort',
                    'name' => 'Name',
                    'permission' => 'Permission',
                    'roles' => 'Roles',
                    'system' => 'System',
                    'total' => 'permission total|permissions total',
                    'users' => 'Users',
                ],

                'tabs' => [
                    'general' => 'General',
                    'groups' => 'All Groups',
                    'dependencies' => 'Dependencies',
                    'permissions' => 'All Permissions',
                ],

                'ungrouped_permissions' => 'Ungrouped Permissions',
            ],

            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
            ],

            'users' => [
                'active' => 'Active Users',
                'all_permissions' => 'All Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'dependencies' => 'Dependencies',
                'edit' => 'Edit User',
                'management' => 'User Management',
                'no_other_permissions' => 'No Other Permissions',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',
                'permission_check' => 'Checking a permission will also check its dependencies, if any.',
                'tasks' => 'Tasks list',
                'active_tasks_for' => 'Active tasks list for :user',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Created',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'roles' => 'Roles',
                    'total' => 'user total|users total',
                ],
            ],
        ],

        'quiz' => [
            'categories' => [
                'management' => 'Categories management',
                'all' => 'All categories',
                'create' => 'Create category',
                'edit' => 'Edit category',

                'table' => [
                    'id' => 'ID',
                    'name' => 'Name',
                    'code' => 'Code',
                    'total' => 'category total|categories total',
                ],
            ],

            'questions' => [
                'management' => 'Questions management',
                'all' => 'All questions',
                'create' => 'Create question',
                'edit' => 'Edit question',
                'no_other_categories' => 'No Other Categories',

                'table' => [
                    'id' => 'ID',
                    'title' => 'Title',
                    'description' => 'Description',
                    'categories' => 'Categories',
                    'total' => 'question total|questions total',
                ],
            ],

            'polls' => [
                'management' => 'Polls management',
                'all' => 'All polls',
                'create' => 'Create poll',
                'edit' => 'Edit poll',
                'no_other_categories' => 'No Other Categories',

                'table' => [
                    'id' => 'ID',
                    'title' => 'Title',
                    'category' => 'Category',
                    'questions_number' => 'Questions number',
                    'time_limit' => 'Time limit (m)',
                    'time_limit_hint' => 'Minutes',
                    'total' => 'poll total|polls total',
                ],
            ],

            'tasks' => [
                'management' => 'Tasks management',
                'all' => 'All tasks',
                'all_for' => 'All tasks for :user',
                'all_active' => 'All active tasks',
                'all_completed' => 'All completed tasks',
                'create' => 'Add task',
                'create_for' => 'Add task for :user',
                'edit' => 'Edit task',
                'edit_for' => 'Edit task #:task_id for :user',
                'no_other_categories' => 'No other tasks',
                'active_tasks' => 'Active tasks',
                'completed_tasks' => 'Completed tasks',
                'active_tasks_for' => 'Active tasks for :user',
                'completed_tasks_for' => 'Completed tasks for :user',
                'status' => [
                    'PENDING' => 'Pending',
                    'IN-PROGRESS' =>  'In progress',
                    'COMPLETED' => 'Completed',
                ],

                'table' => [
                    'id' => 'ID',
                    'poll_id' => 'Poll',
                    'user_id' => 'User',
                    'status' => 'Status',
                    'test_start' => 'Test start',
                    'spent_time' => 'Spent time (m)',
                    'total' => 'task|tasks total',
                    'assigned_at' => 'Assigned',
                    'correct_answers' => 'Correct answers',
                ],
            ],

            'results' => [
                'management' => 'Results management',
                'test_of_user' => 'Results of ":poll_name" test for :user_name',
                'summary' => 'From :questions_num questions :user sent :answers_num answers, :correct_num of them are correct (:percent_num%)',

                'table' => [
                    'question' => 'Question',
                    'description' => 'Description',
                    'answer' => 'Answer',
                    'footer_correct' => 'Correct: :correct_num (:percent_num%)'
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Country Alpha Codes',
                'alpha2' => 'Country Alpha 2 Codes',
                'alpha3' => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

        'quiz' => [
            'tasks' => [
                'title' => 'Tasks list',
                'table' => [
                    'id' => 'ID',
                    'title' => 'Title',
                    'status' => 'Status',
                    'total' => 'task|tasks total',
                    'actions' => 'Actions',
                ],
                'status' => [
                    'PENDING' => 'Pending',
                    'IN-PROGRESS' =>  'In progress',
                    'COMPLETED' => 'Completed',
                ],
            ],
        ],
    ],
];
