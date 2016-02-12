@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('navs.frontend.dashboard') }}</div>

                <div class="panel-body">
                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.my_information') }}</a>
                            </li>
                            <li role="presentation">
                                <a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.my_tasks') }}</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="profile">
                                <table class="table table-striped table-hover dashboard-table">
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
                                        <td><img src="{!! $user->picture !!}" class="user-profile-image" /></td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.name') }}</th>
                                        <td>{!! $user->name !!}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.email') }}</th>
                                        <td>{!! $user->email !!}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
                                        <td>{!! $user->created_at !!} ({!! $user->created_at->diffForHumans() !!})</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
                                        <td>{!! $user->updated_at !!} ({!! $user->updated_at->diffForHumans() !!})</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                        <td>
                                            <a href="{!! route('frontend.user.profile.edit') !!}" class="btn btn-primary btn-xs">{{ trans('labels.frontend.user.profile.edit_information') }}</a>

                                            @if ($user->canChangePassword())
                                                <a href="{!! route('auth.password.change') !!}" class="btn btn-warning btn-xs">{{ trans('navs.frontend.user.change_password') }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div><!--tab panel profile-->

                            <div role="tabpanel" class="tab-pane" id="tasks">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%">{{ trans('labels.frontend.quiz.tasks.table.id') }}</th>
                                        <th>{{ trans('labels.frontend.quiz.tasks.table.title') }}</th>
                                        <th>{{ trans('labels.frontend.quiz.tasks.table.status') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{!! $task->id !!}</td>
                                            <td>{!! $task->poll()->first()->title !!}</td>
                                            <td>{!! $task->status !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <div class="pull-left">
                                    {!! $tasks->total() !!} {{ trans_choice('labels.frontend.quiz.tasks.table.total', $tasks->total()) }}
                                </div>

                                <div class="pull-right">
                                    {!! $tasks->render() !!}
                                </div>
                            </div><!--tab panel profile-->

                        </div><!--tab content-->

                    </div><!--tab panel-->

                </div><!--panel body-->

            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!-- row -->
@endsection