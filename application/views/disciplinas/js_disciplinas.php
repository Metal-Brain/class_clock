<script>
    $(document).ready(function(){

      	$("#disciplinaTable").DataTable();
        jQuery.validator.addMethod("alphanumeric", function(value, element) {
          return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
        });

                // document.getElementById("sigla_curso").onkeypress = function(e) {
                //   if ((this.value.length==5) && !(key == 8)){
                //     return false;
                //   }
                //   document.getElementById("sigla_curso").onkeypress = function(e) {
                //    var chr = /^[a-zA-Z0-9 ]$/;
                //    var patt = new RegExp(chr);
                //    var res = patt.test(String.fromCharCode(e.which));
                //    return res;
                //  }

     /*  $("#formDisciplina").validate({
            rules: {
                nome_disciplina: {
                    required: true,
                    minlength:5,
                    maxlength:50
                },
                sigla_disciplina: {
                    required: true,
                    maxlength:5,
                    minlength:3,
                    alphanumeric: true
                },
                curso_id:{
                  required:true,
                },
                tipo_sala_id:{
                  required:true,
                },
                qtd_professor:{
                    required:true,
                    min:1,
                    max:9,
                    number:true
                },
                modulo:{
                    required:true,
                    min:1,
                    max:99
                },
                qtd_aulas:{
                    required:true,
                    min:1,
                    max:99
                }
            },
                messages: {
                nome_disciplina: {
                    required:'Campo nome é obrigatório',
                    minlength:'O nome deve conter pelo menos 5 caracteres',
                    maxlength:'O nome deve ter no máximo 50 caracteres'
                },
                curso_id:{
                    required:'Campo Curso é obrigatório',
                },
                tipo_sala_id:{
                  required:'Campo Tipo de Sala é obrigatório',
                },
                sigla_disciplina:{
                    required:'Campo sigla é obrigatório',
                    maxlength: 'Tamanho maximo do campo é 5 caracteres',
                    minlength:'Tamanho mínimo do campo é 3 caracteres',
                    alphanumeric:'Não insira caracteres especiais.'
                },
                qtd_professor:{
                    required:'Campo quantidade de professores é obrigatório',
                    min:'Tamanho mínimo do campo é 1',
                    max:'Tamanho maximo do campo é 1 caracter ou ate numero 9'
                },
                modulo:{
                    required:'Campo modulo é obrigatório',
                    min:'Tamanho mínimo do campo é 1',
                    max:'Tamanho maximo do campo é 2 caracteres ou até numero 99'
                },
                qtd_aulas:{
                    required:'Campo Qtd. Aulas por semana é obrigatório',
                    min:'Tamanho mínimo do campo é 1',
                    max:'Tamanho maximo do campo é 2 caracteres ou até numero 99'
                }
            }
       });*/ 
    });

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
						  window.location.href = '<?= site_url("disciplina/") ?>' + funcao + '/' + id;
    		}
			});
		}
</script>


<script>
    function exclude(id) {
        bootbox.confirm({
            message: "Realmente deseja desativar essa Disciplina?",
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
                if (result)
                    window.location.href = '<?= base_url('index.php/Disciplina/deletar/') ?>' + id
            }
        });
    }
    function able(id) {
        bootbox.confirm({
            message: "Realmente deseja ativar essa Disciplina?",
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
                if (result)
                    window.location.href = '<?= base_url("index.php/Disciplina/ativar/") ?>' + id
            }
        });
    }
</script>
<script type="text/javascript">
    $("#manipulaViewCadastroViaCSV").change(function() {
                if(!this.checked){
                    $('.csv').hide();
                    $('.formDisciplina').show();
                } else {
                    $('.csv').show();
                      $('.formDisciplina').hide();
                }
            });
</script>
<script type="text/javascript">
    $("#csvCampo").change(function() {
                if(!this.checked){
                    $('.campoImportar').show();
                } else {
                    $('.campoImportar').hide();                   
                }
            });

</script>

</html>
</body>
