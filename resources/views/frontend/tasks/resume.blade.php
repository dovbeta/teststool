@extends('frontend.layouts.master')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        @foreach ($user_answers as $user_answer)
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {!! $user_answer->question->title !!}
                    </h3>
                </div>
                <div class="panel-body">
                    <p class="lead">{!! $user_answer->question->description !!}</p>
                    @foreach ($user_answer->question->answers as $answer)
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">{!! $answer->title !!}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="panel-footer">
                    <a href="#" class="btn btn-primary " role="button">Confirm</a>
                    <a href="#" class="btn btn-default disabled" role="button">Next</a>
                </div>
            </div>
        @endforeach
        <div class="col-md-1 column">
        </div>
    </div>
@endsection