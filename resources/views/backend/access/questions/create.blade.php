@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.questions.management') . ' | ' . trans('labels.backend.access.questions.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.questions.management') }}
        <small>{{ trans('labels.backend.access.questions.create') }}</small>
    </h1>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.access.questions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.questions.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.questions.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {!! Form::label('title', trans('validation.attributes.backend.access.questions.title'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.questions.title')]) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('description', trans('validation.attributes.backend.access.questions.description'), ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::textArea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.questions.description')]) !!}
                </div>
            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="form-group">
        <label class="col-lg-2 control-label">{{ trans('validation.attributes.backend.access.questions.categories') }}</label>
        <div class="col-lg-10">
            @if (count($categories))
                @foreach (array_chunk($categories->toArray(), 10) as $category)
                    <div class="col-lg-3">
                        <ul style="margin:0;padding:0;list-style:none;">
                            @foreach ($category as $cat)
                                <li><input type="checkbox" value="{{$cat['id']}}" name="question_categories[]" id="category-{{$cat['id']}}">
                                    <label for="permission-{{$cat['id']}}" />
                                        {!! $cat['name'] !!} ({!! $cat['code'] !!})
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @else
                {{ trans('labels.backend.access.users.no_other_permissions') }}
            @endif
        </div><!--col 3-->
    </div><!--form control-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-left">
                <a href="{{route('admin.access.questions.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
            </div>

            <div class="pull-right">
                <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->




    {!! Form::close() !!}
@stop
