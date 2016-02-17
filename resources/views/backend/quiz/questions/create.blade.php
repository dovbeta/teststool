@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.questions.management') . ' | ' . trans('labels.backend.quiz.questions.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.questions.management') }}
        <small>{{ trans('labels.backend.quiz.questions.create') }}</small>
    </h1>
@endsection

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
                        @foreach (array_chunk($categories->toArray(), 10) as $category)
                            <div class="col-lg-3">
                                <ul style="margin:0;padding:0;list-style:none;">
                                    @foreach ($category as $cat)
                                        <li><input type="checkbox" value="{{$cat['id']}}" name="question_categories[]" {{ $cat['id']==$category_id ? 'checked' : ""}} id="category-{{$cat['id']}}">
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
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                <input type="submit" class="btn btn-primary btn-xs" name="new" value="{{ trans('buttons.general.crud.create-and-new') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->




    {!! Form::close() !!}
@stop
