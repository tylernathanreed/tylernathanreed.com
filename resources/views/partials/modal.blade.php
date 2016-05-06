<div id="modal" class="modal modal-primary fade" tabindex="-1" role="dialog" aria-labelledby="modal-label">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 id="modal-label" class="modal-title">Loading...</h4>
			</div> <!-- </modal-header> -->

			<div class="modal-body">
				<div class="spinner"></div>
			</div> <!-- </modal-body> -->

			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Apply</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<script src="/media/js/chosen-select.js"></script>

<script>
	var f = function()
	{
		if(this.value == '')
			return;

		$('*[data-visible-select=' + this.name + '][data-visible-value=' + this.value + ']').show();
		$('*[data-visible-select=' + this.name + ']:not([data-visible-value=' + this.value + '])').hide();
	};

	$('.modal').on('show.bs.modal', function(e)
	{
		var modal = this;
		var link = $(e.relatedTarget);

		$(this).find('.modal-content').load(link.attr('href'), function() {
			$('select[name]', modal).each(f);
			$('select[name]', modal).change(f);
		});
	});

	$('.modal').on('hidden.bs.modal', function(e)
	{
		var modal = this;
		var link = $(e.relatedTarget);

		$(this).find('.modal-body').html('<div class="spinner"></div>');
	});

	$("select[multiple]").chosen();
</script>