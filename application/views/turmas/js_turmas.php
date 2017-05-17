<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientsigla = button.data('whateversigla')
        var recipientqtdAlunos = button.data('whateverqtd')
        var recipientdp = button.data('whateverdp')
        var recipientdisciplina = button.data('whateverdisciplina')
        var recipientId = button.data('whateverid')
        var recipientIdDisciplina = button.data('whateveriddisciplina')
        console.log(recipientIdDisciplina);
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Turma')
        modal.find('#recipient-sigla').val(recipientsigla)
        modal.find('#recipient-qtdAlunos').val(recipientqtdAlunos)
        modal.find('#recipient-dp').prop('checked',recipientdp)
        modal.find('select[name=recipient-disciplina] option[value='+recipientIdDisciplina+']').prop('selected',true)
        modal.find('#recipient-id').val(recipientId)
    });
	
	
	 $('#exampleModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientsigla = button.data('whateversigla')
        var recipientqtdAlunos = button.data('whateverqtd')
        var recipientdp = button.data('whateverdp')
        var recipientdisciplina = button.data('whateverdisciplina')
        var recipientId = button.data('whateverid')
        var recipientIdDisciplina = button.data('whateveriddisciplina')
        console.log(recipientIdDisciplina);
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Turma')
        modal.find('#recipient-sigla').val(recipientsigla)
        modal.find('#recipient-qtdAlunos').val(recipientqtdAlunos)
        modal.find('#recipient-dp').prop('checked',recipientdp)
        modal.find('select[name=recipient-disciplina] option[value='+recipientIdDisciplina+']').prop('selected',true)
        modal.find('#recipient-id').val(recipientId)
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#turmaTable").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>

<script>
    function exclude(id) {
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
                if (result)
                    window.location.href = '<?= base_url("index.php/Turma/desativar/") ?>' + id
            }
        });
    }

    function able(id) {
        bootbox.confirm({
            message: "Realmente deseja reativar essa turma?",
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
                    window.location.href = '<?= base_url("index.php/Turma/ativar/") ?>' + id
            }
        });
    }
</script>
</body>
</html>
