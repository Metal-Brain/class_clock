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
				},
				nome: {
					prontuario: {
						remote: 'O campo deve conter um valor único.'
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

            function somenteNumeros(num)
            {
                var er = /[^0-9.-]/;
                var per = num.value;
                er.lastIndex = 0;
                var campo = num;
                if (er.test(campo.value))
                {
                    campo.value = "";
                }
                else
                {
                    if(per.length ==4)
                    {
                        num.value = per += "-";
                    }
                }
            }

        </script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#PeriodoTable").DataTable();
			});
		</script>
	</body>
</html>