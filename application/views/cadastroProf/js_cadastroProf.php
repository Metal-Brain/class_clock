<script>

var recipientid = $('#identificador').val();
console.log(recipientid);
var url = '<?= base_url('index.php/Professor/disciplinas/') ?>'+recipientid;


			$.getJSON(url,function (response) {
				var disciplinas = [];
				$.each(response, function (index, value) {
					var row = '<li>'+value.nome'</li>';
					console.log(value);
					$('#lecionarList').prepend(row);
				});
			});

</script>

	</body>
</html>
