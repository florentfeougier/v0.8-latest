@extends('layouts.admin')

@section('template_title')
  Label produit {{$productlabel->name}}
@endsection



@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white " style="background: {{$productlabel->color_code}};">
            <div style="display: flex; justify-content: space-between; align-items: center;">
               Label: {{$productlabel->name}}
              <div class="float-right">

                <a href="{{ url('manager/products/labels') }}" class="btn btn-light btn-sm float-right" data-placement="left" title="{{ trans('productsmanagement.tooltips.back-products') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Retour aux labels
                </a>

                <a href="{{ url("manager/products/labels/$productlabel->id/edit") }}" class=" mx-1 btn btn-light btn-sm float-right"  data-placement="left" title="Modifier">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  Modifier ce label
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">




                <div class="col-lg-12">

<div class="text-center">
  <h2 class="text-muted margin-top-sm-1 text-center text-left-tablet">
    {{$productlabel->name}}


  </h2>


</div>
                </div>


            </div>

            <div class="row">

              <div class="col-sm-4 col-md-6">

                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $productlabel->first_name }} {{ $productlabel->last_name }}
                  </strong>

                </p>

              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($productlabel->description)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->description }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->specs)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Spécifications
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->specs }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->weight)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Poids (g)
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->weight }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->height)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Taille (hauteur en cm)
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->height }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif


                        @if ($productlabel->meta_title)

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre meta
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            {{ $productlabel->meta_title }}
                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

                        @endif
                        @if ($productlabel->meta_desc)

                          <div class="col-sm-5 col-6 text-larger">
                            <strong>
                              Titre description
                            </strong>
                          </div>

                          <div class="col-sm-7">
                            {{ $productlabel->meta_desc }}
                          </div>

                          <div class="clearfix"></div>
                          <div class="border-bottom"></div>

                        @endif

            @if ($productlabel->color_code)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Code couleur
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->color_code }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->weight)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Description
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->weight }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->price)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Prix
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->price }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->tax)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Taux TVA
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->tax }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->old_price)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Ancien prix
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->old_price }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif


                <div class="col-lg-12 text-larger py-2">
                  <strong>
                    Produits associés à ce label ({{count($productlabel->products)}})
                  </strong>
                </div>

                <div class="col-sm-12">
                  @foreach ($productlabel->products as $product)
                    <a href="{{url("manager/products/" . $product->id)}}" class="btn btn-outline-secondary mb-2">{{$product->name}}</a>
                  @endforeach
                </div>

                <div class="clearfix"></div>
                <div class="border-bottom"></div>


            @if ($productlabel->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $productlabel->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->signup_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productlabel->signup_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->signup_confirmation_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productlabel->signup_confirmation_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->signup_sm_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productlabel->signup_sm_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->admin_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productlabel->admin_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($productlabel->updated_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('productsmanagement.labelIpUpdate') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $productlabel->updated_ip_address }}
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

