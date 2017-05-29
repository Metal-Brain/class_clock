<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientsigla = button.data('whateversigla')
        var recipientnome = button.data('whatevernome')
        var recipientQtdProf = button.data('whateverqtdprof')
        var recipentSemestre = button.data('whateversemestre')
        var recipientId = button.data('whateverid')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Disciplina')
        modal.find('#recipient-sigla').val(recipientsigla)
        modal.find('#recipient-nome').val(recipientnome)
        modal.find('#recipient-qtd-prof').val(recipientQtdProf)
        modal.find('#recipient-semestre').val(recipentSemestre)
        modal.find('#recipient-id').val(recipientId)
    })
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
</body>
</html>
