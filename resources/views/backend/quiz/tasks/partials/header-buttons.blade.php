<div class="pull-right" style="margin-bottom:10px">
    <div class="btn-group">
        <button type="button" class="btn btn-xs btn-primary" data-toggle="collapse" data-target="#demo"><i
                    class="fa fa-filter" data-toggle="tooltip" data-placement="top"
                    title="{{ trans('buttons.backend.quiz.tasks.filters') }}"> {{ trans('buttons.backend.quiz.tasks.filters') }}</i></button>
    </div>
    <!--btn group-->

    <div class="btn-group">
        <a href="{{ route('admin.quiz.tasks.create') }}" class="btn btn-xs btn-primary">{{ trans('menus.backend.quiz.tasks.create') }}</a>
    </div>
    <!--btn group-->


</div><!--pull right-->
<div class="clearfix"></div>

<div id="demo" class="collapse {!! ((isset($user) && $user) || (isset($poll) && $poll) || (isset($status) && $status)) ? 'in' : '' !!}">
    {!! Form::open(['route' => 'admin.quiz.tasks.index', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'filters-form']) !!}
    <div class="row">
        <div class="col-md-4">
            <div class="box-body">
                <div class="form-group">
                        {!! Form::select('user_id', $users, (isset($user)) ? $user : null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.tasks.user_id'), 'onchange' => "$('#filters-form').submit()"]) !!}
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div>
        <div class="col-md-4">
            <div class="box-body">
                <div class="form-group">
                        {!! Form::select('poll_id', $polls, (isset($poll)) ? $poll : null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.tasks.poll_id'), 'onchange' => "$('#filters-form').submit()"]) !!}
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div>
        <div class="col-md-4">
            <div class="box-body">
                <div class="form-group">
                        {!! Form::select('status', $statuses, (isset($status)) ? $status : null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.quiz.tasks.status'), 'onchange' => "$('#filters-form').submit()"]) !!}
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div>
    </div>

    {!! Form::close() !!}
</div>

