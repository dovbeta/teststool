@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.questions.management') . ' | ' . trans('labels.backend.quiz.questions.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.questions.management') }}
        <small>{{ trans('labels.backend.quiz.questions.create') }}</small>
    </h1>
@endsection

@section('after-styles-end')
    {!! Html::style('css/backend/plugin/jstree/themes/default/style.min.css') !!}
@stop

@section('content')
    {!! Form::open(['route' => 'admin.quiz.questions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.questions.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.quiz.questions.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('title', trans('validation.attributes.backend.quiz.questions.title'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.questions.title')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('description', trans('validation.attributes.backend.quiz.questions.description'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::textArea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.questions.description')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label(null, trans('validation.attributes.backend.quiz.questions.possible_answers'), ['class' => 'col-lg-2 control-label']) !!}

                <div class="table-responsive col-lg-10">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 5%">{{ trans('validation.attributes.backend.quiz.questions.number') }}</th>
                            <th>{{ trans('validation.attributes.backend.quiz.questions.answer') }}</th>
                            <th>{{ trans('validation.attributes.backend.quiz.questions.is_correct') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i <= 3; $i++)
                                <tr>
                                    <td>{!! $i + 1 !!}</td>
                                    <td>{!! Form::text("question_answers[$i][title]", null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.questions.answer')]) !!}</td>
                                    <td>{!! Form::radio("is_correct", $i) !!}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div><!--form control-->

            <div class="form-group">
                <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.quiz.questions.categories') }}</label>
                <div class="col-lg-10">
                    @if (count($categories))
                        <div id="categories-tree">
                            <ul>
                                @foreach ($categories as $category)
                                    @include('backend.quiz.questions.partials.category-children', ['category' => $category])
                                @endforeach
                            </ul>
                        </div>
                        <div id="question-categories">
                            @foreach ($question_categories as $question_category)
                                <input type="hidden" value="{{$question_category}}" name="question_categories[]">
                            @endforeach
                        </div>
                    @else
                        {{ trans('labels.backend.quiz.questions.no_other_categories') }}
                    @endif
                </div><!--col 3-->
            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.quiz.questions.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                <input type="submit" class="btn btn-primary btn-xs" name="new" value="{{ trans('buttons.general.crud.create-and-new') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/plugin/jstree/jstree.min.js') !!}
    {!! Html::script('js/backend/quiz/questions/script.js') !!}

    <script>
        var $tree = $tree || $('#categories-tree');
        var $question_categories = $question_categories || $('#question-categories');

        $(function() {
            @foreach ($question_categories as $question_category)
                $tree.jstree('check_node', '#cat-{!! $question_category !!}');
            @endforeach
        });
    </script>
@stop
