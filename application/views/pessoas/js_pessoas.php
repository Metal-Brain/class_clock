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
<<<<<<< HEAD

				$('.data').datepicker({ dateFormat: "dd/mm/yy" }).val();

=======
			jQuery(function($){
				$.datepicker.regional['pt-BR'] = {
					closeText: 'Fechar',
					prevText: '&#x3c;Anterior',
					nextText: 'Pr&oacute;ximo&#x3e;',
					currentText: 'Hoje',
					monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
					'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
					monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
					'Jul','Ago','Set','Out','Nov','Dez'],
					dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
					dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
					dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
					weekHeader: 'Sm',
					dateFormat: 'dd/mm/yy',
					firstDay: 0,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ''};
				$.datepicker.setDefaults($.datepicker.regional['pt-BR']);
			});
			$('.data').datepicker().val();
		
>>>>>>> 577ff9ba6e5e512a01c68a60d31462021051b296
		</script>
	</body>
</html>
