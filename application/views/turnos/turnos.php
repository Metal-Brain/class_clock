<div class="container col-md-12 col-lg-10">
	<!-- Alertas de sucesso / erro -->
	<div class="row">
		<div class="col-lg-offset-3 col-lg-6">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<p class="text-center"><?= $this->session->flashdata('success') ?></p>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="alert alert-danger">
					<p class="text-center"><?= $this->session->flashdata('danger') ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Início do conteúdo da view-->
	<div class="top-bar" style="padding: 0 0 15px 0">
		<div class="row">
			<div class="col-md-5">
				<div class="input-group">
					<input type="text" class="form-control input-filter" placeholder="Pesquisar">
					<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
				</div>
			</div>
			<div class="col-md-2">
				<a class="btn btn-success" href="<?= base_url('index.php/Turno/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</div>
		</div>
	</div>
	<table id="TurnoTable" class="table table-striped">
		<thead>
			<tr>
				<th><center>Nome</th>
				<th><center>Qtd. Aulas</th>
				<th><center>Horário das Aulas</th>
				<th><center>Status</th>
			</tr>
		</thead>
		<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
		<tbody>
			<?php foreach ($turnos as $turno) { ?>
				<?= ($turno['status'] ? '<tr>' : '<tr class="danger">') ?>
					<td><center><?= $turno['nome_turno']; ?></td>
					<td class="text-center">
							<?= $turno->qtd_horarios(); ?>
					</td>
					<td class="text-center">
						<?php foreach ($turno->horarios as $horario) :?>
							<?= $horario->inicio; ?>
							<?= $horario->fim; ?>
							<br>
						<?php endforeach; ?>
					</td>
					<td><center><?= $turno['fim']; ?></td>
				<td clas="text-center">
					<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('Turno/editar/'.$turno->id)?>"></a>
					<a class="btn btn-danger glyphicon glyphicon-remove" title="Remover" href="<?= site_url('Turno/deletar/'.$turno->id)?>"></a>
				</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
