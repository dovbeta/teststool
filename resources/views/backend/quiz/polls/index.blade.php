@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.polls.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.polls.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.polls.all') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.quiz.polls.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.quiz.polls.table.id') }}</th>
                        <th>{{ trans('labels.backend.quiz.polls.table.title') }}</th>
                        <th>{{ trans('labels.backend.quiz.polls.table.category') }}</th>
                        <th>{{ trans('labels.backend.quiz.polls.table.questions_number') }}</th>
                        <th>{{ trans('labels.backend.quiz.polls.table.time_limit') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($polls as $poll)
                            <tr>
                                <td>{!! $poll->id !!}</td>
                                <td>{!! $poll->title !!}</td>
                                <td>{!! $poll->category->name !!}</td>
                                <td>{!! $poll->questions_number !!}</td>
                                <td>{!! $poll->time_limit !!}</td>
                                <td>{!! $poll->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $polls->total() !!} {{ trans_choice('labels.backend.quiz.polls.table.total', $polls->total()) }}
            </div>

            <div class="pull-right">
                {!! $polls->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
