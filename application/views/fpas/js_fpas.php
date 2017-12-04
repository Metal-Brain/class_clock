<script type="text/javascript">
    $(document).ready(function (){
    //metodo para a tabela de disponibilidade
      $('#showDisponibilidade').click(function () {
        $('#disponibilidade').fadeIn('slow');
        $('#indisponibilidade').hide('slow');
      });
      //metodo para a tabela de indisponibilidade
      $('#showIndisponibilidade').click(function(){
        $('#indisponibilidade').fadeIn('slow');
        $('#disponibilidade').hide('slow');
      })
    });
</script>

<script type="text/javascript">
  $('#fpaTable').dataTable( {
    "language": {
      "url": "<?= base_url('assets/DataTables/translatePortuguese.js');?>"
    }
  } );
</script>

<script type="text/javascript">
      var qt;

      function verificaHorarios() {
        // pega a quantidade de selecionados
        qt = $('input:not([disabled])[type=checkbox]:checked').length;
        $('#contador').attr('data-value',qt);
        //coloca o resultado na div contador
        $('#contador').text((qt > 1 ? ' selecionados' : ' selecionado'));
        $("input[name=totalAula]").val(qt);
      }

      $(document).ready(function () {
        verificaHorarios();
      });

      $('input[type=checkbox]').on('change', function () {
        verificaHorarios();
      });
</script>

<script type="text/javascript">

    jQuery.validator.addMethod("minAula",function (value, element, param) {
      return (value >= param) ? true : false;
    },'Selecione no minimo {0} horarios');


    $(document).ready(function () {
      $('#formDisp').validate({
        errorLabelContainer:'#msgErrors',
        rules: { // regime 0 = 20h regime 1 = 40h
          totalAula: {required: true, minAula: <?= @$_SESSION["usuario_logado"]["regime"] ? 21 : 14 ?>}
        }
      });
    });


</script>

<script type="text/javascript">
    $(document).ready(function () {
      var tmp = ($(".disc").length)+1;
      $('#btnAdd').click(function (){
        var content = `
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
            <label class="disc">Disciplina `+tmp+`</label>
              <select class="form-control" id="selectDisc" required name="disc[`+tmp+`]">
                <!-- Trazer do back as disciplinas cadastradas -->
                <option  value=" " disabled selected hidden>Selecione</option>
                <?php foreach ($turmas as $turma) :?>
                  <option value="<?= $turma->disciplina->id?>"><?= $turma->disciplina->nome_disciplina . ' - ' . $turma->turno->nome_turno?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div col-md-2>
              <button id="btnRemove" type="button" style="margin: 23px 0 0 0;" class="btn btn-danger add-field"><span class="glyphicon glyphicon-remove"></span></button>
          </div>
        </div>`;
        tmp++;
        $('#disciplinas').append(content);
      });
      $('#disciplinas').on('click','#btnRemove',function(){
				var row = $(this).parent().parent();
				row.remove();
				// index disciplina
				var listDisc = $("label.disc");
				for (disciplina = 0; disciplina < listDisc.length; disciplina ++) {
					listDisc[disciplina].innerHTML = '<strong>Disciplina ' + (disciplina + 1)+'</strong>';
				}
        tmp--;
			});
    });
</script>
