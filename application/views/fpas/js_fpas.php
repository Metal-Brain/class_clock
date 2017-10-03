<script type="text/javascript">
    $(document).ready(function (){

      $('#showDisponibilidade').click(function () {
        $('#disponibilidade').fadeIn('slow');
      });
    });
</script>

<script type="text/javascript">
  $('#FpaTable').dataTable( {
    "language": {
      "url": "<?= base_url('assets/DataTables/translatePortuguese.js');?>"
    }
  } );
</script>
<!-- TODO Fazer as modificações>
