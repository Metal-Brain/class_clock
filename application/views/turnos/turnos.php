<div class="container col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<div class="top-bar" style="padding: 0 0 15px 0">
		<div class="row">
			<div class="col-md-5">
				<div class="input-group">
					<input type="text" class="form-control input-filter" placeholder="Pesquisar">
					<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
				</div>
			</div>
			<div class="col-md-2">
				<a class="btn btn-success" href=""><span class="classglyphicon glyphicon-plus"></span> Cadastrar</a>
			</div>
		</div>
	</div>
	<table id="TurnoTable" class="table table-striped">
		<thead>
			<tr>
				<th><center>Nome</th>
				<th><center>Qtd. Aulas</th>
				<th><center>Horário de entrada</th>
				<th><center>Horário de saída</th>
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