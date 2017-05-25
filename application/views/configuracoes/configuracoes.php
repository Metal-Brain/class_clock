	<div id="content" class="col-md-10">
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

		<!-- Form de alterações de senha e/ou e-mail -->
		<div class="row">
			<div class="col-md-12">
				<h1>Configurações</h1>
			</div>
		</div>

		<!-- Primeira coluna -->
		<div class="col-md-6">
			<?= form_open('Usuario/editar/email',array('class'=>'form-horizontal')) ?>
			<div class="row">
				<div class="col-md-12 form-group">
					<h3>Alterar e-mail</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9 form-group">
					<label>E-mail cadastrado</label>
					<?= form_input('emailAtual',$this->session->email,array('class'=>'form-control','readonly'=>'readonly')) ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9 form-group">
					<label>Novo e-mail</label>
					<?= form_input('novoEmail', set_value('novoEmail'), array('class'=>'form-control')) ?>
					<?= form_error('novoEmail') ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9 form-group">
					<label>Confirme o novo e-mail</label>
					<?= form_input('confirmaEmail', set_value('confirmaEmail'), array('class'=>'form-control')) ?>
					<?= form_error('confirmaEmail') ?>
				</div>
			</div>

			<div class="row">
				<div class='col-md-12'>
					<button type='submit' class='btn bt-lg btn-primary form-group'>Alterar</button>
				</div>
			</div>

			<?= form_close() ?>
		</div>

		<!-- Segunda coluna -->
		<div class="col-md-6">
			<?= form_open('Usuario/editar/senha',array('class'=>'form-horizontal')) ?>
			<div class="row">
				<div class="col-md-12 form-group">
					<h3>Alterar senha de acesso</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9 form-group">
					<?= form_label('Senha atual:','senhaAtual') ?>
					<?= form_password('senhaAtual','',array('class'=>'form-control')) ?>
					<?= form_error('senhaAtual') ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9 form-group">
					<?= form_label('Nova senha:','novaSenha') ?>
					<?= form_password('novaSenha','',array('class'=>'form-control')) ?>
					<?= form_error('novaSenha') ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-9 form-group">
					<?= form_label('Confirme a nova senha:','confirmaSenha') ?>
					<?= form_password('confirmaSenha','',array('class'=>'form-control')) ?>
					<?= form_error('confirmaSenha') ?>
				</div>
			</div>

			<div class="row">
				<div class='col-md-12'>
					<button type='submit' class='btn bt-lg btn-primary form-group'>Alterar</button>
				</div>
			</div>

			<?= form_close() ?>
		</div>

		<!-- Formulário para disciplinas -->
		<div class="col-md-12">
			<?= form_open('Usuario/editar/disciplinas',array('class'=>'form-horizontal')) ?>
			<div class="row">
				<div class="col-md-12 form-group">
					<h3>Alterar disciplinas que pode lecionar</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 form-group">
					<?= form_dropdown('disciplinas[]',$disciplinas,set_value('disciplinas[]'),array('id'=>'disciplinas','multiple'=>'multiple')) ?>
					<?= form_error('disciplinas[]') ?>
				</div>
			</div>

			<div class="row">
				<div class='col-md-12'>
					<button type='submit' class='btn bt-lg btn-primary form-group'>Alterar</button>
				</div>
			</div>

			<?= form_close() ?>
		</div>
	</div><!--Fecha content-->
</div><!--Fecha container-fluid-->
