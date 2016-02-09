@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.questions.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.questions.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.questions.all') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.questions.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.access.questions.table.id') }}</th>
                        <th>{{ trans('labels.backend.access.questions.table.title') }}</th>
                        <th>{{ trans('labels.backend.access.questions.table.description') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{!! $question->id !!}</td>
                                <td>{!! $question->title !!}</td>
                                <td>{!! $question->description !!}</td>
                                <td>{!! $question->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $questions->total() !!} {{ trans_choice('labels.backend.access.questions.table.total', $questions->total()) }}
            </div>

            <div class="pull-right">
                {!! $questions->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
