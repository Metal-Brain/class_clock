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
			<h2 class="page-header">Pessoas
				<a class="btn btn-success" href="<?= base_url('index.php/pessoa/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</h2>
			</div>
		</div>
	</div>
	<table id="PessoaTable" class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Nome</th>
				<th class="text-center">Prontuário</th>
				<th class="text-center">E-mail</th>
				<th class="text-center">Status</th>
				<th class="text-center">Ações</th>
			</tr>
		</thead>
		<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
		<tbody>
			<?php foreach ($pessoas as $pessoa) { ?>
				<tr <?php if($pessoa->deletado_em): echo 'class="danger"'; endif; ?>>
					<td class="text-center"><?= ucwords($pessoa['nome']); ?></td>
					<td class="text-center"><?= $pessoa['prontuario']; ?></td>
					<td class="text-center"><?= $pessoa['email']; ?></td>
					<td class="text-center"><?= ( empty($pessoa->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
					<td class="text-center">
						<?php if ( empty($pessoa->deletado_em) ) : ?>
							<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('pessoa/editar/'.$pessoa->id)?>"></a>
							<a class="btn btn-danger glyphicon glyphicon-remove" title="Desativar" href="<?= site_url('pessoa/deletar/'.$pessoa->id)?>"></a>
						<?php else : ?>
							<a class="btn btn-success glyphicon glyphicon-check" title="Ativar" href="<?= site_url('pessoa/ativar/'.$pessoa->id)?>"></a>
						<?php endif; ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
