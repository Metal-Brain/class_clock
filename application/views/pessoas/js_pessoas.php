		<script type="text/javascript">
			$("#formPessoas").validate({
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
						remote: '<?= base_url("index.php/Pessoa/verificaProntuario/") ?>'
					},
					senha: {
						required: true,
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
			
			    document.getElementById("nome").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM".indexOf(chr) < 0)
           return false;
       };
		</script>
		<script type="text/javascript">

				$(".checkdocente-toggle").click(function(){
					$('#conteudo-docente').toggle();
				});

		</script>
	</body>
</html>
