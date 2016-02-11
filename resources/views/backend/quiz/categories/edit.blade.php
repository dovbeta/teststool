@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.categories.management') . ' | ' . trans('labels.backend.quiz.categories.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.categories.management') }}
        <small>{{ trans('labels.backend.quiz.categories.edit') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::model($category, ['route' => ['admin.quiz.categories.update', $category->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) !!}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.quiz.categories.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.quiz.categories.partials.header-buttons')
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', trans('validation.attributes.backend.quiz.categories.name'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.categories.name')]) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('code', trans('validation.attributes.backend.quiz.categories.code'), ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">
                        {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.categories.code')]) !!}
                    </div>
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{route('admin.quiz.categories.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.update') }}" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {!! Form::close() !!}
@stop
