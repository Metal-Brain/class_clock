<script>
    $("#professorDisciplinas").multiSelect({
        selectableHeader: "<div class='multiselect'>Selecione as disciplinas</div>",
        selectionHeader: "<div class='multiselect'>Disciplinas selecionadas</div>"
    });
    $("#disciplinas").multiSelect({
        selectableHeader: "<div class='multiselect'>Selecione as disciplinas</div>",
        selectionHeader: "<div class='multiselect'>Disciplinas selecionadas</div>"
    });</script>


<script type="text/javas cript">
    $('#exampleModal').on('show.bs.modal',    function (event)   {
    $("#professorDisciplinas").multiSelect('desel ect_all ') ;
    va  r     butt on         =     $(eve  nt .relatedTarget) // Button that triggered the mod al
    va   r  re c ipie nt       =       butt on.data('whatever') // Extract info from data-* attributes 
    <!-- Foi criado todos os var caso seja necessario adicionar ou mudar os que já existem-->
    var recipientnome = button.data('whatevernome')
    var recipientmatricula = button.data('whatevermatricula')
    var recipientnomeDisciplina = button.data('whatevernomeDisciplina')
    var recipientnascimento = button.data('whatevernascimento')
    var recipientnivelAcademico = button.data('whatevernivel')
    var recipientregimeContrato = button.data('whatevercontrato')
    var recipientcoordenador = button.data('whatevercoordenador')
    var recipientid = button.data('whateverid')
    var url = '<?= base_url('index.php/Professor/disciplinas/') ?>'+recipientid;
    $.getJSON(url,function (response) {
    var disciplinas = [];
    $.each(response, function (index, value) {
    disciplinas.push(value.id);
    });
    $("#professorDisciplinas").multiSelect('select',disciplinas);
    });

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Alterar Professores')
    <!-- Foi criado todos os modal caso seja necessario adicionar ou mudar os que já existem-->
    modal.find('#recipient-nome').val(recipientnome)
    modal.find('#recipient-matricula').val(recipientmatricula)
    modal.find('#recipient-nomeDisciplina').val(recipientnomeDisciplina)
    modal.find('#recipient-nascimento').val(recipientnascimento)
    modal.find('select[name=recipient-nivelAcademico] option[value='+recipientnivelAcademico+']').prop('selected',true)
    modal.find('select[name=recipient-contrato] option[value='+recipientregimeContrato+']').prop('selected',true)
    modal.find('#recipient-id').val(recipientid)
    modal.find('#recipient-coordenador').prop('checked',recipientcoordenador)
    })
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $("#professorTable").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>

<script type="text/javascript">
    function exclude(id) {
        bootbox.confirm({
            message: "Realmente deseja desativar esse Professor?",
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
                    window.location.href = '<?= base_url('index.php/Professor/desativar/') ?>' + id
            }
        });
    }
    function able(id) {
        bootbox.confirm({
            message: "Realmente deseja ativar esse Professor?",
            buttons: {
                confirm: {
                    label: 'Sim',
                    className: 'btn-success'
                },
                canc                el: {
                    label: 'Não',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result)
                    window.location.href = 'Professor/ativar/' + id
            }
        });
    }
</script>

<script type="text/java                script">
    $(document).ready(function () {                
    $("input[name=nascimento]").mask('00/00/0000', {placeholder: "__/__/____"});
    });
</script>

</body>
</html>
