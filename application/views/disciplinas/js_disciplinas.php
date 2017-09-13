


<script>
    $(document).ready(function()
    {
      $("div.test select").val("<?php $data['disciplina']['curso_id']  ?>");
    });

    $("#formDisciplina").validate({
  rules: {
    nome_disciplina: {
      required: true

      },
    sigla_disciplina: {
      required: true,
      maxlength: 5,
      minlength:3

    },
    qtd_professor:{
       required:true,
       minlength:1,
       number:true
    },
    modulo:{
        required:true,
        minlength:1

    },
    carga_semanal:{
        required:true,
        minlength:1

    }
  },
    messages: {
      nome_disciplina: {
      required: 'Campo nome é obrigatório'
    },
   sigla_disciplina:{
      required:'Campo sigla é obrigatório',
      maxlength: 'Tamanho maximo do campo é 5',
      minlength:'Tamanho mínimo do campo é 3'
    },
    qtd_professor:{
        required:'Campo quntidade de professores é obrigatório',
        minlength:'Tamanho mínimo do campo é 3'
    },
    modulo:{
        required:'Campo modulo é obrigatório'
    },
    carga_semanal:{
        required:'Campo Qtd. aulas por semana é obrigatório'
    }

  }
});

</script>
