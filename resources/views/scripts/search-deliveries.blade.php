

<script>
    $(function() {
        var cardTitle = $('#card_title');
        var deliveriesTable = $('#deliveries_table');
        var resultsContainer = $('#search_results');
        var deliveriesCount = $('#deliverie_count');
        var clearSearchTrigger = $('.clear-search');
        var searchform = $('#search_deliveries');
        var searchformInput = $('#deliverie_search_box');
        var deliveriePagination = $('#deliverie_pagination');
        var searchSubmit = $('#search_trigger');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        searchform.submit(function(e) {
            e.preventDefault();
            resultsContainer.html('');
            deliveriesTable.hide();
            clearSearchTrigger.show();
            let noResulsHtml = '<tr>' +
                                '<td>{!! trans("deliveriesmanagement.search.no-results") !!}</td>' +
                                '<td></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +

                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>';

            $.ajax({
                type:'POST',
                url: "{{ route('search-deliveries') }}",
                data: searchform.serialize(),
                success: function (result) {
                    let jsonData = JSON.parse(result);
                    if (jsonData.length != 0) {
                        $.each(jsonData, function(index, val) {
                            let rolesHtml = '';
                            let roleClass = '';
                            let showCellHtml = '<a class="btn btn-sm btn-success btn-block" href="deliveries/' + val.id + '" data-toggle="tooltip" title="{{ trans("deliveriesmanagement.tooltips.show") }}">{!! trans("deliveriesmanagement.buttons.show") !!}</a>';
                            let editCellHtml = '<a class="btn btn-sm btn-info btn-block" href="deliveries/' + val.id + '/edit" data-toggle="tooltip" title="{{ trans("deliveriesmanagement.tooltips.edit") }}">{!! trans("deliveriesmanagement.buttons.edit") !!}</a>';
                            let deleteCellHtml = '<form method="POST" action="/deliveries/'+ val.id +'" accept-charset="UTF-8" data-toggle="tooltip" title="Delete">' +
                                    '{!! Form::hidden("_method", "DELETE") !!}' +
                                    '{!! csrf_field() !!}' +
                                    '<button class="btn btn-danger btn-sm" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="{!! trans("deliveriesmanagement.modals.delete_deliverie_message", ["deliverie" => "'+val.name+'"]) !!}">' +
                                        '{!! trans("deliveriesmanagement.buttons.delete") !!}' +
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
                                '<td>' + val.deliverie_id + '</td>' +
                                '<td>' + val.created_at + '</td>' +
                                '<td class="hidden-xs">' + val.cart + '</td>' +
                                '<td class="hidden-xs">' + val.user_id  + '</td>' +
                                '<td class="hidden-xs">' + val.amount + '</td>' +
                                '<td class="hidden-xs">' + val.payment_id + '</td>' +

                                '<td>' + deleteCellHtml + '</td>' +
                                '<td>' + showCellHtml + '</td>' +
                                '<td>' + editCellHtml + '</td>' +
                            '</tr>');
                        });
                    } else {
                        resultsContainer.append(noResulsHtml);
                    };
                    deliveriesCount.html(jsonData.length + " {!! trans('deliveriesmanagement.search.found-footer') !!}");
                    deliveriePagination.hide();
                    cardTitle.html("{!! trans('deliveriesmanagement.search.title') !!}");
                },
                error: function (response, status, error) {
                    if (response.status === 422) {
                        resultsContainer.append(noResulsHtml);
                        deliveriesCount.html(0 + " {!! trans('deliveriesmanagement.search.found-footer') !!}");
                        deliveriePagination.hide();
                        cardTitle.html("{!! trans('deliveriesmanagement.search.title') !!}");
                    };
                },
            });
        });
        searchSubmit.click(function(event) {
            event.preventDefault();
            searchform.submit();
        });
        searchformInput.keyup(function(event) {
            if ($('#deliverie_search_box').val() != '') {
                clearSearchTrigger.show();
            } else {
                clearSearchTrigger.hide();
                resultsContainer.html('');
                deliveriesTable.show();
                cardTitle.html("{!! trans('deliveriesmanagement.showing-all-deliveries') !!}");
                deliveriePagination.show();
                deliveriesCount.html(" ");
            };
        });
        clearSearchTrigger.click(function(e) {
            e.preventDefault();
            clearSearchTrigger.hide();
            deliveriesTable.show();
            resultsContainer.html('');
            searchformInput.val('');
            cardTitle.html("{!! trans('deliveriesmanagement.showing-all-deliveries') !!}");
            deliveriePagination.show();
            deliveriesCount.html(" ");
        });
    });
</script>

