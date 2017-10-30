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

        <!-- Os dados presentes no CSV serão expostos aqui!! -->
                
                  <div class="form-group">					    
							<table id="disciplinaTable" class="table table-striped">
								<caption>Disciplinas</caption>
								<thead>
									<tr>
										<th>Nome</th>
										<th>Sigla</th>
										<th>Curso</th>
										<th>Qtd. Professores</th>
										<th>Módulos</th>
										<th>Qtd. Aulas Semanais</th>
										<th>Tipo de Sala</th>		
									</tr>
								</thead>
								<tbody>
									<?php $disciplinas = &$disciplina ?>	
									<?php if ($disciplinas == false): ?>
										<tr><td colspan="2">Nenhum contato encontrado</td></tr>
									<?php else: ?>
										<?php foreach ($disciplinas as $row): ?>
											<tr>								
												<td><?php echo $row['nome_disciplina']; ?></td>
												<td><?php echo $row['sigla_disciplina']; ?></td>
												<td><?php echo $row['curso_id']; ?></td>
												<td><?php echo $row['qtd_professor']; ?></td>
												<td><?php echo $row['modulo']; ?></td>
												<td><?php echo $row['qtd_aulas']; ?></td>
												<td><?php echo $row['tipo_sala_id']; ?></td>

											</tr>
										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div> 
                </table>


</div>
