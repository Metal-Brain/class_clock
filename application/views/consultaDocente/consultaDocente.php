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
			<h2 class="page-header">Preferencia dos Docentes
			</h2>
			</div>
		</div>
</div>

        <!-- Aqui é a Listagem dos Itens -->
                <table id="preferencia_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Disciplina</th>
                            <th class="text-center">Curso</th>
                            <th class="text-center">Nome do Docente</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($preferencias as $preferencia): ?>
												<tr>
													<td class="text-center"><?= $preferencia['nome_disciplina']; ?></td>
													<td class="text-center"><?= $preferencia['nome_curso']; ?></td>
													<td class="text-center"><?= $preferencia['nome']; ?></td>
												</tr>
						<?php endforeach; ?>
                    </tbody>
                </table>


</div>
