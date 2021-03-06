

    <div class="col-lg-4">
        {!! Form::open(['route' => 'search-deliveries', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation', 'id' => 'search_deliveries']) !!}
            {!! csrf_field() !!}

            <div class="input-group mb-3">

                {!! Form::text('order_search_box', NULL, ['id' => 'order_search_box', 'class' => 'form-control', 'placeholder' => "Recherche...", 'aria-label' => trans('deliveriesmanagement.search.search-deliveries-ph'), 'required' => false]) !!}
                <div class="input-group-append">
                    <a href="#" class="input-group-addon btn btn-warning clear-search" data-toggle="tooltip" title="{{ trans('deliveriesmanagement.tooltips.clear-search') }}" style="display:none;">
                        <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                        <span class="sr-only">
                            {!! trans('deliveriesmanagement.tooltips.clear-search') !!}
                        </span>
                    </a>
                    <a href="#" class="input-group-addon btn btn-secondary" id="search_trigger" data-toggle="tooltip" data-placement="bottom" title="{{ trans('deliveriesmanagement.tooltips.submit-search') }}" >
                        <i class="fa fa-search fa-fw" aria-hidden="true"></i>
                        <span class="sr-only">
                            {!!  trans('deliveriesmanagement.tooltips.submit-search') !!}
                        </span>
                    </a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

