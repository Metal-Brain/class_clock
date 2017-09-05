
	<script type="text/javascript">
		$(document).ready(function () {
			var horarios = <?= json_encode($turno->horarios)?>;
			var aula = 1;
			var index = 0;
			horarios.forEach(function (horario) {
				var content = `
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-1 form-group">
						<p class="aula"><strong>Aula `+ aula +`</strong></p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 form-group">
						<label >Horário de entrada:</label>
						<input name="horario[`+index+`]" class="form-control hora" type="text" value="`+horario.inicio.substring(0,5)+`">
					</div>`;

					index++;

					content += `
					<div class="col-xs-12 col-sm-12 col-md-2 form-group">
						<label >Horário de saída:</label>
						<input name="horario[`+index+`]" class="form-control hora" type="text" value="`+horario.fim.substring(0,5)+`">
					</div>
					<div col-md-2 style="padding: 25px 0 0 0;">
						<button id="btnRemove" type="button" class="btn btn-danger add-field"><span class="glyphicon glyphicon-remove"></span></button>
					</div>
				</div>`;
				index++;
				aula++;
				$("#horarios").append(content);
			});

			$('#horarios').on('click','#btnRemove',function(){
				var row = $(this).parent().parent();
				row.remove();
				// index vetor
				novos = $("input.hora");
				for (var index = 0; index < novos.length; index++) {
					novos[index].name = 'horario['+index+']';
				}

				// index aula
				var listAula = $("p.aula");
				for (var aula = 0; aula < listAula.length; aula ++) {
					listAula[aula].innerHTML = '<strong> Aula ' + (aula + 1)+'</strong>';
				}
			});

			// função para adicionar um novo campo de horario
			$('#btnAdd',$('#horarios')).click(function () {
				var content = `
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-1 form-group">
						<p class="aula"><strong>Aula `+ aula +`</strong></p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 form-group">
						<label >Horário de entrada:</label>
						<input name="horario[`+index+`]" class="form-control hora" type="text" value="">
					</div>`;

					index++;

					content += `
					<div class="col-xs-12 col-sm-12 col-md-2 form-group">
						<label >Horário de saída:</label>
						<input name="horario[`+index+`]" class="form-control hora" type="text" value="">
					</div>
					<div col-md-2 style="padding: 25px 0 0 0;">
						<button id="btnRemove" type="button" class="btn btn-danger add-field"><span class="glyphicon glyphicon-remove"></span></button>
					</div>
				</div>`;
				index++;
				aula++;
				$("#horarios").append(content);
			});

		});
	</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#TurnoTable').DataTable();
	} );
	var horarioIndex = 2;
	var aula = 2;

	//função para adicionar horário
	$('#btnAdd').click(function(){
		var content = '<div class="row aux"><div class="col-xs-12 col-sm-12 col-md-1"><label style="padding: 8px 0 0 0;">Aula '+ aula +'</label></div><div class="col-xs-12 col-sm-12 col-md-2 form-group"><input name="horario['+ horarioIndex +']" class="form-control hora" type="text" placeholder="Início" minlength="5" maxlength="5" required></div>';
		horarioIndex++
		content += '<div class="col-xs-12 col-sm-12 col-md-2 form-group"><input name="horario['+ horarioIndex +']" class="form-control hora inicio" type="text" placeholder="Fim" minlength="5" maxlength="5" required></div></div>';
		$('.aux').last().after(content);
		aula++;
		horarioIndex++;
		mask();
	});


	//função para remover o horário
	$('#btnRemove').click(function(){
			if(aula > 2){
			$('.aux:last').remove();
			aula--;
		}
	});

	$('.salvar').click(function(){
		$('.aux').val();
	});

	function mask() {
		$('.hora').mask('00:00');
	}
	mask();
</script>
<script type="text/javascript">
	$.validator.addClassRules({
		hora: {
			required: true,
			maxlength: 5,
			minlength: 5
		}
	});

	$("#formTurnos").validate({
		errorClass: 'text-danger',
		errorElement: 'span',
		rules: {
			nome_turno: {
				required: true,
				maxlength: 25
			}
		}
	});
</script>
</body>
</html>
