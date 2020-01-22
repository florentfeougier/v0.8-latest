
@extends('layouts.app')

@section('template_title')
  {!! trans('pagesmanagement.showing-page', ['name' => $page->name]) !!}
@endsection



@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white @if ($page->activated == 1) bg-success @else bg-danger @endif">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('pagesmanagement.showing-page-title', ['name' => $page->name]) !!}
              <div class="float-right">
                <a href="{{ route('manager.pages') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('pagesmanagement.tooltips.back-pages') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('pagesmanagement.buttons.back-to-pages') !!}
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 offset-sm-2 col-md-2 offset-md-3">
                {{-- <img src="@if ($page->profile && $page->profile->avatar_status == 1) {{ $page->profile->avatar }} @else {{ Gravatar::get($page->email) }} @endif" alt="{{ $page->name }}" class="rounded-circle center-block mb-3 mt-4 page-image"> --}}
              </div>
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $page->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $page->first_name }} {{ $page->last_name }}
                  </strong>
                  @if($page->email)
                    <br />
                    <span class="text-center" data-toggle="tooltip" data-placement="top" title="{{ trans('pagesmanagement.tooltips.email-page', ['page' => $page->email]) }}">
                      {{ Html::mailto($page->email, $page->email) }}
                    </span>
                  @endif
                </p>
                @if ($page->profile)
                  <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$page->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('pagesmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('pagesmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/pages/{{$page->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('pagesmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('pagesmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'pages/' . $page->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('pagesmanagement.deleteUser'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('pagesmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this page?')) !!}
                    {!! Form::close() !!}
                  </div>
                @endif
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($page->name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelUserName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $page->name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($page->email)

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('pagesmanagement.labelEmail') }}
              </strong>
            </div>

            <div class="col-sm-7">
              <span data-toggle="tooltip" data-placement="top" title="{{ trans('pagesmanagement.tooltips.email-page', ['page' => $page->email]) }}">
                {{ HTML::mailto($page->email, $page->email) }}
              </span>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @endif

            @if ($page->first_name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelFirstName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $page->first_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($page->last_name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelLastName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $page->last_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('pagesmanagement.labelRole') }}
              </strong>
            </div>

            <div class="col-sm-7">

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('pagesmanagement.labelStatus') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($page->activated == 1)
                <span class="badge badge-success">
                  Activated
                </span>
              @else
                <span class="badge badge-danger">
                  Not-Activated
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('pagesmanagement.labelAccessLevel')}} :
              </strong>
            </div>

            <div class="col-sm-7">



            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('pagesmanagement.labelPermissions') }}
              </strong>
            </div>

            <div class="col-sm-7">

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($page->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelCreatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $page->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($page->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelUpdatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $page->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($page->signup_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $page->signup_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($page->signup_confirmation_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $page->signup_confirmation_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($page->signup_sm_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $page->signup_sm_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($page->admin_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $page->admin_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($page->updated_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('pagesmanagement.labelIpUpdate') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $page->updated_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

          </div>

        </div>
      </div>
    </div>
  </div>

  @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('pagesmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection

