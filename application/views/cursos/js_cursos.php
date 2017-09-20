<script type="text/javascript">
	$(document).ready(function () {
		
		$('#formCurso').validate({
				rules: {
					
					codigo_curso: { required: true, minlength: 1,maxlength: 5,min: 1},
					nome_curso: { required: true, minlength: 5,maxlength: 75},
					sigla_curso: { required: true,
                                  minlength: 3,
                                  maxlength: 3,
                                  remote: "<?= base_url('index.php/Curso/validar_sigla_curso/') ?>"
                                 },
					qtd_semestre: { required: true, number: true, min: 1, max: 20},
					modalidade_id: {required: true, min: 1}
				},
				messages: {
					codigo_curso: 
                        { required: 'Campo obrigatório',
                         minlength: 'O campo codigo deve ter no mínimo 1 caracter',
                         maxlength:'O campo codigo deve ter no maximo 5 caracteres',
                         min: 'Digite um valor maior ou igual a 1'
                        },
                    
					nome_curso: 
                        { required: 'Campo obrigatório',
                         minlength: 'O campo nome deve ter no mínimo 5 caracteres',
                         maxlength:'O campo nome deve ter no maximo 75 caracteres'
                        },
                    
					sigla_curso: 
                        { required: 'Campo obrigatório',
                         minlength: 'O campo sigla deve ter no mínimo 3 caracteres',  
                         maxlength: 'O campo sigla deve ter no máximo 3 caracteres'
                        },
                    
					qtd_semestre: 
                        { required: 'Campo obrigatório',
                         number: 'Digite apenas números', 
                         min: 'Digite um valor maior ou igual a 1',
                         max: 'Digite um valor menor ou igual a 19'
                        },
                    
					modalidade_id: 
                        {required: 'Campo obrigatório',
                         remote: 'A sigla deve ser única',
                        },
				}
			});
		
		
		
		
	});
	
</script>
<script type="text/javascript">
  $(document).ready(function () {
        $('#cursoTable').DataTable();
    });
</script>
<script>
function myFunction() {
    alert("Hello! I am an alert box!");
}
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
						  window.location.href = '<?= site_url("curso/") ?>' + funcao + '/' + id;
    		}
			});
		}

</script>


<script>
    function exclude(id) {
        bootbox.confirm({
            message: "Realmente deseja desativar esse curso?",
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
                    window.location.href = '<?= base_url('index.php/Curso/deletar/') ?>' + id
            }
        });
    }
    function able(id) {
        bootbox.confirm({
            message: "Realmente deseja ativar esse curso?",
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
                    window.location.href = '<?= base_url("index.php/Curso/ativar/") ?>' + id
            }
        });
    }
</script>



</body>
</html>
