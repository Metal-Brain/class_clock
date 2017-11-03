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

    $('input[type=checkbox]').on('change', function () {
      // pega a quantidade de selecionados
      qt = $('input:not([disabled])[type=checkbox]:checked').length;
      $('#contador').attr('data-value',qt);
      //coloca o resultado na div contador
      $('#contador').text((qt > 1 ? ' selecionados' : ' selecionado'));


      //método que valida o numero de checkbox que podem ser selecionados!
      if(qt >= <?= $_SESSION["usuario_logado"]["regime"] ? 20 : 40 ?> ){
        $('input[type=checkbox]:not(:checked)').prop('disabled', true);
      }else{
        $('input[type=checkbox]:not(:checked)').prop('disabled', false);
      }

      $("input[name=totalAula]").val(qt);
    });

</script>

<script type="text/javascript">

    jQuery.validator.addMethod("minAula",function (value, element, param) {
      return (value > param) ? true : false;
    },'Selecione no minimo {0} horarios');


    $(document).ready(function () {
      $('#formDisp').validate({
        errorLabelContainer:'#msgErrors',
        rules: { // regime 0 = 20h regime 1 = 40h
          totalAula: {required: true, minAula: <?= $_SESSION["usuario_logado"]["regime"] ? 14 : 21 ?>}
        }
      });
    });


</script>
