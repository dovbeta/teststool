@extends('frontend.layouts.master')

@section('content')
    <div class="col-md-10 col-md-offset-1">
            {!! Form::model($task, ['route' => ['frontend.tasks.update', $task->id, $user_answer->question_id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ $user_answer->question->title }}
                    </h3>
                </div>
                <div class="panel-body">
                    <p class="lead"><pre>{{ $user_answer->question->description }}</pre></p>
                    @foreach ($user_answer->question->answers as $answer)
                        <div class="radio">
                            <label>
                                {!! Form::radio("answer_id", $answer->id, $user_answer->answer ? $user_answer->answer->id == $answer->id : null) !!} {{ $answer->title }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" value="Confirm" />
                </div>
            </div>
            {!! Form::close() !!}
    </div>
    <div class="col-md-10 col-md-offset-1 container"  id="pagination-container">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <div class="pull-right">

                </div>
            </div>
        </div>
    </div>
@endsection