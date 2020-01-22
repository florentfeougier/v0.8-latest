@extends('layouts.admin')

@section('template_title')
  Catégorie {{$productcategorie->name}}
@endsection



@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white bg-success">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              Catégorie {{$productcategorie->name}}
              <div class="float-right">

                <a href="{{ url('manager/products/categories') }}" class="mb-1 btn btn-light btn-sm float-right"  data-placement="left" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Retour aux catégories
                </a>

                <a href="{{ url("manager/products/categories/$productcategorie->id/edit") }}" class=" mx-1 btn btn-light btn-sm float-right"  data-placement="left" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                  <i class="fa fa-edit" aria-hidden="true"></i>
                  Modifier cette catégorie
                </a>
              </div>
            </div>
          </div>

<div class="card-body">

    <div class="row">


      <div class="col-lg-12">

          <div class="text-center">
            <h2 class="text-muted margin-top-sm-1 text-center text-left-tablet">
              Catégorie: {{$productcategorie->name}}


            </h2>


          </div>
        </div>


    </div>


    <div class="col-lg-12 text-larger">
      <strong>
        Produits dans cette catégorie ({{count($productcategorie->products)}})
      </strong>
    </div>

    <div class="col-sm-12">
      @foreach ($productcategorie->products as $product)
        <a href="{{url("manager/products/" . $product->id)}}" class="btn btn-outline-secondary mb-2">{{$product->name}}</a>
      @endforeach
    </div>


            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($productcategorie->description)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productcategorie->description }}
              </div>



            @endif





            @if ($productcategorie->meta_title)

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre meta
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            {{ $productcategorie->meta_title }}
                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

          @endif
          @if ($productcategorie->meta_desc)

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre description
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            {{ $productcategorie->meta_desc }}
                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

          @endif

            @if ($productcategorie->color_code)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Code couleur
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productcategorie->color_code }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif






            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($productcategorie->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productcategorie->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productcategorie->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productcategorie->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productcategorie->signup_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productcategorie->signup_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productcategorie->signup_confirmation_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productcategorie->signup_confirmation_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productcategorie->signup_sm_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productcategorie->signup_sm_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productcategorie->admin_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productcategorie->admin_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productcategorie->updated_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpUpdate') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productcategorie->updated_ip_address }}
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
  @if(config('productsmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection

