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
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#PeriodoTable").DataTable();
			});
		</script>
	</body>
</html>