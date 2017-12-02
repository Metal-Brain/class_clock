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
			<h2 class="page-header">Períodos
				<a class="btn btn-success" href="<?= base_url('index.php/periodo/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</h2>
			</div>
		</div>
	</div>
	<table id="PeriodoTable" class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Nome</th>
				<th class="text-center">Status</th>
				<th class="text-center">Ações</th>
			</tr>
		</thead>
		<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
		<tbody>
			<?php foreach ($periodos as $periodo) { ?>
				<tr <?php if(empty($periodo->deletado_em)): echo 'class="success"'; endif; ?>>
					<td class="text-center"><?= ucwords($periodo['nome']); ?></td>
					<td class="text-center"><?= (empty($periodo->deletado_em)) ? 'Ativado' : 'Desativado'?></td>
					<td class="text-center">
						<?php if (empty($periodo->deletado_em)): ?>
						<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('periodo/editar/'.$periodo->id)?>"></a>
						<a class="btn btn-danger glyphicon glyphicon-remove disabled" title="Desativar" id="btn-delete" onclick="confirm(<?= $periodo->id ?>,'Deseja desativar o período?','deletar')"></a>
					<?php else : ?>

						<a class="btn btn-warning glyphicon glyphicon-pencil disabled" title="Editar" href="<?= site_url('periodo/editar/'.$periodo->id)?>"></a>
						<button class="btn btn-success" title="Ativar" type="button" id="btn-delete" onclick="confirm(<?= $periodo->id ?>,'Deseja ativar o período?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>
						<?php endif; ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
