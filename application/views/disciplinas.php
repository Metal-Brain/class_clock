<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro das Disciplinas</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
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
						<img src="<?= base_url('assets/img/ifsp.png')?>" class="logo">
					</div>
				</div>
			</div><!--Fecha row-->

			<div class="row">

				<div id="sidebar" class="col-md-2" role="navigation">
					<h2>Menu</h2>
					<ul class="nav nav-pills nav-stacked">
						<li><a href="cursos.html">Cursos</a></li>
						<li class="active"><a href="disciplinas.html">Disciplinas</a></li>
						<li><a href="professores.html">Professores</a></li>
						<li><a href="professores.html">Salas</a></li>
						<hr>
						<li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
					</ul>
				</div>

				<div id="content" class="col-md-10">
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
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Sigla</th>
										<th>Nome</th>
										<th>Qtd. Professores</th>
										<th>Ação</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($disciplinas as $disciplina) {
											$row = '<tr>
												<td>'.$disciplina['sigla'].'</td>
												<td>'.$disciplina['nome'].'</td>
												<td>'.$disciplina['qtdProf'].'</td>
												<td>
													<button type="button" class="btn btn-primary" title="Visualizar" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open"></span></button>
													<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whateversigla="LOP1" data-whatevernome="Lógica de Programação 1" data-whatevercurso="ADS"><span class="glyphicon glyphicon-pencil"></span></button>
													<button type="button" class="btn btn-danger" title="Excluir"><span class="glyphicon glyphicon-remove"></span></button>
												</td>
											</tr>';

											echo $row;
										}
									?>

								</tbody>
							</table>
						</div>

						<!-- Aqui é o formulário de registro do novo item-->
						<div id="new" class="tab-pane fade">
							<h3>Cadastrar Disciplina</h3>
							<form action="" method="post">
								<div class="form-group percent-40 inline">
									<label>Nome</label>
									<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?= set_value('nome')?>">
									<?= form_error('nome') ?>
								</div>
								<div class="form-group percent-10 inline">
									<label>Sigla</label>
									<input type="text" class="form-control" name="sigla" placeholder="ex: LOPA1" value="<?= set_value('sigla')?>">
									<?= form_error('sigla') ?>
								</div>
								<div class="form-group">
									<label>Quantidade de professores</label>
									<input type="text" class="form-control percent-5" name="qtdProf" placeholder="ex: 1" value="<?= set_value('qtdProf')?>">
									<?= form_error('qtdProf') ?>
								</div>
								<div class="inline">
									<button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
									<button type='button' class='btn bt-lg btn-default'>Cancelar</button>
								</div>
							</form>
						</div>

					</div><!--fecha tab-content-->

				</div><!--Fecha content-->

			</div><!--Fecha row-->

			<!-- Aqui é o Modal de visualização das disciplinas-->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Nome do Curso</h4>
						</div>
						<div class="modal-body">
							<p>Sigla</p>
							<p>Nome do Curso</p>
							<p>Quantidade de Professores</p>
						</div>
					</div>
				</div>
			</div>

			<!-- Aqui é o Modal de alteração das disciplinas-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">Disciplinas</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label for="sigla-name" class="control-label">Sigla:</label>
									<input type="text" class="form-control" id="recipient-sigla">
								</div>
								<div class="form-group">
									<label for="nome-name" class="control-label">Nome:</label>
									<input type="text" class="form-control" id="recipient-nome">
								</div>
								<div class="form-group">
									<label for="qtd-prof" class="control-label">Quantidade de professores:</label>
									<input type="text" class="form-control percent-10" id="recipient-qtd-prof">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
									<button type="button" class="btn btn-danger">Alterar</button>
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
		<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
				$('#exampleModal').on('show.bs.modal', function (event) {
						var button = $(event.relatedTarget) // Button that triggered the modal
						var recipient = button.data('whatever') // Extract info from data-* attributes
						var recipientsigla = button.data('whateversigla')
						var recipientnome = button.data('whatevernome')
						var recipientcurso = button.data('whatevercurso')
						// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						var modal = $(this)
						modal.find('.modal-title').text('Alterar Disciplina')
						modal.find('#recipient-sigla').val(recipientsigla)
						modal.find('#recipient-nome').val(recipientnome)
						modal.find('#recipient-curso').val(recipientcurso)
				})
		</script>
	</body>
</html>
