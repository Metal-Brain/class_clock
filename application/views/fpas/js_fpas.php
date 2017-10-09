<script type="text/javascript">
    $(document).ready(function (){

      $('#showDisponibilidade').click(function () {
        $('#disponibilidade').fadeIn('slow');
        $('#indisponibilidade').hide('slow');
      });
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
    });
</script>
