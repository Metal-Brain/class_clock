<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnsala = button.data('whatevernsala')
        var recipientcapmax = button.data('whatevercapmax')
        var recipienttipo = button.data('whatevertipo')
        var recipientId = button.data('whateverid')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Sala')
        modal.find('#recipient-nSala').val(recipientnsala)
        modal.find('#recipient-capMax').val(recipientcapmax)
        modal.find('#recipient-tipo').val(recipienttipo)
        modal.find('#recipient-id').val(recipientId)
    });
	
	
	$('#exampleModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnsala = button.data('whatevernsala')
        var recipientcapmax = button.data('whatevercapmax')
        var recipienttipo = button.data('whatevertipo')
        var recipientId = button.data('whateverid')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Sala')
        modal.find('#recipient-nSala').val(recipientnsala)
        modal.find('#recipient-capMax').val(recipientcapmax)
        modal.find('#recipient-tipo').val(recipienttipo)
        modal.find('#recipient-id').val(recipientId)
    });
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
            message: "Realmente deseja desativar essa sala?",
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
                    window.location.href = '<?= base_url("index.php/Sala/desativar/") ?>' + id
            }
        });
    }

    function able(id) {
        bootbox.confirm({
            message: "Realmente deseja reativar essa sala?",
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
                    window.location.href = '<?= base_url("index.php/Sala/ativar/") ?>' + id
            }
        });
    }
</script>
</body>
</html>
