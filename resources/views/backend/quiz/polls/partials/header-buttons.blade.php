    <div class="pull-right" style="margin-bottom:10px">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.backend.quiz.polls.main') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('admin.quiz.polls.index') }}">{{ trans('menus.backend.quiz.polls.all') }}</a></li>

            @permission('create-users')
                <li><a href="{{ route('admin.quiz.polls.create') }}">{{ trans('menus.backend.quiz.polls.create') }}</a></li>
            @endauth
          </ul>
        </div><!--btn group-->


    </div><!--pull right-->

    <div class="clearfix"></div>