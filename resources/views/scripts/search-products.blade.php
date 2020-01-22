<script>
    $(function() {
        var cardTitle = $('#card_title');
        var productsTable = $('#products_table');
        var resultsContainer = $('#search_results');
        var productsCount = $('#product_count');
        var clearSearchTrigger = $('.clear-search');
        var searchform = $('#search_products');
        var searchformInput = $('#product_search_box');
        var productPagination = $('#product_pagination');
        var searchSubmit = $('#search_trigger');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        searchform.submit(function(e) {
            e.preventDefault();
            resultsContainer.html('');
            productsTable.hide();
            clearSearchTrigger.show();
            let noResulsHtml = '<tr>' +
                                '<td>{!! trans("productsmanagement.search.no-results") !!}</td>' +
                                '<td></td>' +
                          
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-sm hidden-xs"></td>' +
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>';

            $.ajax({
                type:'POST',
                url: "{{ route('search-products') }}",
                data: searchform.serialize(),
                success: function (result) {
                  console.log(result);

                    let jsonData = JSON.parse(result);
                    if (jsonData.length != 0) {
                        $.each(jsonData, function(index, val) {
                            let rolesHtml = '';
                            let roleClass = '';
                            let showCellHtml = '<a class="btn btn-sm btn-success btn-block" href="products/' + val.id + '" data-toggle="tooltip" title="{{ trans("productsmanagement.tooltips.show") }}">{!! trans("productsmanagement.buttons.show") !!}</a>';
                            let editCellHtml = '<a class="btn btn-sm btn-info btn-block" href="products/' + val.id + '/edit" data-toggle="tooltip" title="{{ trans("productsmanagement.tooltips.edit") }}">{!! trans("productsmanagement.buttons.edit") !!}</a>';
                            let deleteCellHtml = '<form method="POST" action="/products/'+ val.id +'" accept-charset="UTF-8" data-toggle="tooltip" title="Delete">' +
                                    '{!! Form::hidden("_method", "DELETE") !!}' +
                                    '{!! csrf_field() !!}' +
                                    '<button class="btn btn-danger btn-sm" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="{!! trans("productsmanagement.modals.delete_product_message", ["product" => "'+val.name+'"]) !!}">' +
                                        '{!! trans("productsmanagement.buttons.delete") !!}' +
                                    '</button>' +
                                '</form>';

                            $.each(val.roles, function(roleIndex, role) {
                                if (role.name == "User") {
                                    roleClass = 'primary';
                                } else if (role.name == "Admin") {
                                    roleClass = 'warning';
                                } else if (role.name == "Unverified") {
                                    roleClass = 'danger';
                                } else {
                                    roleClass = 'default';
                                };
                                rolesHtml = '<span class="label label-' + roleClass + '">' + role.name + '</span> ';
                            });
                            resultsContainer.append('<tr>' +
                                '<td>' + val.sku + '</td>' +
                                '<td>' + val.name + '</td>' +
                                '<td class="hidden-xs">' + val.price + '€</td>' +
                                '<td class="hidden-xs">' + val.tax + '%</td>' +
                                '<td class="hidden-xs">' + val.stock + '</td>' +
                                '<td>' + deleteCellHtml + '</td>' +
                                '<td>' + showCellHtml + '</td>' +
                                '<td>' + editCellHtml + '</td>' +
                            '</tr>');
                        });
                    } else {
                        resultsContainer.append(noResulsHtml);
                    };
                    productsCount.html(jsonData.length + " {!! trans('productsmanagement.search.found-footer') !!}");
                    productPagination.hide();
                    cardTitle.html("{!! trans('productsmanagement.search.title') !!}");
                },
                error: function (response, status, error) {
                    console.log(response);
                    if (response.status === 422) {
                        resultsContainer.append(noResulsHtml);
                        productsCount.html(0 + " {!! trans('productsmanagement.search.found-footer') !!}");
                        productPagination.hide();
                        cardTitle.html("{!! trans('productsmanagement.search.title') !!}");
                    };
                },
            });
        });
        searchSubmit.click(function(event) {
            event.preventDefault();
            searchform.submit();
        });
        searchformInput.keyup(function(event) {
            if ($('#product_search_box').val() != '') {
                clearSearchTrigger.show();
            } else {
                clearSearchTrigger.hide();
                resultsContainer.html('');
                productsTable.show();
                cardTitle.html("{!! trans('productsmanagement.showing-all-products') !!}");
                productPagination.show();
                productsCount.html(" ");
            };
        });
        clearSearchTrigger.click(function(e) {
            e.preventDefault();
            clearSearchTrigger.hide();
            productsTable.show();
            resultsContainer.html('');
            searchformInput.val('');
            cardTitle.html("{!! trans('productsmanagement.showing-all-products') !!}");
            productPagination.show();
            productsCount.html(" ");
        });
    });

</script>

