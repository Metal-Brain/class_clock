<div class="container col-xs-12 col-sm-12 col-md-10 col-lg-10">

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
				<table id="TurnoTable" class="table table-striped">
					<thead>
						<tr>
							<th><center>Nome</th>
							<th><center>Qtd Aulas</th>
							<th><center>Horario de entrada</th>
							<th><center>Horario de saida</th>
							<th><center>Status</th>
							<th><center>Ação</th>
						</tr>
					</thead>
					<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
					<tbody>
						<?php foreach ($turnos as $turno) { ?>
							<?= ($turno['status'] ? '<tr>' : '<tr class="danger">') ?>
								<td><center><?= $turno['nome_turno']; ?></td>
								<td><center><?= $turno['qtdAula']; ?></td>
								<td><center><?= $turno['inicio']; ?></td>
								<td><center><?= $turno['fim']; ?></td>
								<td><center><?php if ($turno['status']): echo "Ativo";
								else: echo "Inativo";
								endif; ?></td>
							<td><center>
								<?php if ($turno['status']): ?>
									<!-- Esse button editar vai chamar o outro tab-pane editar, não está direcionado pois os dados que ele tenta passar estão com problema, se deixar apeanas o data-toggle= pill e o href editar vai chamar o tabpane -->
									<button type="button"  data-toggle="pill" href="#editar" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whatevernomeTurno="<?= $turno['nomeTurno']; ?>" data-whateverid="<?= $turno['id']; ?>" data-whateverqtdAula="<?= $turno['qtdAula']; ?>"  data-whateverinicio="<?= $turno['inicio']; ?>" data-whateverfim="<?= $turno['fim']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
									<button onClick="exclude(<?= $turno['id'] ?>);" type="button" class="btn btn-danger" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
								<?php else : ?>
									<button onClick="able(<?= $turno['id'] ?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
								<?php endif; ?>
							</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div id="new" class="tab-pane fade">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<form id="formTurnos" action="<?= site_url('turno/cadastrar')?>" method="post">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 form-group">
								<label>Nome:</label>
								<input id="nome_turno" name="nome_turno" class="form-control" type="text" placeholder="Nome" maxlength="20" value="<?= set_value('nome_turno')?>">
								<?= form_error('nome_turno') ?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 form-group">
								<button id="btnAdd" type="button" class="btn btn-primary btn-success add-field" style="background: green; ">+ Adicionar Aula</button>
								<button id="btnRemove" type="button" class="btn btn-primary btn-success add-field" style="background: red; ">- Remover Aula</button>
							</div>
						</div>
						<div class="row aux" id="linha">
							<div class="col-xs-12 col-sm-12 col-md-1">
								<label style="padding: 8px 0 0 0;">Aula 1</label>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-2 form-group">
								<input id="inicio" name="horario[]" class="form-control hora inicio" type="text" placeholder="Início" minlength="5" maxlength="5">
								<?= form_error('horario') ?>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-2 form-group">
								<input id="fim" name="horario[]" class="form-control hora fim" type="text" placeholder="Fim" minlength="5" maxlength="5">
							</div>
							<?= form_error('horario[]') ?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 form-group">
							<button type="submit" class="btn btn-primary btn-lg active cadastrar" >Cadastrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
