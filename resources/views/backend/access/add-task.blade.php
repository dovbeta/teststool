@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.tasks.management') . ' | ' . trans('labels.backend.quiz.tasks.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.tasks.management') }}
        <small>{{ trans('labels.backend.quiz.tasks.create') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.quiz.tasks.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.tasks.create_for', ['user' => $user->name]) }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        {!! Form::hidden('user_id', $user->id) !!}

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('poll_id', trans('validation.attributes.backend.quiz.tasks.poll_id'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::select('poll_id', $polls, null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.tasks.poll_hint')]) !!}
                </div>
            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.access.user.tasks', [$user->id])}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->




    {!! Form::close() !!}
@stop
