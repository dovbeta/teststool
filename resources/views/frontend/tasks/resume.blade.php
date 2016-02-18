@extends('frontend.layouts.master')

@section('content')
    <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-4">
                    <p class="pull-left">{!! trans('labels.frontend.quiz.tasks.progress-text', ['current' => $task->current, 'total' => $task->total]) !!}</p>
                </div>
                <div class="col-md-4">
                    <p id="countdown" class="text-center"></p>
                </div>
                <div class="col-md-4">
                    <p class="pull-right">{!! trans('labels.frontend.quiz.tasks.progress', ['progress' => $task->progress]) !!}</p>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {!! $task->progress !!}%;"></div>&nbsp;<div class="fa fa-wheelchair"></div>
            </div>

            {!! Form::model($user_answer, ['route' => ['frontend.tasks.update', $task->id, $user_answer->question_id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ $user_answer->question->title }}
                    </h3>
                </div>
                <div class="panel-body">
                    @if ($user_answer->question->description)
                    <p class="lead"><pre>{{ $user_answer->question->description }}</pre></p>
                    @endif
                    @foreach ($user_answer->question->answers as $answer)
                        <div class="radio">
                            <label>
                                {!! Form::radio("answer_id", $answer->id, $user_answer->answer ? $user_answer->answer->id == $answer->id : null) !!} {{ $answer->title }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="panel-footer">
                    {!! Form::submit(trans('buttons.frontend.quiz.tasks.confirm'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
    </div>
@endsection

@section('after-scripts-end')
    <script>
        $(function(){
            var countdownDate = moment().add({!! $task->remain_seconds !!}, 'seconds');
            $('#countdown').countdown(countdownDate.toDate(), function(event) {
                $(this).html(event.strftime('%H:%M:%S'));
            }).on('finish.countdown', function() {
                location.reload();
            });
        });
    </script>
@endsection