@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.categories.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.categories.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.categories.all') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.quiz.categories.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.quiz.categories.table.id') }}</th>
                        <th>{{ trans('labels.backend.quiz.categories.table.name') }}</th>
                        <th>{{ trans('labels.backend.quiz.categories.table.code') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{!! $category->id !!}</td>
                                <td>{!! $category->name !!}</td>
                                <td>{!! $category->code !!}</td>
                                <td>{!! $category->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $categories->total() !!} {{ trans_choice('labels.backend.quiz.categories.table.total', $categories->total()) }}
            </div>

            <div class="pull-right">
                {!! $categories->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
