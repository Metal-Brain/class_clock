	<script>
		$("#disciplinas").multiSelect({
			selectableHeader: "<div class='multiselect'>Selecione as disciplinas</div>",
			selectionHeader: "<div class='multiselect'>Disciplinas selecionadas</div>"
		});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function () {

			$("#disciplinas").multiSelect();

			var recipientid = <?= $this->session->id?>;
			var url = '<?= base_url('index.php/Professor/disciplinas/') ?>' + recipientid;

			$.getJSON(url,function (response) {
				var disciplinas = [];
				$.each(response, function (index, value) {
					disciplinas.push(value.id);
				});
				$("#disciplinas").multiSelect('select',disciplinas);
			});

		});
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#alterarEmail').validate({
				rules: {
					novoEmail: { required: true, email: true, remote: '<?= base_url("index.php/Usuario/verificaEmail/") ?>' },
					confirmaEmail: { required: true, email: true }
				},
				messages: {
					novoEmail: { required: 'Campo obrigatório', email: 'Insira um e-mail válido', remote: 'Este e-mail já está em uso' },
					confirmaEmail: { required: 'Campo obrigatório', email: 'Insira um e-mail válido' }
				}
			});
			
			$('#alterarSenha').validate({
				rules: {
					senhaAtual: { required: true },
					novaSenha: { required: true },
					confirmaSenha: { required: true, equalTo: '#novaSenha' }
				},
				messages: {
					senhaAtual: { required: 'Campo obrigatório', email: 'Insira um e-mail válido', remote: 'Este e-mail já está em uso' },
					novaSenha: { required: 'Campo obrigatório', email: 'Insira um e-mail válido' },
					confirmaSenha: { required: 'Campo obrigatório', equalTo: 'Senha incorreta' }
				}
			});
		});
	</script>


	</body>
</html>
