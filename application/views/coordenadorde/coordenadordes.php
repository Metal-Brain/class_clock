<div id="content" class="col-md-10">

 		<?php if($this->session->flashdata('success')) : ?>
 			<div class="alert alert-success">
 				<p class="text-center"><?= $this->session->flashdata('success') ?></p>
 			</div>
 		<?php endif; ?>

 		<!-- Cordenador de -->
 		<?= form_open('Professor/coordenadorde') ?>
 			<div class="col-md-12">
 				<h1>Professores Coordenados</h1>

 				<div class="row">
 					<!-- Aqui entra o multi select -->
 					<div class="form-group col-md-5">
 						<label>Professores que respondem a você</label>
 						<?= form_dropdown('professores[]',$professores,null,array('id'=>'professores','multiple'=>'multiple')) ?>
 					</div>
 				</div>

 				<div class="row">
 					<div class="col-md-8 margin-top-error">
 						<?= form_error('professores[]') ?>
 					</div>
 				</div>

 				<div class="form-group">
 					<?= form_submit('submit','Cadastrar',array('class'=>'btn btn-primary')) ?>
 				</div>
 			</div>
 		<?= form_close() ?>
 	</div><!--Fecha content-->
 </div><!--Fecha container-fluid-->
