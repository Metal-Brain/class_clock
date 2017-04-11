

				<div id="content" class="col-md-10">
					<?php if ($this->session->flashdata('success')) : ?>
            <!-- Alert de sucesso -->
            <div class="text-center alert alert-success" role="alert">
              <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
              <span class="sr-only">Succes:</span>
              <?= $this->session->flashdata('success') ?>
            </div>
          <?php elseif ($this->session->flashdata('danger')) : ?>
            <!-- Alert de erro -->
            <div class="text-center alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              <?= $this->session->flashdata('danger') ?>
            </div>
					<?php endif; ?>

					<?php if (validation_errors()): ?>
						<div class="alert alert-danger text-center">
							<p><?= $this->session->flashdata('formDanger') ?></p>
							<?= validation_errors() ?>
						</div>
					<?php endif; ?>

					<h1>Disciplinas</h1>

					<!-- Lista de 'botoes' links do Bootstrap -->
					<ul class="nav nav-pills">
						<!-- 'botao' link para a listagem -->
						<li class="active"><a data-toggle="pill" href="#list">Listar todas</a></li>
						<!-- 'botao' link para novo registro -->
						<li><a data-toggle="pill" href="#new">Cadastrar</a></li>
					</ul>

					<!-- Dentro dessa div vai o conteúdo que os botões acima exibem ou omitem -->
					<div class="tab-content">

						<!-- Aqui é a Listagem dos Itens -->
						<div id="list" class="tab-pane fade in active">
							<div style="margin-top: 25px;">
								<table id="disciplinaTable" class="table table-striped">
								<thead>
									<tr>
										<th>Sigla</th>
										<th>Nome</th>
										<th>Qtd. Professores</th>
										<th>Status</th>
										<th>Ação</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($disciplinas as $disciplina): ?>
											<?= ($disciplina['status'] ? '<tr>' : '<tr class="danger">') ?>
												<td><?= $disciplina['sigla']?></td>
												<td><?= $disciplina['nome']?></td>
												<td><?= $disciplina['qtdProf']?></td>
												<td><?php if($disciplina['status']): echo "Ativo"; else: echo "Inativo"; endif;?></td>
												<td>
													<?php if ($disciplina['status']): ?>
														<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whateversigla="<?= $disciplina['sigla']?>" data-whatevernome="<?= $disciplina['nome']?>" data-whateverid="<?= $disciplina['id']?>" data-whateverqtdprof="<?= $disciplina['qtdProf']?>"><span class="glyphicon glyphicon-pencil"></span></button>
														<button onClick="disable(<?= $disciplina['id']?>)" type="button" class="btn btn-danger delete" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
													<?php else : ?>
														<button onClick="able(<?= $disciplina['id']?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
													<?php endif; ?>

												</td>
											</tr>
									<?php endforeach;?>
								</tbody>
							</table>
							</div>
						</div>

						<!-- Aqui é o formulário de registro do novo item-->
						<div id="new" class="tab-pane fade">
							<h3>Cadastrar Disciplina</h3>
							<form action="" method="post">
								<div class="form-group percent-40">
									<label>Nome</label>
									<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?= set_value('nome')?>">
									<?= form_error('nome') ?>
								</div>
								<div class="form-group">
									<label>Sigla</label>
									<input type="text" class="form-control percent-40" name="sigla" placeholder="ex: LOPA1" value="<?= set_value('sigla')?>">
									<?= form_error('sigla') ?>
								</div>
								<div class="form-group">
									<label>Quantidade de professores</label>
									<input type="text" maxlength="1" pattern="[0-9]+$" class="form-control percent-5" name="qtdProf" placeholder="ex: 1" value="<?= set_value('qtdProf')?>">
									<?= form_error('qtdProf') ?>
								</div>
								<div class="inline">
									<button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
								</div>
							</form>
						</div>

					</div><!--fecha tab-content-->

				</div><!--Fecha content-->

			</div><!--Fecha row-->

			<!-- Aqui é o Modal de alteração das disciplinas-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Disciplinas</h4>
						</div>
						<div class="modal-body">
							<?= form_open('Disciplina/atualizar') ?>
								<div class="form-group">
									<input type="hidden" name="recipient-id" id="recipient-id">
								</div>
								<div class="form-group">
									<label for="sigla-name" class="control-label">Sigla:</label>
									<input type="text" class="form-control" name="recipient-sigla" id="recipient-sigla">
									<?= form_error('recipient-sigla') ?>
								</div>
								<div class="form-group">
									<label for="nome-name" class="control-label">Nome:</label>
									<input type="text" class="form-control" name="recipient-nome" id="recipient-nome">
									<?= form_error('recipient-nome') ?>
								</div>
								<div class="form-group">
									<label for="qtd-prof" class="control-label">Quantidade de professores:</label>
									<input type="text" maxlength="1" pattern="[0-9]+$"  class="form-control percent-10" name="recipient-qtd-prof" id="recipient-qtd-prof">
									<?= form_error('recipient-qtd-prof') ?>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Alterar</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div id="footer" class="col">
				<p>Desenvolvido por Metal Code</p>
			</div>

		</div><!--Fecha container-fluid-->
		<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootbox.min.js') ?>"></script>
		<script type="text/javascript">
				$('#exampleModal').on('show.bs.modal', function (event) {
						var button = $(event.relatedTarget) // Button that triggered the modal
						var recipient = button.data('whatever') // Extract info from data-* attributes
						var recipientsigla = button.data('whateversigla')
						var recipientnome = button.data('whatevernome')
						var recipientQtdProf = button.data('whateverqtdprof')
						var recipientId = button.data('whateverid')
						// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						var modal = $(this)
						modal.find('.modal-title').text('Alterar Disciplina')
						modal.find('#recipient-sigla').val(recipientsigla)
						modal.find('#recipient-nome').val(recipientnome)
						modal.find('#recipient-qtd-prof').val(recipientQtdProf)
						modal.find('#recipient-id').val(recipientId)
				})
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#disciplinaTable").DataTable({
					"language":{
						"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
					}
				});
			});
		</script>
		<script>
			function disable(id){
				bootbox.confirm({
					message: "Realmente deseja desativar essa disciplina?",
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
						if(result)
							window.location.href = '<?= base_url("index.php/Disciplina/desativar/")?>'+id
					}
				});
			}

			function able(id){
				bootbox.confirm({
					message: "Realmente deseja ativar essa disciplina?",
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
						if(result)
							window.location.href = '<?= base_url("index.php/Disciplina/ativar/")?>'+id
					}
				});
			}
		</script>
	</body>
</html>
