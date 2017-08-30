
<script>
    $("#formGrau").validate({
  rules: {
    nome_grau: {
      required: true,
      maxlength: 50
	  
    },
    codigo: {
      required: true, 
	  maxlength: 5
    }
  },
    messages: {
      nome_grau: {
      required: 'Campo nome é obrigatório',
	  maxlength: 'Tamanho maximo do campo é 50'
    },
   codigo:{
      required:'Campo codigo é obrigatório',
	  maxlength: 'Tamanho maximo do campo é 5'	  
    }
     
  }
});
	
</script>
