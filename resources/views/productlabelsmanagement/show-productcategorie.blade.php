@extends('layouts.admin')

@section('template_title')
  Catégorie {{$product->name}}
@endsection



@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white bg-success">
            <div style="display: flex; justify-content: space-between; align-items: center;">
               Catégorie {{$product->name}}
              <div class="float-right">

                <a href="{{ route('manager.products.categories') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('productsmanagement.buttons.back-to-products') !!}
                </a>

                <a href="{{ url("manager/products/categories/$product->id/edit") }}" class=" mx-1 btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Modifier ce produit
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">



                <div class="col-lg-3 offset-lg-1">
                  <div class="text-center float-center">
                    <img class="rounded" src="{{asset("storage/$product->thumbnail")}}" alt="" height="200px">

                  </div>
                </div>
                <div class="col-lg-8">

<div class="text-center">
  <h2 class="text-muted margin-top-sm-1 text-center text-left-tablet">
    {{$product->name}}
    <span class="badge badge-info">{{$product->price}}€</span>

    @if(!is_null($product->old_price))
      <span class="badge badge-secondary"> <del>{{$product->old_price}}€</del> </span>
    @endif
  </h2>

  @if($product->stock <= 10) <span class="badge badge-warning text-center text-left-tablet">{{$product->stock}} en stock</span> @elseif($product->stock < 5) <span class="badge badge-danger text-center text-left-tablet">{{$product->stock}} en stock</span> @else <span class="badge badge-success text-center text-left-tablet">{{$product->stock}} en stock</span> @endif
  @if($product->sold > 1) <span class="badge badge-success text-center text-left-tablet">{{$product->sold}} vendus</span> @else <span class="badge badge-danger text-center text-left-tablet">{{$product->sold}} vendus</span> @endif
  @if($product->store_enabled == true) <span class="badge badge-success">Article en vente dans le shop</span> @else <span class="badge badge-danger">Article en vente dans le shop</span> @endif
</div>
                </div>


            </div>

            <div class="row">

              <div class="col-sm-4 col-md-6">

                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $product->first_name }} {{ $product->last_name }}
                  </strong>

                </p>

              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($product->description)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->description }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->specs)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Spécifications
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->specs }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->weight)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Poids (g)
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->weight }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->height)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Taille (hauteur en cm)
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->height }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif


                        @if ($product->meta_title)

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre meta
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            {{ $product->meta_title }}
                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

                        @endif
                        @if ($product->meta_desc)

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre description
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            {{ $product->meta_desc }}
                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

                        @endif

            @if ($product->color_code)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Code couleur
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->color_code }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->weight)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->weight }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->price)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Prix
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->price }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->tax)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Taux TVA
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->tax }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->old_price)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Ancien prix
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->old_price }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif



            <div class="col-sm-5 col-6 text-larger">
              <strong>
                Stock
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($product->stock < 10)
                <span class="badge badge-warning">
                  {{$product->stock}} en stock
                </span>
              @elseif($product->stock < 5)
                <span class="badge badge-danger">
                  {{$product->stock}} en stock
                </span>
              @else
                <span class="badge badge-success">
                  {{$product->stock}} en stock
                </span>
              @endif
            </div>





            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($product->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $product->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->signup_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $product->signup_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->signup_confirmation_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $product->signup_confirmation_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->signup_sm_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $product->signup_sm_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->admin_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $product->admin_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($product->updated_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpUpdate') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $product->updated_ip_address }}
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
