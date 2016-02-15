<?php

Breadcrumbs::register('admin.quiz.questions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.quiz.questions.management'), route('admin.quiz.questions.index'));
});

Breadcrumbs::register('admin.quiz.questions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.quiz.questions.index');
    $breadcrumbs->push(trans('menus.backend.quiz.questions.create'), route('admin.quiz.questions.create'));
});

Breadcrumbs::register('admin.quiz.questions.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.quiz.questions.index');
    $breadcrumbs->push(trans('menus.backend.quiz.questions.edit'), route('admin.quiz.questions.edit', $id));
});