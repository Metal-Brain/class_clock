        <script type="text/javascript">
			$(".formPeriodos").validate({
				errorClass: 'text-danger',
				errorElement: 'span',
				rules: {
					nome: {
						required: true,
						minlength: 5,
						maxlength: 150
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
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#PeriodoTable").DataTable();
			});
		</script>
	</body>
</html>