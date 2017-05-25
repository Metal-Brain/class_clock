<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientsigla = button.data('whateversigla')
        var recipientnome = button.data('whatevernome')
        var recipientQtdProf = button.data('whateverqtdprof')
        var recipientId = button.data('whateverid')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Disciplina')
        modal.find('#recipient-sigla').val(recipientsigla)
        modal.find('#recipient-nome').val(recipientnome)
        modal.find('#recipient-qtd-prof').val(recipientQtdProf)
        modal.find('#recipient-id').val(recipientId)
    });
	
	    $('#exampleModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientsigla = button.data('whateversigla')
        var recipientnome = button.data('whatevernome')
        var recipientQtdProf = button.data('whateverqtdprof')
        var recipientId = button.data('whateverid')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Disciplina')
        modal.find('#recipient-sigla').val(recipientsigla)
        modal.find('#recipient-nome').val(recipientnome)
        modal.find('#recipient-qtd-prof').val(recipientQtdProf)
        modal.find('#recipient-id').val(recipientId)
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#disciplinaTable").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>


<script>
    function disable(id) {
        bootbox.confirm({
            message: "Realmente deseja desativar essa disciplina?",
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
                if (result)
                    window.location.href = '<?= base_url("index.php/Disciplina/desativar/") ?>' + id
            }
        });
    }

    function able(id) {
        bootbox.confirm({
            message: "Realmente deseja ativar essa disciplina?",
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
                if (result)
                    window.location.href = '<?= base_url("index.php/Disciplina/ativar/") ?>' + id
            }
        });
    }
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cadastrarDisciplina').validate({
			rules: {
				nome: { required: true, minlength: 5 },
				sigla: { required: true, email: true },
				qtdProf: { required: true, number: true }
			},
			messages: {
				nome: { required: 'Preencha o campo nome', minlength: 'O campo nome deve ter no mínimo 5 letras' },
				sigla: { required: 'Informe o seu email', email: 'Ops, informe um email válido' },
				qtdProf: { required: 'Preencha o campo quantidade de professores', number: 'Digite apenas números'}
			}
		});
	});
</script>
</body>
</html>
