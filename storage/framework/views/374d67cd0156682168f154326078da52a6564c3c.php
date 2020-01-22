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
                                '<td><?php echo trans("productsmanagement.search.no-results"); ?></td>' +
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
                url: "<?php echo e(route('search-products')); ?>",
                data: searchform.serialize(),
                success: function (result) {
                  console.log(result);

                    let jsonData = JSON.parse(result);
                    if (jsonData.length != 0) {
                        $.each(jsonData, function(index, val) {
                            let rolesHtml = '';
                            let roleClass = '';
                            let showCellHtml = '<a class="btn btn-sm btn-success btn-block" href="products/' + val.id + '" data-toggle="tooltip" title="<?php echo e(trans("productsmanagement.tooltips.show")); ?>"><?php echo trans("productsmanagement.buttons.show"); ?></a>';
                            let editCellHtml = '<a class="btn btn-sm btn-info btn-block" href="products/' + val.id + '/edit" data-toggle="tooltip" title="<?php echo e(trans("productsmanagement.tooltips.edit")); ?>"><?php echo trans("productsmanagement.buttons.edit"); ?></a>';
                            let deleteCellHtml = '<form method="POST" action="/products/'+ val.id +'" accept-charset="UTF-8" data-toggle="tooltip" title="Delete">' +
                                    '<?php echo Form::hidden("_method", "DELETE"); ?>' +
                                    '<?php echo csrf_field(); ?>' +
                                    '<button class="btn btn-danger btn-sm" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="<?php echo trans("productsmanagement.modals.delete_product_message", ["product" => "'+val.name+'"]); ?>">' +
                                        '<?php echo trans("productsmanagement.buttons.delete"); ?>' +
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
                    productsCount.html(jsonData.length + " <?php echo trans('productsmanagement.search.found-footer'); ?>");
                    productPagination.hide();
                    cardTitle.html("<?php echo trans('productsmanagement.search.title'); ?>");
                },
                error: function (response, status, error) {
                    console.log(response);
                    if (response.status === 422) {
                        resultsContainer.append(noResulsHtml);
                        productsCount.html(0 + " <?php echo trans('productsmanagement.search.found-footer'); ?>");
                        productPagination.hide();
                        cardTitle.html("<?php echo trans('productsmanagement.search.title'); ?>");
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
                cardTitle.html("<?php echo trans('productsmanagement.showing-all-products'); ?>");
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
            cardTitle.html("<?php echo trans('productsmanagement.showing-all-products'); ?>");
            productPagination.show();
            productsCount.html(" ");
        });
    });

</script>

<?php /**PATH /Users/florent/Dev/plantesaddict/prod/resources/views/scripts/search-products.blade.php ENDPATH**/ ?>