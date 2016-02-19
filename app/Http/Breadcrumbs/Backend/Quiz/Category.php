<?php

Breadcrumbs::register('admin.quiz.categories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.quiz.categories.management'), route('admin.quiz.categories.index'));
});

Breadcrumbs::register('admin.quiz.categories.hierarchy', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.quiz.categories.index');
    $breadcrumbs->push(trans('labels.backend.quiz.categories.hierarchy'), route('admin.quiz.categories.hierarchy'));
});

Breadcrumbs::register('admin.quiz.categories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.quiz.categories.index');
    $breadcrumbs->push(trans('menus.backend.quiz.categories.create'), route('admin.quiz.categories.create'));
});

Breadcrumbs::register('admin.quiz.categories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.quiz.categories.index');
    $breadcrumbs->push(trans('menus.backend.quiz.categories.edit'), route('admin.quiz.categories.edit', $id));
});