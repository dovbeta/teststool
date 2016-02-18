@extends('frontend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>
                {{ trans('labels.frontend.quiz.tasks.results_of', ['poll' => $task->poll->title]) }}
            </h1>
            <blockquote>
                <p>{{ trans('labels.frontend.quiz.tasks.started_at', ['started_at' => $task->started_at->format('Y-m-d H:i')]) }}</p>
                <p>{{ trans('labels.frontend.quiz.tasks.finished_at', ['finished_at' => $task->finished_at->format('Y-m-d H:i')]) }}</p>
                <p>{{ trans('labels.frontend.quiz.tasks.spent_time', ['spent_time' => $task->spent_time]) }}</p>
            </blockquote>
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

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection