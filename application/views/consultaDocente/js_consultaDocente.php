<script type="text/javascript">
  $(document).ready(function(){
    $("#preferencia_table").DataTable();

    if($(".checkdocente-toggle:checked").length > 0){
      $('.conteudo-docente').show();
    }
  });

  $(".checkdocente-toggle").change(function() {
    if(this.checked){
      $('.conteudo-docente').show();
    } else {
      $('.conteudo-docente').hide();
    }
  });
</script>


</html>
</body>
