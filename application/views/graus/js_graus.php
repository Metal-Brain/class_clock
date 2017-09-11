
<script>

 

           jQuery.validator.addMethod("isString", function(value, element) {
               var regExp = /^[1-9]*$/g;
               if(regExp.test(value)) return true;

               return false
           }, "Por favor insira somente caracteres numéricos acima de zero");


    $("#formGrau").validate({
  rules: {
    nome_grau: {
      required: true,
      maxlength: 50
	  
    },
    codigo: {
      required: true, 
	  maxlength: 5,
    isString:true
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

<script type="text/javascript">

 

           jQuery.validator.addMethod("isString", function(value, element) {
               var regExp = /^[1-9]*$/g;
               if(regExp.test(value)) return true;

               return false
           }, "Por favor insira somente caracteres numéricos acima de zero");


    $("#formEditar").validate({
  rules: {
    nome_grau: {
      required: true,
      maxlength: 50
    
    },
    codigo: {
      required: true, 
    maxlength: 5,
    isString:true
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
