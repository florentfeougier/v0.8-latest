@extends('layouts.manager')

@section('template_title')
  Paiement N°{{$payment->ref_id}}
@endsection

@section('breadcrumb')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paiement N°{{ $payment->ref_id }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url("manager/dashboard") }}">Accueil</a></li>
              <li class="breadcrumb-item"><a href="{{ url("manager/payments") }}">Paiements</a></li>
              <li class="breadcrumb-item active">{{ $payment->ref_id }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
@endsection

@section('content')

 <section class="content">
    
  @if($payment->response_code != "00000" )
  <div class="alert alert-warning" role="alert">
    Le client a été redirigé vers la page de paiement mais n'a pas encore validé la transaction. <a href="{{url("manager/orders/" . $payment->id . "/unpaidNotificationCheck")}}" class="text-dark"> <b>Relancer par email <i class="fa fa-envelope"></i> </b> </a>
  </div>
@else
  <div class="alert alert-success" role="alert">
    Ce paiement a été accepté! Numéro de transaction: {{$payment->transaction_number}}
  </div>
@endif

    <div class="row">

      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            Détails de la transaction
          </div>
          <div class="card-body">
            <div class="col-sm-5 col-6 text-larger">
                          <strong>
                            Utilisateur
                          </strong>
                        </div>

                        <div class="col-sm-7">
                          <a href="{{ url("manager/users/") }}{{ $payment->order->user->id ?? "deletd" }}">{{$payment->user->email ?? "Ce paiement n'est associé à aucun utilisateur."}}</a>
                        </div>


                        <div class="clearfix"></div>
                        <div class="bpayment-bottom"></div>

 <div class="col-sm-5 col-6 text-larger">
                          <strong>
                            Montant (TTC)
                          </strong>
                        </div>

                        <div class="col-sm-7">
                          {{$payment->amount ?? "Inconnu"}}€
                        </div>


                        <div class="clearfix"></div>
                        <div class="bpayment-bottom"></div>

           



                        <div class="col-sm-5 col-6 text-larger">
                          <strong>
                            Numéro de transaction
                          </strong>
                        </div>

                        <div class="col-sm-7">
                          {{$payment->transaction_number ?? "Aucun"}}
                        </div>


                        <div class="clearfix"></div>
                        <div class="bpayment-bottom"></div>

                                    <div class="col-sm-5 col-6 text-larger">
                                      <strong>
                                        Call number
                                      </strong>
                                    </div>

                                    <div class="col-sm-7">
                                      {{$payment->call_number ?? "Aucun"}}
                                    </div>


                                    <div class="clearfix"></div>
                                    <div class="bpayment-bottom"></div>

                                    <div class="col-sm-5 col-6 text-larger">
                                      <strong>
                                       Méthode de paiment
                                      </strong>
                                    </div>

                                    <div class="col-sm-7">
                                      {{$payment->payment_method ?? "Aucune"}}
                                    </div>


                                    <div class="clearfix"></div>
                                    <div class="bpayment-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('paymentsmanagement.labelStatus') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($payment->status == true && $payment->response_code == '00000')
                <span class="badge badge-success">
                  Validé
                </span>
              @elseif($payment->response_code != '00000' && $payment->transaction_number != null)
                <span class="badge badge-danger">
                  Refusé
                </span>
              @else
                <span class="badge badge-warning">
                  En attente
                </span>
              @endif
            </div>


            <div class="clearfix"></div>
            <div class="bpayment-bottom"></div>

            @if ($payment->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Crée le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $payment->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="bpayment-bottom"></div>

            @endif

            @if ($payment->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  Modifié le
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $payment->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="bpayment-bottom"></div>

            @endif
          </div>
        </div>
      </div>

   <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            Commande associée
          </div>
          <div class="card-body">
            

             








          </div>
        </div>
      </div>

     

       
      </div>
    </div>
  </div>

  @include('modals.modal-delete')
 </section>
@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('paymentsmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection

