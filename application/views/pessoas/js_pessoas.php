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
						window.location.href = '<?= site_url("pessoa/") ?>' + funcao + '/' + id;
					}
				});
			}
			
			$(".formPessoas").validate({
				errorClass: 'text-danger',
				errorElement: 'span',
				rules: {
					nome: {
						required: true,
						minlength: 5,
						maxlength: 150
					},
					senha: {
						minlength: 6
					},
					email: {
						required: true,
						email: true
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
		</script>

		<!-- PERMITE APENAS LETRAS E NÚMEROS NO INPUT "NOME" -->
		<!-- OBS: Aceita espaços e letras acentuadas -->
		<!-- By Minska :P -->
		<script>
			function mascara(o,f){
				v_obj=o;
				v_fun=f;
				setTimeout("execmascara()",1);
			}
			function execmascara(){
				v_obj.value=v_fun(v_obj.value);
			}
			function alphanum( v ){
				v=v.replace(/[^a-zà-úA-ZÀ-Ú 0-9]/g,""); //Remove tudo que não quero rs
				return v;
			}
		</script>
	</body>
</html>
