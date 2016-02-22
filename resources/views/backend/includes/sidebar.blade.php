<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! access()->user()->picture !!}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{!! access()->user()->name !!}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.backend.general.search_placeholder') }}"/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            @permission('view-access-management')
                <li class="{{ Active::pattern('admin/access/user*') }}">
                    <a href="{!!url('admin/access/users')!!}"><span>{{ trans('menus.backend.access.title') }}</span></a>
                </li>
            @endauth

            <li class="{{ Active::pattern('admin/quiz*') }} treeview">
                <a href="#">
                    <span>{{ trans('menus.backend.quiz.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/quiz*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/quiz*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/quiz/categories') }}">
                        <a href="{!!url('admin/quiz/categories/hierarchy')!!}"><span>{{ trans('menus.backend.quiz.categories.title') }}</span></a>
                    </li>
                    <li class="{{ Active::pattern('admin/quiz/questions') }}">
                        <a href="{!!url('admin/quiz/questions')!!}"><span>{{ trans('menus.backend.quiz.questions.title') }}</span></a>
                    </li>
                    <li class="{{ Active::pattern('admin/quiz/polls') }}">
                        <a href="{!!url('admin/quiz/polls')!!}"><span>{{ trans('menus.backend.quiz.polls.title') }}</span></a>
                    </li>
                    <li class="{{ Active::pattern('admin/quiz/tasks') }}">
                        <a href="{!!url('admin/quiz/tasks')!!}"><span>{{ trans('menus.backend.quiz.tasks.title') }}</span></a>
                    </li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>