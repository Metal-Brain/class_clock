<div class="row">
	<div id="footer" class="col">
		<p>Desenvolvido por Metal Code</p>
	</div>
</div>

</div><!--Fecha container-fluid-->

<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootbox.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/JqueryMask/jquery.mask.min.js') ?>"></script>
<!-- multi-select -->
<script type="text/javascript" src="<?= base_url('assets/multi-select/js/jquery.multi-select.js') ?>"></script>
<script type="text/javascript">
	// override jquery validate plugin defaults
	$.validator.setDefaults({
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		}
	});
</script>