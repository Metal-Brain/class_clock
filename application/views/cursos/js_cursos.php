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
  var getCoordenadorByCurso = function(idCurso) {

    var professor;
    var url = '<?= base_url('index.php/Professor/getCoordenador/')?>/'+idCurso;

    return $.getJSON(url);
  }
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
        getCoordenadorByCurso(recipientid).done(function (response) {
          var professor = response[0];
          modal.find('select[name=cursoCoordenador] option[value='+professor.id+']').prop('selected',true);
        });
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

		$('#cursoDisciplinas2 li').remove();
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
       	
		$('#periodo-view li').remove();
		$.getJSON(url,function (response) {
			$.each(response, function (index, value) {
				var row = '<li>'+recipientPeriodo+'</li>';
				$('#periodo-view').prepend(row);
			});
		});
		
		console.log();
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#cadastrarCurso').validate({
			rules: {
				nome: { required: true, minlength: 5, remote: '<?= base_url("index.php/Curso/verificaNome/") ?>' },
				sigla: { required: true, maxlength: 5, remote:  '<?= base_url("index.php/Curso/verificaSigla/") ?>' },
				qtdSemestres: { required: true, number: true, min: 1, max: 19 },
				'periodo[]': { required: true },
				grau: {required: true, min: 1},
				'disciplinas[]': { required: true },
				coordenadorCurso: { required: true, min: 1 }
			},
			messages: {
				nome: { required: 'Campo obrigatório', minlength: 'O campo nome deve ter no mínimo 5 caracteres', remote: 'Este nome já está em uso' },
				sigla: { required: 'Campo obrigatório', maxlength: 'O campo sigla deve ter no máximo 5 caracteres', remote: 'Esta sigla já está em uso' },
				qtdSemestres: { required: 'Campo obrigatório', number: 'Digite apenas números', min: 'Digite um valor maior ou igual a 1', max: 'Digite um valor menor ou igual a 19'},
				'periodo[]': { required: 'Campo obrigatório' },
				grau: {required: 'Campo obrigatório', min: 'Campo obrigatório' },
				'disciplinas[]': { required: 'Campo obrigatório' },
				coordenadorCurso: { required: 'Campo obrigatório', min: 'Campo obrigatório' }
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#alterarCurso').validate({
			rules: {
				nomeCurso: { required: true, minlength: 5 },
				cursoSigla: { required: true, maxlength: 5 },
				cursoQtdSemestres: { required: true, number: true, min: 1, max: 19 },
				'cursoPeriodos[]': { required: true },
				cursoGrau: {required: true, min: 1},
				'cursoDisciplinas[]': { required: true },
				cursoCoordenador: { required: true, min: 1 }
			},
			messages: {
				nomeCurso: { required: 'Campo obrigatório', minlength: 'O campo nome deve ter no mínimo 5 caracteres' },
				cursoSigla: { required: 'Campo obrigatório', maxlength: 'O campo sigla deve ter no máximo 5 caracteres' },
				cursoQtdSemestres: { required: 'Campo obrigatório', number: 'Digite apenas números', min: 'Digite um valor maior ou igual a 1', max: 'Digite um valor menor ou igual a 19'},
				'cursoPeriodos[]': { required: 'Campo obrigatório' },
				cursoGrau: { required: 'Campo obrigatório', min: 'Campo obrigatório' },
				'cursoDisciplinas[]': { required: 'Campo obrigatório' },
				cursoCoordenador: { required: 'Campo obrigatório', min: 'Campo obrigatório' }
			}
		});
	});
</script>

</body>
</html>
