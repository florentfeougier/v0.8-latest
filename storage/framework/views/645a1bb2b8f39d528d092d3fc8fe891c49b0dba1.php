<script type="text/javascript">

	// CONFIRMATION DELETE MODAL
	$('#confirmDelete').on('show.bs.modal', function (e) {
		var message = $(e.relatedTarget).attr('data-message');
		var title = $(e.relatedTarget).attr('data-title');
		var form = $(e.relatedTarget).closest('form');
		$(this).find('.modal-body p').text(message);
		$(this).find('.modal-title').text(title);
		$(this).find('.modal-footer #confirm').data('form', form);
	});
	$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
	  	$(this).data('form').submit();
	});

	// CONFIRMATION DELETE MODAL
	$('#confirmOrderStatusEdit').on('show.bs.modal', function (e) {
		var message = $(e.relatedTarget).attr('data-message');
		var title = $(e.relatedTarget).attr('data-title');
		var form = $(e.relatedTarget).closest('form');
		//var url = $(this).attr('data-url');
		$(this).find('.modal-body p').text(message);
		$(this).find('.modal-title').text(title);
		$(this).find('.modal-footer #confirm').data('form', form);
	});
	$('#confirmOrderStatusEdit').find('.modal-footer #confirm').on('click', function(){
	  	$(this).data('form').submit();
	  	//$(this).attr("action", url);
	});
</script><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/scripts/delete-modal-script.blade.php ENDPATH**/ ?>