@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.polls.management') . ' | ' . trans('labels.backend.quiz.polls.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.polls.management') }}
        <small>{{ trans('labels.backend.quiz.polls.create') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.quiz.polls.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.polls.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.quiz.polls.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('title', trans('validation.attributes.backend.quiz.polls.title'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.polls.title')]) !!}
                </div>
            </div><!--form control-->
        </div><!-- /.box-body -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('category', trans('validation.attributes.backend.quiz.polls.category'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::select('category', $categories->lists('name', 'id'), null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.polls.category_hint')]) !!}
                </div>
            </div><!--form control-->
        </div><!-- /.box-body -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('questions_number', trans('validation.attributes.backend.quiz.polls.questions_number'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('questions_number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.polls.questions_number')]) !!}
                </div>
            </div><!--form control-->
        </div><!-- /.box-body -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('time_limit', trans('validation.attributes.backend.quiz.polls.time_limit'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('time_limit', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.polls.time_limit')]) !!}
                </div>
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
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->




    {!! Form::close() !!}
@stop
