@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.quiz.categories.management'))

@section('after-styles-end')
    {!! Html::style('css/backend/plugin/nestable/jquery.nestable.css') !!}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.quiz.categories.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.categories.hierarchy') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.quiz.categories.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="col-lg-6">
                <div class="dd category-hierarchy">
                    <ol class="dd-list">
                        @foreach ($categories as $category)
                            @include('backend.quiz.categories.partials.category-children', ['category' => $category])
                        @endforeach
                    </ol>
                </div><!--master-list-->
            </div>

            <div class="col-lg-6">
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> {{ trans('strings.backend.quiz.categories.edit_explanation') }}
                </div><!--alert info-->
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/plugin/nestable/jquery.nestable.js') !!}

    <script>
        $(function() {
            var hierarchy = $('.category-hierarchy');
            hierarchy.nestable();

            hierarchy.on('change', function() {
                $.ajax({
                    url : "{!! route('admin.quiz.categories.update-hierarchy') !!}",
                    type: "post",
                    data : {data:hierarchy.nestable('serialize')},
                    success: function(data) {
                        if (data.status == "OK")
                            toastr.success("{!! trans('strings.backend.access.permissions.groups.hierarchy_saved') !!}");
                        else
                            toastr.error("{!! trans('auth.unknown') !!}.");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.error("{!! trans('auth.unknown') !!}: " + errorThrown);
                    }
                });
            });
        });
    </script>
@stop
