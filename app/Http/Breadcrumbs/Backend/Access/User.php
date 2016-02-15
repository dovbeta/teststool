<?php

Breadcrumbs::register('admin.access.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.access.users.management'), route('admin.access.users.index'));
});

Breadcrumbs::register('admin.access.users.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deactivated'), route('admin.access.users.deactivated'));
});

Breadcrumbs::register('admin.access.users.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deleted'), route('admin.access.users.deleted'));
});

Breadcrumbs::register('admin.access.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.create'), route('admin.access.users.create'));
});

Breadcrumbs::register('admin.access.users.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.edit'), route('admin.access.users.edit', $id));
});

Breadcrumbs::register('admin.access.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.change-password'), route('admin.access.user.change-password', $id));
});

Breadcrumbs::register('admin.access.user.tasks', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.users.index');
    $breadcrumbs->push(trans('menus.backend.access.users.tasks'), route('admin.access.user.tasks', $id));
});

Breadcrumbs::register('admin.access.user.task', function ($breadcrumbs, $id, $task_id) {
    $breadcrumbs->parent('admin.access.user.tasks', $id);
    $breadcrumbs->push(trans('menus.backend.quiz.tasks.edit'), route('admin.access.user.task', [$id, $task_id]));
});

Breadcrumbs::register('admin.access.user.add-task', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.user.tasks', $id);
    $breadcrumbs->push(trans('menus.backend.quiz.tasks.create'), route('admin.access.user.add-task', [$id]));
});
