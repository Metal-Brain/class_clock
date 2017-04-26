		<div id="content" class="col-md-10">

			<?php if($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<p class="text-center"><?= $this->session->flashdata('success') ?></p>
				</div>
			<?php endif; ?>

			<!-- Cadastro das preferências do professor -->
			<?= form_open('Professor/preferencia') ?>
				<div class="col-md-12">
					<h1>Preferências</h1>
					
					<div class="row">
						<!-- Aqui entra o multi select -->
						<div class="form-group col-md-5">
							<label>Disciplinas que deseja lecionar</label>
							<?= form_dropdown('disciplinas[]',$disciplinas,null,array('id'=>'disciplinas','multiple'=>'multiple')) ?>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8 margin-top-error">
							<?= form_error('disciplinas[]') ?>
						</div>
					</div>
					
					<div class="form-group">
						<?= form_submit('submit','Cadastrar',array('class'=>'btn btn-primary')) ?>
					</div>
				</div>
			<?= form_close() ?>
		</div><!--Fecha content-->
</div><!--Fecha container-fluid-->