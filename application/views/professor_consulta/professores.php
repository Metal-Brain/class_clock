<div id="content" class="col-md-10">
	<?php if (validation_errors()): ?>
		<div class="alert alert-danger text-center">
			<p><?= $this->session->flashdata('formDanger') ?></p>
			<?= validation_errors() ?>
		</div>
	<?php endif; ?>

	<?php if ($this->session->flashdata('success')) : ?>
		<!-- Alert de sucesso -->
		<div class="text-center alert alert-success" role="alert">
			<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
			<span class="sr-only">Succes:</span>
			<?= $this->session->flashdata('success') ?>
		</div>
	<?php elseif ($this->session->flashdata('danger')) : ?>
		<!-- Alert de erro -->
		<div class="text-center alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			<?= $this->session->flashdata('danger') ?>
		</div>
	<?php endif; ?>

	<h1>Professores</h1>
	<!-- Lista de 'botoes' links do Bootstrap -->
	
	<div class="tab-content">
		<!-- Aqui é a Listagem dos Itens -->
		<div id="list" class="tab-pane fade in active">
			<div style="margin-top: 25px;">
				<table id="professorTable" class="table table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Matrícula</th>
							<th>Email</th>
							<th>Data Nascimento</th>
							<th>Nível acadêmico</th>
							<th>Contrato</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($professores as $professor) : ?>
							<?= ($professor['status'] ? '<tr>' : '<tr class="danger">') ?>
									<td><?= $professor['nome'] ?></td>
									<td><?= $professor['matricula'] ?></td>
									<td><?= $professor['email'] ?></td>
									<td><?= sqlToBr($professor['nascimento']) ?></td>
									<td><?= $professor['nivel'] ?></td>
									<td><?= $professor['contrato'] ?></td>
									<td><?= ($professor['status']) ? "Ativo" : "Inativo"?></td>
									
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

		
	</div><!--fecha tab-content-->

</div> <!--Fecha content-->

<!-- Aqui é o Modal de alteração dos professores-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Professor</h4>
			</div>
			<div class="modal-body">
				<?= form_open('Professor/atualizar') ?>
					<div class="form-group">
						<input type="hidden" name="recipient-id" id="recipient-id">
					</div>
							
					<div class="row">	
						<div class="form-group col-md-12">
							<label>Nome</label>
							<input type="text" class="form-control" name="recipient-nome" placeholder="Nome" id="recipient-nome" value="<?= set_value('nome')?>" required/>
						</div>
					</div>	
								
					<div class="row">
						<div class="col-md-7 margin-top-error">
							<?= form_error('recipient-nome') ?>
						</div>	
					</div>
						
					<div class="row">	
						<div class="form-group col-md-4">
							<label>Matrícula</label>
							<input type="text" class="form-control" name="recipient-matricula"  id="recipient-matricula" maxlength="8" placeholder="ex: cg0000000" value="<?= set_value('recipient-matricula')?>" required/>
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-6 margin-top-error">
							<?= form_error('recipient-matricula') ?>
						</div>	
					</div>	
					
					<div class="row">	
						<div class="form-group col-md-7">
							<label>E-mail</label>
							<input type="email" class="form-control" name="recipient-email" placeholder="Email" id="recipient-email" value="<?= set_value('email')?>" required/>
						</div>
					</div>	
							
					<div class="row">
						<div class="col-md-6 margin-top-error">
							<?= form_error('recipient-email') ?>
						</div>	
					</div>
						
					<div class="row">	
						<div class="form-group col-md-7">
							<label>Disciplinas que pode lecionar: </label>
							<?= form_dropdown('professorDisciplinas[]',$disciplinas,set_value('professorDisciplinas[]'),array('id'=>'professorDisciplinas','multiple'=>'multiple')) ?>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-md-6 margin-top-error">
							<?= form_error('professorDisciplinas[]') ?>
						</div>	
					</div>
						
					<div class="row">	
						<div class="form-group col-md-4">
							<label>Data de Nascimento</label>
							<input type="text" class="form-control" name="recipient-nascimento" id="recipient-nascimento" value="<?= set_value('nascimento')?>" required/>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-md-6 margin-top-error">
							<?= form_error('recipient-nascimento') ?>
						</div>
					</div>
								
					<div class="row">	
						<div class="form-group col-md-4">
							<label for="nivelAcademico" >Nivel Acadêmico</label>
							<?= form_dropdown('recipient-nivelAcademico',$nivel,set_value('recipient-nivelAcademico'),array('class'=>'form-control')) ?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 margin-top-error">
							<?= form_error('recipient-nivelAcademico') ?>
						</div>	
					</div>
					
					<div class="row">	
						<div class="form-group col-md-4">
							<label>Regime de contrato</label>
							<?= form_dropdown('recipient-contrato',$contrato,set_value('recipient-contrato'),array('class'=>'form-control')) ?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 margin-top-error">
							<?= form_error('recipient-contrato') ?>
						</div>	
					</div>
					
					
					<div class="row">	
						<div class="form-group">
							<input type="checkbox" name="recipient-coordenador" value="true" class="form-group" style="margin-left:20px;" id="recipient-coordenador"/>
							<label for="recipient-coordenador">Coordenador</label>
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Alterar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>