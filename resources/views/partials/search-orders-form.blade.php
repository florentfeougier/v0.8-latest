<div class="row">
    <div class="col-lg-9">
        <a class="
{{ Request::is('manager/orders') ? 'btn-secondary' : 'btn-outline-secondary' }}
        btn" href="{{ url("manager/orders") }}">Toutes ({{ count( \App\Models\Order::all()) }})</a>

        @foreach(\App\Models\Vente::where('is_public', true)->get() as $vente)
        <a class="btn {{ Request::is("manager/orders/filters/$vente->slug") ? 'btn-secondary' : 'btn-outline-secondary' }}
        btn" href="{{ url("manager/orders/filters/$vente->slug") }}" href="{{ url("manager/orders/filters/$vente->slug") }}">{{ $vente->name }} ({{ count( \App\Models\Order::where('cart', $vente->slug)->get() ) }})</a>
        @endforeach
                <a class="btn {{ Request::is('manager/orders/filters/shop') ? 'btn-secondary' : 'btn-outline-secondary' }}
        btn" href="{{ url("manager/orders/filters/shop") }}" href="{{ url("manager/orders/filters/shop") }}">Shop</a>
               
    </div>
    <div class="col-lg-3">
        {!! Form::open(['route' => 'search-orders', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation', 'id' => 'search_orders']) !!}
            {!! csrf_field() !!}
            <div class="input-group mb-3">
                {!! Form::text('order_search_box', NULL, ['id' => 'order_search_box', 'class' => 'form-control', 'placeholder' => "Recherche...", 'aria-label' => trans('ordersmanagement.search.search-orders-ph'), 'required' => false]) !!}
                <div class="input-group-append">
                    <a href="#" class="input-group-addon btn btn-warning clear-search" data-toggle="tooltip" title="{{ trans('ordersmanagement.tooltips.clear-search') }}" style="display:none;">
                        <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                        <span class="sr-only">
                            {!! trans('ordersmanagement.tooltips.clear-search') !!}
                        </span>
                    </a>
                    <a href="#" class="input-group-addon btn btn-secondary" id="search_trigger" data-toggle="tooltip" data-placement="bottom" title="{{ trans('ordersmanagement.tooltips.submit-search') }}" >
                        <i class="fa fa-search fa-fw" aria-hidden="true"></i>
                        <span class="sr-only">
                            {!!  trans('ordersmanagement.tooltips.submit-search') !!}
                        </span>
                    </a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>


