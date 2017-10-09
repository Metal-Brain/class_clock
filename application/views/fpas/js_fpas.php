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
  $('#FpaTable').dataTable( {
    "language": {
      "url": "<?= base_url('assets/DataTables/translatePortuguese.js');?>"
    }
  } );
</script>

<script type="text/javascript">

    $('input[type=checkbox]').on('change', function () {
      // pega a quantidade de selecionados
      var qt = $('input:not([disabled])[type=checkbox]:checked').length;
      $('#contador').attr('data-value',qt);
      //coloca o resultado na div contador
      $('#contador').text(qt + (qt > 1 ? ' selecionados' : ' selecionado'));


      //método que valida o numero de checkbox que podem ser selecionados!
      if(qt >= 20 ){
        $('input[type=checkbox]:not(:checked)').prop('disabled', true);
      }else{
        $('input[type=checkbox]:not(:checked)').prop('disabled', false);
      }
    });
</script>
