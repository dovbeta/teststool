    <div class="pull-right" style="margin-bottom:10px">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.backend.quiz.tasks.main') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('admin.quiz.tasks.index') }}">{{ trans('menus.backend.quiz.tasks.all') }}</a></li>
            <li><a href="{{ route('admin.quiz.tasks.active') }}">{{ trans('menus.backend.quiz.tasks.active') }}</a></li>
            <li><a href="{{ route('admin.quiz.tasks.completed') }}">{{ trans('menus.backend.quiz.tasks.completed') }}</a></li>

            @permission('create-tasks')
                <li class="divider"></li>
                <li><a href="{{ route('admin.quiz.tasks.create') }}">{{ trans('menus.backend.quiz.tasks.create') }}</a></li>
            @endauth
          </ul>
        </div><!--btn group-->


    </div><!--pull right-->

    <div class="clearfix"></div>