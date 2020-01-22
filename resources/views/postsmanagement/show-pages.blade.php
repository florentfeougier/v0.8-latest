@extends('layouts.app')

@section('template_title')
  Toutes les pages

@section('template_linked_css')
    @if(config('usersmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('usersmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                              Toutes les pages
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('postsmanagement.posts-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/posts/create">
                                        <i class="fa fa-fw fa-post-plus" aria-hidden="true"></i>
                                        {!! trans('postsmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="/posts/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('postsmanagement.show-deleted-posts') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('postsmanagement.enableSearchUsers'))
                            @include('partials.search-posts-form')
                        @endif

                        <div class="table-responsive posts-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="post_count">
                                    {{ trans_choice('postsmanagement.posts-table.caption', 1, ['postscount' => $posts->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('postsmanagement.posts-table.name') !!}</th>
                                        <th class="hidden-xs">Catégorie</th>

                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('postsmanagement.posts-table.created') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('postsmanagement.posts-table.updated') !!}</th>
                                        <th>{!! trans('postsmanagement.posts-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="posts_table">
                                    @foreach($posts as $post)
                                        <tr>

                                            <td>{{$post->name}}</td>
                                            <td class="hidden-xs"><a href="mailto:{{ $post->email }}" title="email {{ $post->email }}">{{ $post->email }}</a></td>
                                            <td class="hidden-xs">{{$post->postcategorie->name}}</td>

                                            <td class="hidden-sm hidden-xs hidden-md">{{$post->updated_at}}</td>
                                            <td>
                                                {!! Form::open(array('url' => 'posts/' . $post->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('postsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this post ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('posts/' . $post->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('postsmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('manager/products/' . $post->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('postsmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('postsmanagement.enableSearchUsers'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('postsmanagement.enablePagination'))
                                {{ $posts->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.modal-delete')

@endsection

@section('footer_scripts')
    @if ((count($posts) > config('postsmanagement.datatablesJsStartCount')) && config('postsmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('usersmanagement.enableSearchUsers'))
        @include('scripts.search-users')
    @endif
@endsection
