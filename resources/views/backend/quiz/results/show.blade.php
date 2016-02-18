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
            <br />
            <small>{{ trans('labels.backend.quiz.results.summary', [
            'user' => $task->user->name,
            'questions_num' => $task->userAnswers->count(),
            'answers_num' => $task->sentUserAnswers->count(),
            'correct_num' => $task->correctUserAnswers()->count(),
            'percent_num' => number_format($task->getCorrectPercentage(), 2)
            ]) }}</small>
        </div><!-- /.box-header -->

        <div class="row">
            <div class="col-md-6 row">
                <blockquote>
                    <p>{{ trans('labels.frontend.quiz.tasks.started_at', ['started_at' => $task->started_at->format('Y M d, H:i')]) }}</p>
                    <p>{{ trans('labels.frontend.quiz.tasks.finished_at', ['finished_at' => $task->finished_at->format('Y M d, H:i')]) }}</p>
                    <p>{{ trans('labels.frontend.quiz.tasks.spent_time', ['spent_time' => $task->spent_time]) }}</p>
                </blockquote>
            </div>
            <div class="col-md-6 row">
                <blockquote>
                    <p>{{ trans('labels.frontend.quiz.tasks.questions', ['questions' => $task->userAnswers->count()]) }}</p>
                    <p>{{ trans('labels.frontend.quiz.tasks.sent_answers', ['answers' => $task->sentUserAnswers->count()]) }}</p>
                    <p><strong>{{ trans('labels.frontend.quiz.tasks.correct_answers', ['answers' => $task->correctUserAnswers()->count(), 'percents' => number_format($task->getCorrectPercentage(), 0)]) }}</strong></p>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="box box-success">
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
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
