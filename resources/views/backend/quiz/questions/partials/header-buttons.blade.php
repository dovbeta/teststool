    <div class="pull-right" style="margin-bottom:10px">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.backend.quiz.questions.main') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('admin.quiz.questions.index') }}">{{ trans('menus.backend.quiz.questions.all') }}</a></li>

            @permission('create-users')
                <li><a href="{{ route('admin.quiz.questions.create') }}">{{ trans('menus.backend.quiz.questions.create') }}</a></li>
            @endauth
          </ul>
        </div><!--btn group-->


    </div><!--pull right-->

    <div class="clearfix"></div>