    <div class="pull-right" style="margin-bottom:10px">
        <div class="btn-group">
          <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{ trans('menus.backend.access.questions.main') }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('admin.access.questions.index') }}">{{ trans('menus.backend.access.questions.all') }}</a></li>

            @permission('create-users')
                <li><a href="{{ route('admin.access.questions.create') }}">{{ trans('menus.backend.access.questions.create') }}</a></li>
            @endauth
          </ul>
        </div><!--btn group-->


    </div><!--pull right-->

    <div class="clearfix"></div>