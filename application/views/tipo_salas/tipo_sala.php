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
			<div class="col-md-2">
				<a class="btn btn-success" href="<?= base_url('index.php/Tipo_Sala/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</div>
		</div>
	</div>
	<table id="Tipo_SalaTable" class="table table-striped">
		<thead>
			<tr>
                <th class="text-center">Nome</th>
				<th class="text-center">Descrição</th>
				<th class="text-center">Ação</th>
			</tr>
		</thead>
		<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
		<tbody>
			<?php foreach ($tipo_salas as $tipo_salas) : ?>
			<tr>
			<td class="text-center"><?= $tipo_salas['nome_tipo_sala']; ?></td>
            <td class="text-center"><?= $tipo_salas['descricao_tipo_sala']; ?></td>
			<td class="text-center">
				<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('Tipo_Sala/editar/'.$tipo_salas->id)?>"></a>
				<a class="btn btn-danger glyphicon glyphicon-remove" title="Remover" href="<?= site_url('Tipo_Sala/deletar/'.$tipo_salas->id)?>"></a>
			</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
