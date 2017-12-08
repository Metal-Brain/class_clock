<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
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
<div style="padding: 0 0 15px 0">
	<div class="row">
		<div class="col-md-12">
		<h2 class="page-header">Turma
			<a class="btn btn-success" href="<?= base_url('index.php/turma/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
		</h2>
		</div>
	</div>
</div>
<table id="TurmaTable" class="table table-striped">
	<thead>
		<tr>
			<th class="text-center">Periodo</th>
			<th class="text-center">Curso</th>
			<th class="text-center">Disciplina</th>
			<th class="text-center">Turno</th>
			<th class="text-center">Qtd. Alunos</th>
			<th class="text-center">Dependência</th>
			<th class="text-center">Status</th>
			<th class="text-center">Ações</th>
		</tr>
	</thead>
	<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
	<tbody>
		<?php foreach ($turmas as $turma) { ?>
			<tr <?php if($turma->deletado_em): echo 'class="danger"'; endif; ?>>
				<td class="text-center"><?= $turma->periodo->nome; ?></td>
				<td class="text-center"><?= $turma->disciplina->curso->nome_curso ?></td>
				<td class="text-center"><?= $turma->disciplina->nome_disciplina; ?></td>
				<td class="text-center"><?= $turma->turno->nome_turno ?></td>
				<td class="text-center"><?= $turma->qtd_alunos ?></td>
				<td class="text-center"><?= ( empty($turma->dp) ) ? 'Não' : 'Sim'?></td>
				<td class="text-center"><?= ( empty($turma->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
				<td class="text-center">
					<?php if ( empty($turma->deletado_em) ) : ?>
						<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('turma/editar/'.$turma->id)?>"></a>
						<button class="btn btn-danger" title="Desativar" type="button" id="btn-delete" onclick="confirmDelete(<?= $turma->id ?>,'Deseja desativar a turma?','deletar')"> <i class="glyphicon glyphicon-remove"></i></button>
					<?php else : ?>
						<a class="btn btn-warning glyphicon glyphicon-pencil disabled" title="Editar" href="<?= site_url('turma/editar/'.$turma->id)?>"></a>
						<button class="btn btn-success" title="Ativar" type="button" id="btn-delete" onclick="confirmDelete(<?= $turma->id ?>,'Deseja ativar a turma?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>
					<?php endif; ?>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
