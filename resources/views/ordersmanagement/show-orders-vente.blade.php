@extends('layouts.admin')

@section('template_title')
  Toutes les commandes
@endsection

@section('template_linked_css')
    @if(config('ordersmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('ordersmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .orders-table {
            border: 0;
        }
        .orders-table tr td:first-child {
            padding-left: 15px;
        }
        .orders-table tr td:last-child {
            padding-right: 15px;
        }
        .orders-table.table-responsive,
        .orders-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
 <div>
                    <h1 class="text-center">Commandes de la vente {{ $vente->name }}</h1>
                    <h5></h5>
                </div>
                <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <i class="fa fa-charts"></i> Evolution des ventes
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <canvas  id="lineChart"></canvas>
      </div>
    </div>
  </div>
  <div class="card my-2">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Evolution du revenues
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card my-2">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed text-dark" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          Toutes les commandes ({{ count(\App\Models\Order::where('cart', $vente->slug)->where('payment_status', true)->get()) }} payées sur {{ count(\App\Models\Order::where('cart', $vente->slug)->get()) }})
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">

     @if(config('ordersmanagement.enableSearchOrders'))
                            @include('partials.search-orders-form')
                        @endif

                        <div class="table-responsive orders-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="order_count">
                                    total: {{count($orders)}} commandes
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Date
                                          <a href="{{url("manager/orders?q=orderbyasc_date")}}"> <i class="text-secondary fa fa-arrow-circle-o-up"></i> </a>
                                          <a href="{{url("manager/orders?q=orderbydesc_date")}}"> <i class="text-secondary fa fa-arrow-circle-o-down"></i> </a>

                                        </th>
                    <th>Vente
<a href="{{url("manager/orders?q=orderbyasc_vente")}}"> <i class="text-secondary fa fa-arrow-circle-o-up"></i> </a>
                                          <a href="{{url("manager/orders?q=orderbydesc_vente")}}"> <i class="text-secondary fa fa-arrow-circle-o-down"></i> </a>
</th>
                                        <th>Utilisateur</th>
                                        <th>Montant
                                          <a href="{{url("manager/orders?q=orderbyasc_amount")}}"> <i class="text-secondary fa fa-arrow-circle-o-up"></i> </a>
                                          <a href="{{url("manager/orders?q=orderbydesc_amount")}}"> <i class="text-secondary fa fa-arrow-circle-o-down"></i> </a>
                                        </th>
                                        <th class="hidden-sm hidden-xs">Paiement</th>
                                        <th class="hidden-sm hidden-xs ">Terminé</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="orders_table">
                                    @foreach($orders->sortByDesc('created_at') as $order)
                                        <tr>
                                            <td>
                                              @if($order->payment_status == true and !is_null($order->payment_id))
                                                <span class="badge badge-success" data-toggle="tooltip" title="Cette commande a été payé">{{$order->order_id}}</span>
                                              @else
                                                <span class="badge badge-warning" data-toggle="tooltip" title="Cette commande n'est pas encore payé">{{$order->order_id}}</span>

                                              @endif
                                            </td>

                        <td > <small>{{$order->created_at->format("d/m/Y H:i:s")}}</small> </td>
                                            <td > <small>
                                              @if($order->cart == "shop")
                                              {{$order->cart}}
                                            @else
                                              {{\App\Models\Vente::where('slug', $order->cart)->first()->name}}
                                            @endif
                                            </small> </td>

                                            <td > <small> <a class="text-dark" target="_blank" href="{{url("manager/users/" . $order->user->id)}}">{{$order->user->email}}</a> </small> </td>
                                            <td > <small>{{$order->amount}}€</small> </td>
                                            <td class="hidden-sm hidden-xs">
                                              @if($order->payment_status == true and !is_null($order->payment_id))
                                                <a href="{{url("manager/payments/$order->payment_id")}}" class="badge badge-success">
                                                  {{$order->payment_id}}
                                                  @if($order->payment_method == "VISA")
                                                    <i class="fa fa-cc-visa"></i>
                                                  @elseif($order->payment_method == "MASTERCARD")
                                                    <i class="fa fa-cc-mastercard"></i>
                                                  @elseif($order->payment_method == "PAYPAL")
                                                    <i class="fa fa-cc-paypal"></i>
                                                  @else
                                                    <i class="fa fa-credit-card"></i>
                                                  @endif
                                                </a>
                                              @else
                                                <span class="badge badge-secondary">Pas encore payé</span>


                                              @endif
                                            </td>
                                            <td class="hidden-sm hidden-xs">
                                              @if($order->closed == true)
                                                <i class="text-success fa fa-check"></i>
                                              @else
                                                <i class="text-black fa fa-times"></i>

                                              @endif
                                            </td>
                                            {{-- <td>
                                                {!! Form::open(array('url' => 'manager/orders/' . $order->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('ordersmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Supprimer cette commande', 'data-message' => 'Etes vous certain de vouloir supprimer cette commande ?')) !!}
                                                {!! Form::close() !!}
                                            </td> --}}
                                            <td>
                                                <a target="_blank" class="btn btn-sm btn-outline-secondary btn-block" href="{{ URL::to('manager/orders/' . $order->id) }}"  title="Voir les détails">
                                                    {!! trans('ordersmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            {{-- <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('manager/orders/' . $order->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('ordersmanagement.buttons.edit') !!}
                                                </a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('ordersmanagement.enableSearchOrders'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            

                        </div>
      </div>
    </div>
  </div>
</div>
               
        </div>
    </div>

    @include('modals.modal-delete')

@endsection


@section('footer_scripts')
    @if ((count($orders) > config('ordersmanagement.datatablesJsStartCount')) && config('ordersmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('ordersmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('ordersmanagement.enableSearchOrders'))
        @include('scripts.search-orders')
    @endif

        <script type="text/javascript">


//line
var ctxL = document.getElementById("lineChart").getContext('2d');
ctxL.height=400;
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: [
"{{ \Carbon\Carbon::today()->subDays(14)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(13)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(12)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(11)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(10)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(9)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(8)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(7)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(6)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(4)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(3)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(2)->toDateString() }}",
"{{ \Carbon\Carbon::today()->subDays(1)->toDateString() }}",
"{{ \Carbon\Carbon::today()->toDateString() }}"],
datasets: [{
label: "{{ $vente->name }}",
data: ["{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(14))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(13))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(12))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(11))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(10))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(9))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(8))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(7))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(6))->get()) }}","{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(5))->get()) }}", "{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(4))->get()) }}", "{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(3))->get()) }}", "{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(2))->get()) }}", "{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(1))->get()) }}", "{{ count(\App\Models\Order::where('cart', "$vente->slug")->whereDate('created_at' , \Carbon\Carbon::today())->get()) }}"],
backgroundColor: [
'rgba(105, 0, 132, .2)',
],
borderColor: [
'rgba(200, 99, 132, .7)',
],
borderWidth: 2
},

]
},
options: {
responsive: true
}
});
</script>
@endsection

