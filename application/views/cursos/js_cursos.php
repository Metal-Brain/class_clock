<script>
    $("#cursoPeriodos").multiSelect({
        selectableHeader: "<div class='multiselect'>Selecione o(s) período(s)</div>",
        selectionHeader: "<div class='multiselect'>Período(s) selecionado(s)</div>"
    });
    $("#periodos").multiSelect({
        selectableHeader: "<div class='multiselect'>Selecione o(s) período(s)</div>",
        selectionHeader: "<div class='multiselect'>Período(s) selecionado(s)</div>"
    });
    $("#cursoDisciplinas").multiSelect({
        selectableHeader: "<div class='multiselect'>Selecione as disciplinas</div>",
        selectionHeader: "<div class='multiselect'>Disciplinas selecionadas</div>"
    });
    $("#disciplinas").multiSelect({
        selectableHeader: "<div class='multiselect'>Selecione as disciplinas</div>",
        selectionHeader: "<div class='multiselect'>Disciplinas selecionadas</div>"
    });
</script>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        $("#cursoDisciplinas").multiSelect('deselect_all');
        $("#cursoPeriodos").multiSelect('deselect_all');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientsigla = button.data('whateversigla')
        var recipientnome = button.data('whatevernome')
        var recipientsemestre = button.data('whateversemestres')
        var recipientgrau = button.data('whatevergrau')
        var recipientPeriodo = button.data('whateverperiodo').toString()
        var recipientid = button.data('whateverid')
        var url = '<?= base_url('index.php/Curso/disciplinas/') ?>' + recipientid;
        $.getJSON(url, function (response) {
            var disciplinas = [];
            $.each(response, function (index, value) {
                disciplinas.push(value.id);
            });
            $("#cursoDisciplinas").multiSelect('select', disciplinas);
        });
		
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Curso')
        modal.find('#recipient-id').val(recipientid)
        modal.find('#recipient-sigla').val(recipientsigla)
        modal.find('#recipient-nome').val(recipientnome)
        modal.find('#recipient-semestres').val(recipientsemestre)
        modal.find('select[name=cursoGrau] option[value=' + recipientgrau + ']').prop('selected', true)
        if (recipientPeriodo.indexOf(',') != -1)
            recipientPeriodo = recipientPeriodo.split(',')
        $("#cursoPeriodos").multiSelect('select', recipientPeriodo)

    });
	
	$('#exampleModal2').on('show.bs.modal', function (event) {
        $("#cursoDisciplinas").multiSelect('deselect_all');
        $("#cursoPeriodos").multiSelect('deselect_all');
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientsigla = button.data('whateversigla')
        var recipientnome = button.data('whatevernome')
        var recipientsemestre = button.data('whateversemestres')
        var recipientgrau = button.data('whatevergrau')
        var recipientPeriodo = button.data('whateverperiodo').toString()
        var recipientid = button.data('whateverid')
        var url = '<?= base_url('index.php/Curso/disciplinas/') ?>' + recipientid;
        
		
			$.getJSON(url,function (response) {
				var disciplinas = [];
				$.each(response, function (index, value) {
					var row = '<li>'+value.nome+'</li>';
					$('#cursoDisciplinas2').prepend(row);
					});
			});
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Alterar Curso')
        modal.find('#recipient-id').val(recipientid)
        modal.find('#recipient-sigla').val(recipientsigla)
        modal.find('#recipient-nome').val(recipientnome)
        modal.find('#recipient-semestres').val(recipientsemestre)
        modal.find('select[name=cursoGrau] option[value=' + recipientgrau + ']').prop('selected', true)
       	var row = '<li>'+recipientPeriodo+'</li>';
					$('#periodo-view').prepend(row);

    });
	
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#curso-table").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>


<script>
    function exclude(id) {
        bootbox.confirm({
            message: "Realmente deseja desativar esse curso?",
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
                    window.location.href = '<?= base_url('index.php/Curso/deletar/') ?>' + id
            }
        });
    }

    function able(id) {
        bootbox.confirm({
            message: "Realmente deseja ativar esse curso?",
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
                    window.location.href = '<?= base_url("index.php/Curso/ativar/") ?>' + id
            }
        });
    }
</script>


</body>
</html>
