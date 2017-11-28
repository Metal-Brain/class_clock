        <script type="text/javascript">
			$(".formPeriodos").validate({
				errorClass: 'text-danger',
				errorElement: 'span',
				rules: {
					nome: {
						required: true,
						minlength: 5,
						maxlength: 6
					}
				}
			});

			function confirm(id, msg, funcao) {
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
							window.location.href = '<?= site_url("periodo/") ?>' + funcao + '/' + id;
					}
				});
			}

			function mascara(o,f){
				v_obj = o;
				v_fun = f;
				setTimeout("execmascara()",1);
			}

			function execmascara(){
				v_obj.value = v_fun(v_obj.value);
			}

			function somenteNumeros(num){
				num = num.replace(/\D/g,"");
				num = num.replace(/^(\d{4})(\d)/,"$1-$2");
				return num;
			}
        </script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#PeriodoTable").DataTable();
			});
		</script>
		<script type="text/javascript">
		    $("#manipulaViewCadastroViaCSV").change(function() {
		                if(!this.checked){
		                    $('.csv').hide();
		                    $('.formPeriodos').show();
		                } else {
		                    $('.csv').show();
		                      $('.formPeriodos').hide();
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