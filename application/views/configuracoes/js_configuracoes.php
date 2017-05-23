
	<script type="text/javascript">
		$(document).ready(function () {

			var recipientid = <?= $this->session->id?>;
			var url = '<?= base_url('index.php/Professor/disciplinas/') ?>' + recipientid;
			console.log(url);
			console.log(recipientid);
			$.getJSON(url,function (response) {
				var disciplinas = [];
				$.each(response, function (index, value) {
					disciplinas.push(value.id);
				});
				console.log(disciplinas);
				$("#professorDisciplinas").multiSelect('select',disciplinas);
			});

		});
	</script>

	</body>
</html>
