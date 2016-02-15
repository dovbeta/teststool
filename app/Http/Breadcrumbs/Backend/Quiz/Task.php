<?php

Breadcrumbs::register('admin.quiz.tasks.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.quiz.tasks.management'), route('admin.quiz.tasks.index'));
});

Breadcrumbs::register('admin.quiz.tasks.completed', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.quiz.tasks.index');
    $breadcrumbs->push(trans('labels.backend.quiz.tasks.all_completed'), route('admin.quiz.tasks.completed'));
});

Breadcrumbs::register('admin.quiz.tasks.active', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.quiz.tasks.index');
    $breadcrumbs->push(trans('labels.backend.quiz.tasks.all_active'), route('admin.quiz.tasks.active'));
});