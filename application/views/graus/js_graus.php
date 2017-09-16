
<script type="text/javascript">

 

          /* jQuery.validator.addMethod("isString", function(value, element) {
               var regExp = /^[1-9]*$/g;
               if(regExp.test(value)) return true;

               return false
           }, "Por favor insira somente caracteres numéricos acima de zero");
          */


    $("#formCadastrar").validate({
  rules: {
    nome_grau: {
      required: true,
      maxlength: 50
	  
    },
    codigo: {
      required: true, 
	  maxlength: 5,
    /*isString:true*/
    min: 1
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
<script type="text/javascript">
  $('#GrauTable').dataTable( {
    "language": {
      "url": "<?= base_url('assets/DataTables/translatePortuguese.js');?>"
    }
  } );
</script>

<script type="text/javascript">

  function confirmDelete(id, msg, funcao) {
      bootbox.confirm({
        message: msg,
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
          if (result == true)
              window.location.href = '<?= site_url("grau/") ?>' + funcao + '/' + id;
        }
      });
    }
</script>
