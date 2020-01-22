<div class="row">
    <div class="col-lg-9">
        <a class="
{{ Request::is('manager/payments') ? 'btn-secondary' : 'btn-outline-secondary' }}
        btn" href="{{ url("manager/payments") }}">Tous ({{ count( \App\Models\Payment::all()) }})</a>

       
                <a class="btn {{ Request::is('manager/payments/filters/shop') ? 'btn-secondary' : 'btn-outline-secondary' }}
        btn" href="{{ url("manager/payments") }}" href="{{ url("manager/payments/filters/shop") }}">Validé</a>
                <a class="btn btn-outline-secondary" href="{{ url("manager/payments/filters/shop") }}">En attente</a>
    </div>
    <div class="col-lg-3">
        {!! Form::open(['route' => 'search-payments', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation', 'id' => 'search_payments']) !!}
            {!! csrf_field() !!}
            <div class="input-group mb-3">
                {!! Form::text('order_search_box', NULL, ['id' => 'order_search_box', 'class' => 'form-control', 'placeholder' => "Recherche...", 'aria-label' => trans('paymentsmanagement.search.search-payments-ph'), 'required' => false]) !!}
                <div class="input-group-append">
                    <a href="#" class="input-group-addon btn btn-warning clear-search" data-toggle="tooltip" title="{{ trans('paymentsmanagement.tooltips.clear-search') }}" style="display:none;">
                        <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                        <span class="sr-only">
                            {!! trans('paymentsmanagement.tooltips.clear-search') !!}
                        </span>
                    </a>
                    <a href="#" class="input-group-addon btn btn-secondary" id="search_trigger" data-toggle="tooltip" data-placement="bottom" title="{{ trans('paymentsmanagement.tooltips.submit-search') }}" >
                        <i class="fa fa-search fa-fw" aria-hidden="true"></i>
                        <span class="sr-only">
                            {!!  trans('paymentsmanagement.tooltips.submit-search') !!}
                        </span>
                    </a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>


