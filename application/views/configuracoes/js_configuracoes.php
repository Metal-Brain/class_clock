
	<script type="text/javascript">
		$(document).ready(function () {

			$("#disciplinas").multiSelect();

			var recipientid = <?= $this->session->id?>;
			var url = '<?= base_url('index.php/Professor/disciplinas/') ?>' + recipientid;

			$.getJSON(url,function (response) {
				var disciplinas = [];
				$.each(response, function (index, value) {
					disciplinas.push(value.id);
				});
				$("#disciplinas").multiSelect('select',disciplinas);
			});

		});
	</script>

	</body>
</html>
