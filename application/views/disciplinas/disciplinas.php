<div class="container col-md-10 col-lg-10">
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
			<h2 class="page-header">Disciplinas
				<a class="btn btn-success" href="<?= base_url('index.php/disciplina/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
			</h2>
			</div>
		</div>
</div>

        <!-- Aqui é a Listagem dos Itens -->

                <table id="disciplinaTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Sigla</th>
                            <th class="text-center">Curso</th>
                            <th class="text-center">Qtd. Professores</th>
                            <th class="text-center">Módulos</th>
                            <th class="text-center">Qtd. Aulas Semanais</th>
                            <th class="text-center">Tipo de sala</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($disciplinas as $disciplina): ?>
                            <tr <?php if($disciplina->deletado_em): echo 'class="danger"'; endif; ?>>
                            <td class="text-center"><?= htmlspecialchars($disciplina['nome_disciplina']); ?></td>
							<td class="text-center"><?= $disciplina['sigla_disciplina']; ?></td>
							<td class="text-center"><?= $disciplina['curso_id']; ?></td>
							<td class="text-center"><?= $disciplina['qtd_professor']; ?></td>
							<td class="text-center"><?= $disciplina['modulo']; ?></td>
							<td class="text-center"><?= $disciplina['qtd_aulas'] ?></td>
							<td class="text-center"><?= $disciplina['tipo_sala_id']; ?></td>
							<td class="text-center"><?= ( empty($disciplina->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
							<td class="text-center">
						<?php if ( empty($disciplina->deletado_em) ) : ?>
							<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('Disciplina/editar/'.$disciplina->id)?>"></a>
							<button class="btn btn-danger" type="button" id="btn-delete" title="Desativar" onclick="confirmDelete(<?= $disciplina->id ?>,'Deseja desativar a Disciplina?','deletar')"> <i class="glyphicon glyphicon-remove"></i></button>
						<?php else : ?>
							<a class="btn btn-warning glyphicon glyphicon-pencil disabled" title="Editar" href="<?= site_url('Disciplina/editar/'.$disciplina->id)?>"></a>
							<button class="btn btn-success" type="button" id="btn-delete" title="Ativar" onclick="confirmDelete(<?= $disciplina->id ?>,'Deseja ativar a Disciplina?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>
						<?php endif; ?>
					</td>
						<?php endforeach; ?>
                    </tbody>
                </table>


</div>
