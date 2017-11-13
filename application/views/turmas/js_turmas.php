<script type="text/javascript">
  $('#TurmaTable').dataTable();

  function confirmDelete(id, msg, funcao) {
				bootbox.confirm({
					message: msg,
					buttons: {
						confirm: {
							label: 'Sim',
							className: 'btn-success'
						},
						cancel: {
							label: 'Não',
							className: 'btn-danger'
						}
					},
					callback: function (result) {
					if (result == true)
						window.location.href = '<?= site_url("turma/") ?>' + funcao + '/' + id;
					}
				});
			}
</script>

</body>
</html>
