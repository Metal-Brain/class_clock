<script>
 			var url = '<?= base_url('index.php/Professor/getCoordenadorDe/'.$this->session->id)?>';
 			$.getJSON(url,function (response) {
 				var professores = [];
 				$.each(response, function (index, value) {
 					professores.push(value.idCoordenador);
 				});

 				$("#professores").multiSelect('select',professores);
 			});

 			$("#professores").multiSelect({
 				selectableHeader: "<div class='multiselect'>Selecione o professor</div>",
 				selectionHeader: "<div class='multiselect'>Professores selecionados</div>"
 			});
 		</script>
 	</body>
 </html>
