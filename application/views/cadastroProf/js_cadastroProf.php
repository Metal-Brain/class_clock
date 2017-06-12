<script>

var recipientid = $('#identificador').val();
console.log(recipientid);
var url = '<?= base_url('index.php/Professor/disciplinas/') ?>'+recipientid;

			
			$.getJSON(url,function (response) {
				var disciplinas = [];
				$.each(response, function (index, value) {
					var row = '<tr><td>'+value.nome+'</td></tr>';
					console.log(row);
					$('#lecionarTable').prepend(row);
				});
			});

</script>

	</body>
</html>