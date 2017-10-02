
	<script type="text/javascript">

		function confirmDelete(id, msg, funcao) {
			bootbox.confirm({
    		message: msg,
    		buttons: {
        	confirm: {
            label: 'Sim',
            className: 'btn-success'
        	},
        	cancel: {
            label: 'Não',
            className: 'btn-danger'
        	}
    		},
    		callback: function (result) {
        	if (result == true)
						  window.location.href = '<?= site_url("turno/") ?>' + funcao + '/' + id;
    		}
			});
		}
	
		$(document).ready(function () {
			
			$('#AreaTable').dataTable()


</script>
<script type="text/javascript">

	$("#formTurnos").validate({
		errorClass: 'text-danger',
		errorElement: 'span',
		rules: {
			nome_area: {
				required: true,
				maxlength: 25
			},
			codigo: {
				required: true,
				minlength: 2,
				maxlength: 2
			}
		}
	});
</script>
</body>
</html>
