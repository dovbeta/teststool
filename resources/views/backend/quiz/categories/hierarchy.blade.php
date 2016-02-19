@extends ('backend.layouts.master')

@section('after-styles-end')
{!! Html::style('css/backend/plugin/nestable/jquery.nestable.css') !!}
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.quiz.categories.hierarchy') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.quiz.categories.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="dd category-hierarchy">
                <ol class="dd-list">
                    @foreach ($categories as $category)
                        @include('backend.quiz.categories.partials.category-children', ['category' => $category])
                    @endforeach
                </ol>
            </div><!--master-list-->

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