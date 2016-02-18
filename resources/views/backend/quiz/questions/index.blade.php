@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.questions.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.questions.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.questions.all') }}</h3>
            {!! Form::select('category', $categories->lists('name', 'id'), $category, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.questions.filter_by_category'), 'onchange' => 'window.location.href = $(this).val() ? "/admin/quiz/questions/category/"+$(this).val() : "/admin/quiz/questions"']) !!}

            <div class="box-tools pull-right ">

                @include('backend.quiz.questions.partials.header-buttons')
            </div>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.quiz.questions.table.id') }}</th>
                        <th>{{ trans('labels.backend.quiz.questions.table.title') }}</th>
                        <th>{{ trans('labels.backend.quiz.questions.table.description') }}</th>
                        <th>{{ trans('labels.backend.quiz.questions.table.categories') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->title }}</td>
                            <td><pre>{{ $question->description }}</pre></td>
                            <td>{{ implode(', ', $question->categories->pluck('name')->all()) }}</td>
                            <td>{!! $question->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $questions->total() !!} {{ trans_choice('labels.backend.quiz.questions.table.total',
                $questions->total()) }}
            </div>

            <div class="pull-right">
                {!! $questions->render() !!}
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- /.box-body -->
    </div><!--box-->
@stop
