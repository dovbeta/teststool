@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.tasks.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.tasks.management') }}
        <small>{{ trans('labels.backend.quiz.tasks.completed_tasks') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.tasks.all_completed') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.quiz.tasks.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.quiz.tasks.table.id') }}</th>
                        <th>{{ trans('labels.backend.quiz.tasks.table.user_id') }}</th>
                        <th>{{ trans('labels.backend.quiz.tasks.table.poll_id') }}</th>
                        <th>{{ trans('labels.backend.quiz.tasks.table.assigned_at') }}</th>
                        <th>{{ trans('labels.backend.quiz.tasks.table.status') }}</th>
                        <th>{{ trans('labels.backend.quiz.tasks.table.started_at') }}</th>
                        <th>{{ trans('labels.backend.quiz.tasks.table.finished_at') }}</th>
                        <th>{{ trans('labels.backend.quiz.tasks.table.spent_time') }}</th>
                        <th>{{ trans('labels.backend.quiz.tasks.table.correct_answers') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{!! $task->id !!}</td>
                                <td>{!! $task->user->name !!}</td>
                                <td>{!! $task->poll->title !!}</td>
                                <td>{!! $task->updated_at->format('Y-m-d H:i') !!} <small>({!! $task->updated_at->diffForHumans() !!})</small></td>
                                <td>{{ trans('labels.backend.quiz.tasks.status.' . $task->status) }}</td>
                                <td>{!! $task->started_at !!}</td>
                                <td>{!! $task->finished_at !!}</td>
                                <td>{!! $task->spent_time !!}</td>
                                <td>{!! number_format($task->getCorrectPercentage(), 2)!!}%</td>
                                <td>{!! $task->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $tasks->total() !!} {{ trans_choice('labels.backend.quiz.tasks.table.total', $tasks->total()) }}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
