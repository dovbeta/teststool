@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.results.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.results.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
                {{ trans('labels.backend.quiz.results.test_of_user', ['poll_name' => $task->poll->title, 'user_name' => $task->user->name]) }}
            </h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover results">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.quiz.results.table.question') }}</th>
                        <th>{{ trans('labels.backend.quiz.results.table.description') }}</th>
                        <th>{{ trans('labels.backend.quiz.results.table.answer') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($task->userAnswers as $answer)
                            <tr>
                                <td>{{ $answer->question->title }}</td>
                                <td><pre>{{ $answer->question->description }}</pre></td>
                                @if($answer->answer)
                                <td class="{!! ($answer->answer->is_correct) ? 'correct' : 'invalid' !!}">{{ $answer->answer->title }}</td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfooter>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>{{ trans('labels.backend.quiz.results.table.footer_correct', [
                                'correct_num' => $task->correctUserAnswers()->count(),
                                'percent_num' => number_format($task->getCorrectPercentage(), 2),
                                ]) }}</td>
                        </tr>
                    </tfooter>
                </table>
                <span>{{ trans('labels.backend.quiz.results.summary', [
                    'user' => $task->user->name,
                    'questions_num' => $task->userAnswers->count(),
                    'answers_num' => $task->sentUserAnswers->count(),
                    'correct_num' => $task->correctUserAnswers()->count(),
                    'percent_num' => number_format($task->getCorrectPercentage(), 2)
                    ]) }}</span>
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
