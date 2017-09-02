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
				content += '<div class="col-xs-12 col-sm-12 col-md-2 form-group"><input name="horario['+ horarioIndex +']" class="form-control hora inicio" type="text" placeholder="Fim" minlength="5" maxlength="5" required></div><button id="btnRemove" class="btn btn-danger glyphicon glyphicon-remove"></button></div>';
				$('.aux').last().after(content);
				aula++;
				horarioIndex++;
				mask();
			});
			//função para remover o horário
			$('.aux').on('click','#btnRemove',function(){
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
