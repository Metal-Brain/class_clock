<script type="text/javascript">

        jQuery.validator.addMethod("semNumero", function(value, element) {
              var regExp = /^\d+$/g;
              if(regExp.test(value)) return false;
                      return true
        }, "Nome Inválido");



        $("#formCadastrar").validate({
              rules: {
                     nome_modalidade: {
                     required: true,
                     maxlength: 50,
                     semNumero:true

                  },
              codigo: {
                     required: true,
          	         maxlength: 5,
                     min: 1
              }
            },
              messages: {   
                    nome_modalidade: {
                       required: 'Campo nome é obrigatório',
          	           maxlength: 'Tamanho maximo do campo é 50'
                  },
                    codigo:{
                       required:'Campo codigo é obrigatório',
	                     maxlength: 'Tamanho maximo do campo é 5',
                       min: 'Por favor insira somente numéros acima de zero'
                  }

              }
});



</script>

<script type="text/javascript">

          jQuery.validator.addMethod("validaNome", function(value, element) {
               var regExp = /^\D+$/g;
               if(regExp.test(value)) return true;

               return false
           }, 'Nome inválido');

           jQuery.validator.addMethod("validaCodigo", function(value, element) {
               var regExp = /^\d+$/g;
               if(regExp.test(value)) return true;

               return false
           }, 'Por favor insira somente caracteres numéricos acima de zero');


    $("#formEditar").validate({
      rules: {
      nome_modalidade: {
      required: true,
      maxlength: 50,
      validaNome:true

    },
    codigo: {
      required: true,
    maxlength: 5,
    validaCodigo:true,
    min:1
    }
  },
    messages: {
      nome_modalidade: {
      required: 'Campo nome é obrigatório',
    maxlength: 'Tamanho maximo do campo é 50'
    },
   codigo:{
      required:'Campo codigo é obrigatório',
    maxlength: 'Tamanho maximo do campo é 5',
    min:"Por favor insira somente caracteres numéricos acima de zero"
    }

  }
    });




</script>
<script type="text/javascript">
  $('#ModalidadeTable').dataTable( {
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
              window.location.href = '<?= site_url("modalidade/") ?>' + funcao + '/' + id;
        }
      });
    }
</script>
