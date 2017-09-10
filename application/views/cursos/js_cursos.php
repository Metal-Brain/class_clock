<script type="text/javascript">
	$(document).ready(function(){
		$('#formCurso').validate({
			rules: {
				codigo_curso: { required: true, minlength: 1,maxlength: 5},
				nome_curso: { required: true, minlength: 5,maxlength: 75},
				sigla_curso: { required: true, minlength: 3,maxlength: 3},
				qtd_semestre: { required: true, number: true, min: 1, max: 19 },
				grau_id: {required: true, min: 1}}
			},
			messages: {
				codigo_curso: { required: 'Campo obrigatório', minlength: 'O campo nome deve ter no mínimo 1 caracteres', maxlength:'O campo nome deve ter no maximo 5 caracteres'},
				nome_curso: { required: 'Campo obrigatório', minlength: 'O campo nome deve ter no mínimo 5 caracteres', maxlength:'O campo nome deve ter no maximo 75 caracteres'},
				sigla_curso: { required: 'Campo obrigatório',minlength: 'O campo nome deve ter no mínimo 3 caracteres',  maxlength: 'O campo sigla deve ter no máximo 3 caracteres'},
				qtd_semestre: { required: 'Campo obrigatório', number: 'Digite apenas números', min: 'Digite um valor maior ou igual a 1', max: 'Digite um valor menor ou igual a 19'},
				grau_id: {required: 'Campo obrigatório', min: 'Campo obrigatório' }
			}
		});
	});
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#cursoTable").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
            }
        });
    });
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#cadastrarCurso').validate({
			rules: {
				nome: { required: true, minlength: 5, remote: '<?= base_url("index.php/Curso/verificaNome/") ?>' },
				sigla: { required: true, maxlength: 5, remote:  '<?= base_url("index.php/Curso/verificaSigla/") ?>' },
				qtdSemestres: { required: true, number: true, min: 1, max: 19 },
				'periodo[]': { required: true },
				grau: {required: true, min: 1},
				'disciplinas[]': { required: true },
				coordenadorCurso: { required: true, min: 1 }
			},
			messages: {
				nome: { required: 'Campo obrigatório', minlength: 'O campo nome deve ter no mínimo 5 caracteres', remote: 'Este nome já está em uso' },
				sigla: { required: 'Campo obrigatório', maxlength: 'O campo sigla deve ter no máximo 5 caracteres', remote: 'Esta sigla já está em uso' },
				qtdSemestres: { required: 'Campo obrigatório', number: 'Digite apenas números', min: 'Digite um valor maior ou igual a 1', max: 'Digite um valor menor ou igual a 19'},
				'periodo[]': { required: 'Campo obrigatório' },
				grau: {required: 'Campo obrigatório', min: 'Campo obrigatório' },
				'disciplinas[]': { required: 'Campo obrigatório' },
				coordenadorCurso: { required: 'Campo obrigatório', min: 'Campo obrigatório' }
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#alterarCurso').validate({
			rules: {
				nomeCurso: { required: true, minlength: 5 },
				cursoSigla: { required: true, maxlength: 5 },
				cursoQtdSemestres: { required: true, number: true, min: 1, max: 19 },
				'cursoPeriodos[]': { required: true },
				cursoGrau: {required: true, min: 1},
				'cursoDisciplinas[]': { required: true },
				cursoCoordenador: { required: true, min: 1 }
			},
			messages: {
				nomeCurso: { required: 'Campo obrigatório', minlength: 'O campo nome deve ter no mínimo 5 caracteres' },
				cursoSigla: { required: 'Campo obrigatório', maxlength: 'O campo sigla deve ter no máximo 5 caracteres' },
				cursoQtdSemestres: { required: 'Campo obrigatório', number: 'Digite apenas números', min: 'Digite um valor maior ou igual a 1', max: 'Digite um valor menor ou igual a 19'},
				'cursoPeriodos[]': { required: 'Campo obrigatório' },
				cursoGrau: { required: 'Campo obrigatório', min: 'Campo obrigatório' },
				'cursoDisciplinas[]': { required: 'Campo obrigatório' },
				cursoCoordenador: { required: 'Campo obrigatório', min: 'Campo obrigatório' }
			}
		});
	});
</script>

</body>
</html>
