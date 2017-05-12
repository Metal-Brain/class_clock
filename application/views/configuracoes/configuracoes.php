	<div id="content" class="col-md-10">
		<?php if($this->session->flashdata('success')) : ?>
			<div class="alert alert-success">
				<p class="text-center"><?= $this->session->flashdata('success') ?></p>
			</div>
		<?php elseif ($this->session->flashdata('danger')) : ?>
			<div class="alert alert-danger">
				<p class="text-center"><?= $this->session->flashdata('danger') ?></p>
			</div>
		<?php endif; ?>

		<?php if (validation_errors()): ?>
			<div class="alert alert-danger text-center">
				<p><?= $this->session->flashdata('formDanger') ?></p>
				<?= validation_errors() ?>
			</div>
		<?php endif; ?>
		
		<!-- Form de alteração de senha e/ou e-mail -->
		<?= form_open('Professor/configuracao') ?>
			<div class="row">
				<div class="col-md-12">
					<h1>Configurações</h1>
				</div>
			</div>
			
			<div class="row">
				<!-- Primeira coluna -->
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<h3>Alterar e-mail</h3>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-9 form-group">
							<label>E-mail cadastrado</label>
							<?= form_input('','',array('class'=>'form-control','readonly'=>'readonly')) ?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-9 form-group">
							<label>Novo e-mail</label>
							<?= form_input('', set_value(''), array('class' => 'form-control')) ?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-9 form-group">
							<label>Confirme o novo e-mail</label>
							<?= form_input('', set_value(''), array('class' => 'form-control')) ?>
						</div>
					</div>
					
					<div class="row">
						<div class='col-md-12'>
							<button type='submit' class='btn bt-lg btn-primary'>Alterar</button>
						</div>
					</div>
				</div>
				
				<!-- Segunda coluna -->
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<h3>Alterar senha de acesso</h3>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-9 form-group">
							<label>Senha atual</label>
							<input type="password" class="form-control">
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-9 form-group">
							<label>Nova senha</label>
							<input type="password" class="form-control">
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-9 form-group">
							<label>Confirme a nova senha</label>
							<input type="password" class="form-control">
						</div>
					</div>
					
					<div class="row">
						<div class='col-md-12'>
							<button type='submit' class='btn bt-lg btn-primary'>Alterar</button>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12 form-group">
							<h3>Alterar disciplinas que pode lecionar</h3>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 form-group">
							<?= form_dropdown('disciplinas[]','',set_value('disciplinas[]'),array('id'=>'disciplinas','multiple'=>'multiple')) ?>
						</div>
					</div>
					
					<div class="row">
						<div class='col-md-12'>
							<button type='submit' class='btn bt-lg btn-primary'>Alterar</button>
						</div>
					</div>
				</div>
			</div>
		<?= form_close() ?>
	</div><!--Fecha content-->
</div><!--Fecha container-fluid-->