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
	});
</script>

</body>
</html>
