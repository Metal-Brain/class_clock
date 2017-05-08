<script>
	$(document).ready(function(){

		$("#inicio").change(function(){
			var hora = parseInt($(this).val());
			hora++;
			$('input#fim').val(hora+':00');
		});

		$('select[name=periodo]').change(function () {
			var periodo = parseInt($(this).val());
			switch (periodo) {
				case 1:
					$('#inicio').prop('disabled',false);
					$('#inicio option').prop('disabled',false);
					var select = $('#inicio option');

					for (var i = 1; i < select.length; i++) {
						if (select[i].value > 12)
							select[i].disabled = true;
					}
					break;
				case 2:
					$('#inicio').prop('disabled',false);
					$('#inicio option').prop('disabled',false);
					var select = $('#inicio option');

					for (var i = 1; i < select.length; i++) {
						if (select[i].value <= 12 || select[i].value > 18)
							select[i].disabled = true;
					}
					break;
				case 3:
					$('#inicio').prop('disabled',false);
					$('#inicio option').prop('disabled',false);
					var select = $('#inicio option');

					for (var i = 1; i < select.length; i++) {
						if (select[i].value <= 18)
							select[i].disabled = true;
					}
					break;
				default:
					$('#inicio').prop('disabled',true);
					break;
			}
		});

		$('select[name=dia]').change(function () {
			var day = $(this).val();
			var url = '<?= base_url('index.php/Professor/verificaDisponibilidade/') ?>'+day;

			$.getJSON(url,function (data) {
				if (data.result == false) {
					var msg = '<div id="disponibilidade-msg" class="alert alert-danger">'+
					'<p class="text-center">Não há disponibilidade para o dia selecionado.</p>'
					'</div>';
					$('#main-content').prepend(msg);

					setTimeout(function () {
						$('#disponibilidade-msg').hide('slow');
					},2.5 * 1000);

					$('select[name=dia]').val(0);
				}
			}).fail(function () {
				var msg = '<div class="alert alert-danger">'+
				'<p class="text-center">Não foi possivel verificar a disponibilidade do dia selecionado. Atualize a página e tente novamente.</p>'+
				'</div>';
				$('#main-content').prepend(msg);
			});
		});

	});
</script>

</body>
</html>
