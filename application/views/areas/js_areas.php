
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

		$(document).ready(function () {
   			$('#areaTable').dataTable( {
      		"language": {
        	"url": "<?= base_url('assets/DataTables/translatePortuguese.js');?>"
     	 	 }
   			} );
  		});

	</script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#AreaTable').dataTable( {
      "language": {
        "url": "<?= base_url('assets/DataTables/translatePortuguese.js');?>"
      }
    } );
  });

	$("#formAreas").validate({
		errorClass: 'text-danger',
		errorElement: 'span',
		rules: {
			nome_area: {
				required: true,
				maxlength: 25
			},
			codigo: {
				required: true,
				minlength: 1,
				maxlength: 5
			}
		}
	});

  
</script>
<script type="text/javascript">
    $("#manipulaViewCadastroViaCSV").change(function() {
                if(!this.checked){
                    $('.csv').hide();
                    $('.formAreas').show();
                } else {
                    $('.csv').show();
                      $('.formAreas').hide();
                }
            });
</script>
<script type="text/javascript">
    $("#csvCampo").change(function() {
                if(!this.checked){
                    $('.campoImportar').show();
                } else {
                    $('.campoImportar').hide();
                }
            });

</script>
</body>
</html>
