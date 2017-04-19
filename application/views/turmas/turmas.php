<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro das Turmas</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/datatables.min.css') ?>">
	</head>
	<body>
		<!-- as classes container-fluid, row e col-md-xx são do GRID do bootstrap -->
		<!-- procure por 'bootstrap grid' e estude-as -->
		<div class="container-fluid">
			<div class="row">
				<div id="header" class="col">
					<div id="classclock">
						<h1>Class Clock</h1>
					</div>
					<div id="ifsp">
						<img src="<?= base_url('assets/img/ifsp.jpg')?>" class="logo">
					</div>
				</div>
			</div><!--Fecha row-->

			<div class="row">

				<div id="sidebar" class="col-md-2" role="navigation">
					<h2>Menu</h2>
					<ul class="nav nav-pills nav-stacked">
						<li><?= anchor('Curso','Cursos') ?></li>
						<li><?= anchor('Disciplina','Disciplinas') ?></li>
						<li><?= anchor('Professor', 'Professores') ?></li>
						<li><?= anchor('Sala','Salas') ?></li>
						<li class="active"><?= anchor('Turma','Turmas') ?></li>
						<hr>
						<li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
					</ul>
				</div>

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

					<h1>Turmas</h1>

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
								<table id="turmaTable" class="table table-striped">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Disciplina</th>
										<th>Qtd. Alunos</th>
										<th>Turma DP</th>
										<th>Status</th>
										<th>Ação</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($turmas as $turma): ?>
											<?= ($turma['status'] ? '<tr>' : '<tr class="danger">') ?>
												<td><?= $turma['nome']?></td>
												<td><?= $turma['disciplina']?></td>
												<td><?= $turma['qtdAluno']?></td>
												<td><?= $turma['dp']?></td>
												<td><?php if($turma['status']): echo "Ativo"; else: echo "Inativo"; endif;?></td>
												<td>
													<?php if ($turma['status']): ?>
														<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal"  data-whateverdisciplina="<?= $turma['disciplina']?>" data-whateverid="<?= $turma['id']?>"  data-whatevernome="<?= $turma['nome']?>"  data-whateverqtdAluno="<?= $turma['qtdAluno']?> data-whateverdp="<?= $turma['dp']?>"><span class="glyphicon glyphicon-pencil"></span></button>
														<button onClick="disable(<?= $turma['id']?>)" type="button" class="btn btn-danger delete" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
													<?php else : ?>
														<button onClick="able(<?= $turma['id']?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
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
							<h3>Cadastrar Turmas</h3>
							<form action="" method="post">
							
							<div class="form-group">
									<label>Nome</label>
									<input type="text" class="form-control" name="nome" placeholder="Nome" maxlength="10" value="<?= set_value('nome')?>">
									<?= form_error('nome') ?>
								</div>
								
								<div class="form-group">
                                    <label>Curso</label>
                                    <!-- DropListDisciplina (Droplist) -->
                                    <div class="form-group percent-15">
                                        <div id="u1" class="ax_default droplist" data-label="DropListDisciplina">
                                          <?= form_dropdown('disciplina',$disciplina,set_value('disciplina'),array('class'=>'form-control')) ?>
                                          <?= form_error('disciplina') ?>
                                        </div>
                                    </div>
                                </div>
								
								<div class="form-group">
									<label>Quantidade de Alunos</label>
									<input type="text" maxlength="3" pattern="[0-9]+$" class="form-control percent-5" name="qtdAluno" placeholder="ex: 30" value="<?= set_value('qtdAluno')?>">
									<?= form_error('qtdAluno') ?>
								</div>
								<div class="form-group">
									<input id="dp" type="checkbox" name="dp" class="form-group" value="true"/>
									<label for="dp">Cursando Dependência</label>
								</div
								<div class="inline">
									<button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
								</div>
							</form>
						</div>

					</div><!--fecha tab-content-->

				</div><!--Fecha content-->

			</div><!--Fecha row-->

			<!-- Aqui é o Modal de alteração das Turmas-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Turmas</h4>
						</div>
						<div class="modal-body">
							<?= form_open('Turma/atualizar') ?>
								<div class="form-group">
									<input type="hidden" name="recipient-id" id="recipient-id">
								</div>
								
								<div class="form-group">
									<label for="nome-name" class="control-label">Nome:</label>
									<input type="text" class="form-control" name="recipient-nome" id="recipient-nome" maxlength="10">
									<?= form_error('recipient-nome') ?>
								</div>
								
								   <!-- DropListDisciplina (Droplist) -->
                                <div class="form-group percent-40 inline">
                                    <label for="disciplina-name" class="control-label">Curso:</label>
                                  <?= form_dropdown('disciplina',$disciplina,null,array('class'=>'form-control')) ?>
                                  <?= form_error('disciplina') ?>
                                </div>
														
								
								
								<div class="form-group">
									<label for="qtd-aluno" class="control-label">Quantidade de Alunos:</label>
									<input type="text" maxlength="3" pattern="[0-9]+$"  class="form-control percent-10" name="recipient-qtd-aluno" id="recipient-qtd-aluno">
									<?= form_error('recipient-qtd-aluno') ?>
								</div>
								
								<div class="form-group">
									<input type="checkbox" name="recipient-dp" value="true" class="form-group" id="recipient-dp"/>
									<label for="recipient-dp">Cursando Dependência</label>
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
						var recipientdisciplina = button.data('whateverdisciplina')
						var recipientQtdAluno = button.data('whateverqtdAluno')
						var recipientId = button.data('whateverid')
						var recipientNome = button.data('whatevernome')
						var recipientDp = button.data('whateverdp')
						// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						var modal = $(this)
						modal.find('.modal-title').text('Alterar Turma')
						modal.find('#recipient-disciplina').val(recipientdisciplina)
						modal.find('#recipient-qtd-aluno').val(recipientQtdAluno)
						modal.find('#recipient-id').val(recipientId)
						modal.find('#recipient-nome').val(recipientNome)
						modal.find('#recipient-dp').val(recipientDp)
				})
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#TurmaTable").DataTable({
					"language":{
						"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
					}
				});
			});
		</script>
		<script>
			function disable(id){
				bootbox.confirm({
					message: "Realmente deseja desativar essa turma?",
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
							window.location.href = '<?= base_url("index.php/Turma/desativar/")?>'+id
					}
				});
			}

			function able(id){
				bootbox.confirm({
					message: "Realmente deseja ativar essa Turma?",
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
							window.location.href = '<?= base_url("index.php/Turma/ativar/")?>'+id
					}
				});
			}
		</script>
	</body>
</html>
