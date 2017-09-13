<!--<pre>
		<?php print_r($cursos) ?>
</pre> -->
	<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<!-- Alertas de sucesso / erro -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-sm-10 col-md-12">
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
			<h2 class="page-header">Cursos
				<a class="btn btn-success" href="<?= base_url('index.php/Curso/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</h2>
			</div>
		</div>
	</div>
	<table id="cursoTable" class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Código</th>
				<th class="text-center">Nome</th>
				<th class="text-center">Sigla</th>
				<th class="text-center">Quantidade de Semestres</th>
				<th class="text-center">Modalidade</th>
				<th class="text-center">Fechamento</th>
				<th class="text-center">Status</th>
				<th class="text-center">Ações</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($data['cursos'] as $curso) { ?>
			
				<tr <?php if($curso->deletado_em): echo 'class="danger"'; endif; ?>>
					<td class="text-center"><?= ucwords($curso['codigo_curso']); ?></td>
					<td class="text-center"><?= ucwords($curso['nome_curso']); ?></td>
					<td class="text-center"><?= ucwords($curso['sigla_curso']); ?></td>
					<td class="text-center"><?= ucwords($curso['qtd_semestre']); ?></td>
					<td class="text-center"><?php 
						foreach($data['grau'] as $grau){
							if($curso['grau_id'] == $grau['id']):
								echo $grau['nome_grau']; 
							endif;
						}
					?></td> 
					<td class="text-center"><?= ucwords($curso['fechamento']); ?></td>
	
					<td class="text-center"><?= ( empty($curso->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
					<td class="text-center">
						
						<?php if ( empty($curso->deletado_em) ) : ?>
						<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('curso/editar/'.$curso->id)?>"></a>
							<button class="btn btn-danger" type="button" id="btn-delete" onclick="confirmDelete(<?= $curso->id ?>,'Deseja desativar o Curso?','deletar')"> <i class="glyphicon glyphicon-remove"></i></button>
						<?php else : ?>
							<a class="btn btn-success glyphicon glyphicon-check" title="Ativar" href="<?= site_url('curso/ativar/'.$curso->id)?>"></a>
						<?php endif; ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
	
</div>