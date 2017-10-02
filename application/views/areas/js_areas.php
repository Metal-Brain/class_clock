
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
						  window.location.href = '<?= site_url("area/") ?>' + funcao + '/' + id;
    		}
			});
		}



</script>
<script type="text/javascript">

	$("#formAreas").validate({
		errorClass: 'text-danger',
		errorElement: 'span',
		rules: {
			nome_turno: {
				required: true,
				maxlength: 25
			},
			coodigo: {
				required: true,
				minlength: 2,
				maxlength: 2
			}
		}
	});

  $(document).ready(function () {
    $('#areaTable').dataTable( {
      "language": {
        "url": "<?= base_url('assets/DataTables/translatePortuguese.js');?>"
      }
    } );
  });
</script>
</body>
</html>
