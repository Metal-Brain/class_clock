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
			<div class="col-md-12">
			<h2 class="page-header">Turno
				<a class="btn btn-success" href="<?= base_url('index.php/Turno/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</h2>
			</div>
		</div>
	</div>
	<table id="TurnoTable" class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Nome</th>
				<th class="text-center">Qtd. Aulas</th>
				<th class="text-center">Horário das Aulas</th>
				<th class="text-center">Status</th>
				<th class="text-center">Ações</th>
			</tr>
		</thead>
		<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
		<tbody>
			<?php foreach ($turnos as $turno) { ?>
				<tr <?php if($turno->deletado_em): echo 'class="danger"'; endif; ?>>
					<td class="text-center"><?= ucwords($turno['nome_turno']); ?></td>
					<td class="text-center">
						<?= $turno->qtd_horarios(); ?>
					</td>
					<td class="text-center">
						<?php foreach ($turno->horarios as $horario) :?>
							<?= removerSegundos($horario->inicio); ?>
							<?= removerSegundos($horario->fim); ?>
							<br>
						<?php endforeach; ?>
					</td>
					<td class="text-center"><?= ( empty($turno->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
					<td class="text-center">
						<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('Turno/editar/'.$turno->id)?>"></a>
						<?php if ( empty($turno->deletado_em) ) : ?>
							<a class="btn btn-danger glyphicon glyphicon-remove" title="Remover" href="<?= site_url('Turno/deletar/'.$turno->id)?>"></a>
						<?php else : ?>
							<a class="btn btn-success glyphicon glyphicon-check" title="Ativar" href="<?= site_url('Turno/ativar/'.$turno->id)?>"></a>
						<?php endif; ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
