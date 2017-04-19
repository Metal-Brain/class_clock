<script>
    $("#disciplinas").multiSelect({
        selectableHeader: "<div class='multiselect'>Selecione as disciplinas</div>",
        selectionHeader: "<div class='multiselect'>Disciplinas selecionadas</div>"
    });
</script>


<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientsigla = button.data('whateversigla')
        var recipientqtdAlunos = button.data('whateverqtdAlunos')
        var recipientdp = button.data('whateverdp')
        var recipientdisciplina = button.data('whateverdisciplina').toString()
        var recipientId = button.data('whateverid')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Turma')
        modal.find('#recipient-sigla').val(recipientnsigla)
        modal.find('#recipient-qtdAlunos').val(recipientqtdAlunos)
        modal.find('#recipient-dp').val(recipientdp)
        modal.find('#recipient-id').val(recipientId)
    })
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#salaTable").DataTable({
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
