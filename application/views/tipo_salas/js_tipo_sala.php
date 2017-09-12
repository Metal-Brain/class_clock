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
			window.location.href = '<?= site_url("Tipo_sala/") ?>' + funcao + '/' + id;
		}
		});
	}

	function cancelEdition(msg) {
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
			window.location.href = '<?= site_url("Tipo_sala/") ?>';
		}
		});
	}
	
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