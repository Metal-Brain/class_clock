		<script>
			var url = '<?= base_url('index.php/Professor/getPreferencia/'.$this->session->id)?>';
			$.getJSON(url,function (response) {
				var disciplinas = [];
				$.each(response, function (index, value) {
					disciplinas.push(value.idDisciplina);
				});
				console.log(disciplinas);
				$("#disciplinas").multiSelect('select',disciplinas);
			});

			$("#disciplinas").multiSelect({
				selectableHeader: "<div class='multiselect'>Selecione as disciplinas</div>",
				selectionHeader: "<div class='multiselect'>Disciplinas selecionadas</div>"
			});
		</script>
	</body>
</html>