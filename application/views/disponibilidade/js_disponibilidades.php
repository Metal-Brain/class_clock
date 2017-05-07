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

			$.getJSON(url,function (data,status) {
				console.log(data);
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
