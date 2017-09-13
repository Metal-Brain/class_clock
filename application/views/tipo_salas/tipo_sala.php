<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<!-- Alertas de sucesso / erro -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success alert-dismissable fade in">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="alert alert-danger alert-dismissable fade in">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>

	
	<!-- Início do conteúdo da view-->
	<div style="padding: 0 0 15px 0">
		<div class="row">
			<div class="col-md-12">
			<h2 class="page-header">Tipo Sala
				<a class="btn btn-success" href="<?= base_url('index.php/Tipo_Sala/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</h2>
			</div>
		</div>
	</div>
	
	<table id="Tipo_SalaTable" class="table table-striped">
		<thead>
			<tr>
                <th class="text-center">Nome</th>
				<th class="text-center">Descrição</th>
				<th class="text-center">Status</th>
				<th class="text-center">Ação</th>
			</tr>
		</thead>
		<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
		<tbody>
			<?php foreach ($tipo_salas as $tipo_salas) : ?>
			<tr <?php if($tipo_salas->deletado_em): echo 'class="danger"'; endif; ?> >
				<td class="text-center"><?= htmlspecialchars($tipo_salas->nome_tipo_sala) ?></td>
				<td class="text-center"><?= htmlspecialchars($tipo_salas->descricao_tipo_sala); ?></td>
				<td class="text-center"><?= ( empty($tipo_salas->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
				<td class="text-center">
					<?php if ( empty($tipo_salas->deletado_em) ) : ?>
						<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('Tipo_sala/editar/'.$tipo_salas->id)?>"></a>
						<button class="btn btn-danger" type="button" id="btn-delete" onclick="confirmDelete(<?= $tipo_salas->id ?>,'Deseja desativar o Tipo Sala?','deletar')"> <i class="glyphicon glyphicon-remove"></i></button>
					<?php else : ?>
						<a class="btn btn-warning glyphicon glyphicon-pencil disabled" title="Editar" href="<?= site_url('Tipo_sala/editar/'.$tipo_salas->id)?>"></a>
						<button class="btn btn-success" type="button" id="btn-delete" onclick="confirmDelete(<?= $tipo_salas->id ?>,'Deseja ativar o Tipo Sala?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
