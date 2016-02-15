<?php

Breadcrumbs::register('admin.quiz.polls.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.quiz.polls.management'), route('admin.quiz.polls.index'));
});

Breadcrumbs::register('admin.quiz.polls.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.quiz.polls.index');
    $breadcrumbs->push(trans('menus.backend.quiz.polls.create'), route('admin.quiz.polls.create'));
});

Breadcrumbs::register('admin.quiz.polls.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.quiz.polls.index');
    $breadcrumbs->push(trans('menus.backend.quiz.polls.edit'), route('admin.quiz.polls.edit', $id));
});