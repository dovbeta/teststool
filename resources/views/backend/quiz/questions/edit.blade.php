@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.questions.management') . ' | ' . trans('labels.backend.quiz.questions.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.questions.management') }}
        <small>{{ trans('labels.backend.quiz.questions.edit') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($question, ['route' => ['admin.quiz.questions.update', $question->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.questions.edit') }}</h3>

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
                                <td>
                                    {!! Form::hidden("question_answers[$i][id]", $question_answers[$i]->id) !!}
                                    {!! Form::text("question_answers[$i][title]", $question_answers[$i]->title, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.questions.answer')]) !!}
                                </td>
                                <td>{!! Form::radio("is_correct", $i, !!$question_answers[$i]->is_correct) !!}</td>
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
                        @foreach (array_chunk($categories->toArray(), 10) as $category)
                            <div class="col-lg-3">
                                <ul style="margin:0;padding:0;list-style:none;">
                                    @foreach ($category as $cat)
                                        <li><input type="checkbox" value="{{$cat['id']}}" name="question_categories[]" {{in_array($cat['id'], $question_categories) ? 'checked' : ""}} id="category-{{$cat['id']}}">
                                            <label for="category-{{$cat['id']}}">
                                                {!! $cat['name'] !!} ({!! $cat['code'] !!})
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
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
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.edit') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->




    {!! Form::close() !!}
@stop
