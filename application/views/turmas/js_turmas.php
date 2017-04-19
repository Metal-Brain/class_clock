
		<script type="text/javascript">
				$('#exampleModal').on('show.bs.modal', function (event) {
						var button = $(event.relatedTarget) // Button that triggered the modal
						var recipient = button.data('whatever') // Extract info from data-* attributes
						var recipientdisciplina = button.data('whateverdisciplina')
						var recipientQtdAluno = button.data('whateverqtdAluno')
						var recipientId = button.data('whateverid')
						var recipientNome = button.data('whatevernome')
						var recipientDp = button.data('whateverdp')
						// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						var modal = $(this)
						modal.find('.modal-title').text('Alterar Turma')
						modal.find('#recipient-disciplina').val(recipientdisciplina)
						modal.find('#recipient-qtd-aluno').val(recipientQtdAluno)
						modal.find('#recipient-id').val(recipientId)
						modal.find('#recipient-nome').val(recipientNome)
						modal.find('#recipient-dp').val(recipientDp)
				})
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#TurmaTable").DataTable({
					"language":{
						"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
					}
				});
			});
		</script>
		<script>
			function disable(id){
				bootbox.confirm({
					message: "Realmente deseja desativar essa turma?",
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
						if(result)
							window.location.href = '<?= base_url("index.php/Turma/desativar/")?>'+id
					}
				});
			}

			function able(id){
				bootbox.confirm({
					message: "Realmente deseja ativar essa Turma?",
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
						if(result)
							window.location.href = '<?= base_url("index.php/Turma/ativar/")?>'+id
					}
				});
			}
		</script>
	</body>
</html>