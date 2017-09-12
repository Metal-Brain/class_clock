<script type="text/javascript">
	$("#formTipo_Sala").validate({
		rules: {
			nome_tipo_sala: {
				required: true,
				maxlength: 30
			}
		}
	});

	$("#Tipo_SalaTable").DataTable();
</script>