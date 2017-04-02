<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro das Salas</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/datatables.min.css') ?>">
	</head>
    <body>
		<div class="container-fluid">
			<div class="row">
				<div id="header" class="col">
					<div id="classclock">
						<h1>Class Clock</h1>
					</div>
					<div id="ifsp">
						<img src="<?= base_url('assets/img/ifsp.png')?>" class="logo">
					</div>
				</div>
			</div><!--Fecha row-->

			<div class="row">

				<div id="sidebar" class="col-md-2" role="navigation">
					<h2>Menu</h2>
					<ul class="nav nav-pills nav-stacked">
						<li><?= anchor('Curso','Cursos') ?></li>
						<li><?= anchor('Disciplina','Disciplinas') ?></li>
						<li><a href="professores.html">Professores</a></li>
						<li class="active"><?= anchor('Sala','Sala') ?></li>
						<hr>
						<li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
					</ul>
				</div>

				<div id="content" class="col-md-10">
					<h1>Salas</h1>
					<?php if ($this->session->flashdata('success')) : ?>
					      <!-- Alert de sucesso -->
            <div class="text-center alert alert-success" role="alert">
              <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
              <span class="sr-only">Succes:</span>
              <?= $this->session->flashdata('success') ?>
            </div>
					<?php endif; ?>
					
					
					<?php if(validation_errors()): ?>
						<div class="alert alert-danger">
							<strong>Atenção!</strong> Erros encontrados, verifique o formulário para mais detalhes.
						</div>
					<?php endif; ?>

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
								<table id="salaTable" class="table table-striped">
									<thead>
										<tr>
											<th>Número da Sala</th>
											<th>Capacidade Máxima</th>
											<th>Tipo</th>
											<th>Ação</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($salas as $sala) {
												$row = '<tr>
													<td>'.$sala['nSala'].'</td>
													<td>'.$sala['capMax'].'</td>
													<td>'.$sala['tipo'].'</td>
													<td>
														<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whatevernsala="'.$sala['nSala'].'" data-whateverid="'.$sala['id'].'" data-whatevercapmax="'.$sala['capMax'].'"  data-whatevertipo="'.$sala['tipo'].'"><span class="glyphicon glyphicon-pencil"></span></button>
														<button onClick="exclude('.$sala['id'].');" type="button" class="btn btn-danger" title="Excluir"><span class="glyphicon glyphicon-remove"></span></button>
													</td>
												</tr>';
												echo $row;
											}
										?>
									</tbody>
								</table>
							</div>
						</div>

						<!-- Aqui é o formulário de registro do novo item-->
						<div id="new" class="tab-pane fade">
							<h3>Cadastrar Sala</h3>
							<form action="" method="post">
									<div class="form-group percent-40">
									<label>Sala</label>
									<input type="number" min="0" class="form-control" pattern="[0-9]+$" name="nSala" placeholder="ex: 110" required>
									<?= form_error('nSala') ?>
								</div>
								<div class="form-group percent-40">
									<label for="tipo">Tipo</label>
									<select  class="form-control" name="tipo" id="tipo" required>
										<option  selected>Laboratório</option>
										<option>Teórica</option>
									</select>
									<!-- Aqui tem tratamento de erro? -->
								</div>
								<div class="form-group">
									<label>Capacidade Máxima</label>
									<input type="number" min="0" max="999" class="form-control percent-10" name="capMax" placeholder="ex: 30" required>
									<?= form_error('capMax') ?>
								</div>
								<div class="inline">
									<button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
								</div>
							</form>
						</div>

					</div><!--Fecha tab-content-->

				</div><!--Fecha content-->

			</div><!--Fecha row-->

			<!-- Aqui é o Modal de alteração das salas-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Salas</h4>
						</div>
						<div class="modal-body">
							<?= form_open('Sala/atualizar') ?>
							<div class="form-group">
								<input type="hidden" name="recipient-id" id="recipient-id">
							</div>
							<div class="form-group">
								<label for="nSala-name" class="control-label">Número da sala</label>
									<input type="number" min="0" class="form-control" name="recipient-nSala" id="recipient-nSala">
								<?= form_error('recipient-nSala') ?>
							</div>
							<div class="form-group">
								<label for="capMax-name" class="control-label">Capacidade Máxima</label>
								<input type="number" max="999" maxlength="3" pattern="[0-9]+$"class="form-control" name="recipient-capMax" id="recipient-capMax">
								<?= form_error('recipient-capMax') ?>
							</div>
							<div class="form-group">
								<label for="tipo-name" class="control-label">Tipo</label>
								<select  class="form-control" name="recipient-tipo" id="recipient-tipo">
									<option>Laboratório</option>
									<option>Teórica</option>
								</select>
								<?= form_error('recipient-tipo') ?>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Alterar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							</div>
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
						var recipientnsala = button.data('whatevernsala')
						var recipientcapmax = button.data('whatevercapmax')
						var recipienttipo = button.data('whatevertipo')
						var recipientId = button.data('whateverid')
						// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						var modal = $(this)
						modal.find('.modal-title').text('Alterar Sala')
						modal.find('#recipient-nSala').val(recipientnsala)
						modal.find('#recipient-capMax').val(recipientcapmax)
						modal.find('#recipient-tipo').val(recipienttipo)
						modal.find('#recipient-id').val(recipientId)
				})
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#salaTable").DataTable({
					"language":{
						"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
					}
				});
			});
		</script>
		<script>
			function exclude(id){
				bootbox.confirm({
					message: "Realmente deseja excluir essa sala?",
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
							window.location.href = '<?= base_url("index.php/Sala/deletar/")?>'+id
					}
				});
			}
		</script>
	</body>
</html>
