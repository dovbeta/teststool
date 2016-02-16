@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>{{ trans('labels.frontend.quiz.tasks.title') }}</h1>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th style="width: 5%">{{ trans('labels.frontend.quiz.tasks.table.id') }}</th>
                    <th>{{ trans('labels.frontend.quiz.tasks.table.title') }}</th>
                    <th>{{ trans('labels.frontend.quiz.tasks.table.published') }}</th>
                    <th>{{ trans('labels.frontend.quiz.tasks.table.status') }}</th>
                    <th>{{ trans('labels.frontend.quiz.tasks.table.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{!! $task->id !!}</td>
                        <td>{!! $task->poll->title !!}</td>
                        <td>{!! $task->updated_at->format('Y-m-d H:i') !!} ({!! $task->updated_at->diffForHumans() !!})</td>
                        <td>{!! trans('labels.frontend.quiz.tasks.status.' . $task->status) !!}</td>
                        <td>{!! $task->action_buttons !!}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection