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
			<h2 class="page-header">Áreas
				<a class="btn btn-success" href="<?= base_url('index.php/area/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</h2>
			</div>
		</div>
	</div>
	<table id="AreaTable" class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Código</th>
				<th class="text-center">Área</th>
        <th class="text-center">&nbsp;</th>
        <th class="text-center">&nbsp;</th>
			</tr>
		</thead>
		<!--Informações do Back aqui-->
		<tbody>
			<?php foreach ($areas as $area) { ?>
				<tr <?php if($area->deletado_em): echo 'class="danger"'; endif; ?>>
					<td class="text-center"><?= ucwords($area['codigo']); ?></td>
					<td class="text-center"><?= $area['nome_area']; ?></td>
					<td class="text-center"><?= ( empty($area->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
					<td class="text-center">
						<?php if ( empty($area->deletado_em) ) : ?>
<<<<<<< HEAD
							<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('area/editar/'.$area->id)?>"></a>
							<button class="btn btn-danger" type="button" id="btn-delete" onclick="confirmDelete(<?= $area->id ?>,'Deseja desativar o area?','deletar')"> <i class="glyphicon glyphicon-remove"></i></button>
						<?php else : ?>
							<a class="btn btn-warning glyphicon glyphicon-pencil disabled" title="Editar" href="<?= site_url('area/editar/'.$area->id)?>"></a>
							<button class="btn btn-success" type="button" id="btn-delete" onclick="confirmDelete(<?= $area->id ?>,'Deseja ativar o area?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>
=======
                            <a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('Area/editar/'.$area->id)?>"></a>
							<button class="btn btn-danger" type="button" id="btn-delete" onclick="confirmDelete(<?= $area->id ?>,'Deseja desativar a área?','deletar')"> <i class="glyphicon glyphicon-remove"></i></button>
						<?php else : ?>
							<a class="btn btn-warning glyphicon glyphicon-pencil disabled" title="Editar" href="<?= site_url('Area/editar/'.$area->id)?>"></a>
							<button class="btn btn-success" type="button" id="btn-delete" onclick="confirmDelete(<?= $area->id ?>,'Deseja ativar a área?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>
                        
>>>>>>> 7b0be066f420099f88c78174700ec08baedd2295
						<?php endif; ?>

					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
