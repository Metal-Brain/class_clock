		<script type="text/javascript">
			$(".formPessoas").validate({
				errorClass: 'text-danger',
				errorElement: 'span',
				rules: {
					nome: {
						required: true,
						minlength: 5,
						maxlength: 150
					},
					prontuario: {
						required: true,
						minlength: 6,
						remote: "<?= base_url('index.php/Pessoa/verificaProntuario/') ?>"
					},
					senha: {
						if(document.getElementById("senha_editar") == null){
                            required: true,
                        }
						minlength: 6
					},
					email: {
						required: true,
						email: true
					}

				},
				messages: {
					prontuario: {
						remote: 'O campo deve conter um valor único.'
					}
				}
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#PessoaTable").DataTable();

				if($(".checkdocente-toggle:checked").length > 0){
					$('.conteudo-docente').show();
				}
			});

			$(".checkdocente-toggle").change(function() {
				if(this.checked){
					$('.conteudo-docente').show();
				} else {
					$('.conteudo-docente').hide();
				}
			});
		</script>
		<script type="text/javascript">

				$('.data').datepicker({ dateFormat: "dd-mm-yy" }).val();
		
		</script>
	</body>
</html>
