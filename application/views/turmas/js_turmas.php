 <script type="text/javascript">
  $('#TurmaTable').dataTable();

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
						window.location.href = '<?= site_url("turma/") ?>' + funcao + '/' + id;
					}
				});
			}
</script>

<script type="text/javascript">


	$(document).ready(function () {
		 $('#formTurma').validate({
			ignore: [],
				rules: {

					disciplina_id: { required: true},
					turno_id: { required: true},
					qtd_alunos: { required: true,number: true, min: 1, max: 999},
					dp: { required: true}

				},
				messages: {
					disciplina_id:
                        { required: 'Campo obrigatório'
                        },

					turno_id:
                        { required: 'Campo obrigatório'
                        },

					qtd_alunos:
                        { required: 'Campo obrigatório',
                         minlength: 'O campo deve ter 1 como valor  mínimo',
                         maxlength: 'O campo deve ter 999 como valor maximo'
                        },

					dp:
                        { required: 'Campo obrigatório'
                        }
				}
			});




	});



//$("#formCurso").validate();

</script>


</body>
</html>
