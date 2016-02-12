@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.tasks.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.tasks.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.tasks.all') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
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
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user->tasks as $task)
                        <tr>
                            <td>{!! $task->id !!}</td>
                            <td>{!! $task->user->name !!}</td>
                            <td>{!! $task->poll->title !!}</td>
                            <td>{!! $task->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! count($user->tasks) !!} {{ trans_choice('labels.backend.quiz.tasks.table.total', count($user->tasks)) }}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
