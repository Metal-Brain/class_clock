<div class="container col-md-12 col-lg-10">
	<!-- Alertas de sucesso / erro -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="alert alert-danger">
					<p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
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
				<th class="text-center">Nome</th>
				<th class="text-center">Qtd. Aulas</th>
				<th class="text-center">Horário das Aulas</th>
				<th class="text-center">Ações</th>
			</tr>
		</thead>
		<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
		<tbody>
			<?php foreach ($turnos as $turno) { ?>
				<tr>
					<td class="text-center"><?= $turno['nome_turno']; ?></td>
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
					<td class="text-center">
						<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('Turno/editar/'.$turno->id)?>"></a>
						<a class="btn btn-danger glyphicon glyphicon-remove" title="Remover" href="<?= site_url('Turno/deletar/'.$turno->id)?>"></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
