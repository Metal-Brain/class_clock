
<script>
    $("#formGrau").validate({
  rules: {
    nome: {
      required: true,
      maxlength: 255
    },
    codigo: {
      required: true,  
    }
  },
    messages: {
      nome: {
      required: 'Campo nome é obrigatório'
    },
   codigo:{
      required:'Campo codigo é obrigatório'    
    }
     
  }
});
	
</script>
