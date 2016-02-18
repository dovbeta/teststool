@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>
                {{ trans('labels.frontend.quiz.tasks.results_of', ['poll' => $task->poll->title]) }}
            </h1>
            <div class="row">
                <div class="col-md-6">
                    <blockquote>
                        <p>{{ trans('labels.frontend.quiz.tasks.started_at', ['started_at' => $task->started_at->format('Y M d, H:i')]) }}</p>
                        <p>{{ trans('labels.frontend.quiz.tasks.finished_at', ['finished_at' => $task->finished_at->format('Y M d, H:i')]) }}</p>
                        <p>{{ trans('labels.frontend.quiz.tasks.spent_time', ['spent_time' => $task->spent_time]) }}</p>
                    </blockquote>
                </div>
                <div class="col-md-6">
                    <blockquote>
                        <p>{{ trans('labels.frontend.quiz.tasks.questions', ['questions' => $task->userAnswers->count()]) }}</p>
                        <p>{{ trans('labels.frontend.quiz.tasks.sent_answers', ['answers' => $task->sentUserAnswers->count()]) }}</p>
                        <p><strong>{{ trans('labels.frontend.quiz.tasks.correct_answers', ['answers' => $task->correctUserAnswers()->count(), 'percents' => number_format($task->getCorrectPercentage(), 0)]) }}</strong></p>
                    </blockquote>
                </div>
            </div>
            <span>{{ trans('labels.frontend.quiz.results.summary', [
                'questions_num' => $task->userAnswers->count(),
                'answers_num' => $task->sentUserAnswers->count(),
                'correct_num' => $task->correctUserAnswers()->count(),
                'percent_num' => number_format($task->getCorrectPercentage(), 0)
                ]) }}
            </span>
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
                                'percent_num' => number_format($task->getCorrectPercentage(), 0),
                                ]) }}</td>
                        </tr>
                    </tfooter>
                </table>
            </div>

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection