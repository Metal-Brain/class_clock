		<div id="content" class="col-md-10">

			<?php if($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<p class="text-center"><?= $this->session->flashdata('success') ?></p>
				</div>
			<?php endif; ?>

			<!-- Cadastro das preferências do professor -->
			<?= form_open('Professor/disponibilidade') ?>
				<div class="col-md-12">
					<h1>Disponibilidade</h1>
					<div class="container">
						<div class="row">
							<div class='col-sm-8'>
								<div class="table-responsive">
									<table id="listas" class="table">
										<tr>
											<th>Periodo</th>
											<th>Dia</th>
											<th>Inicio</th>
											<th>Fim</th>
										</tr>
										<tr class="form-row">
											<td><?= form_dropdown('periodo',$periodo,set_value('periodo'),array('id'=>'periodo','class'=>'form-control')) ?></td>
											<td><?= form_dropdown('dia',$dia,set_value('dia'),array('class'=>'form-control')) ?></td>
											<td><?= form_dropdown('inicio',$horas,null,array('id'=>'inicio','class'=>'form-control','disabled'=>'disabled')) ?></td>
											<td><?= form_input('fim','',array('id'=>'fim','class'=>'form-control','disabled'=>'disabled')) ?></td>
										</tr>
									</table>
								</div>
							</div>
							<div class="row">
								<div class='col-sm-8'>
									<div  style="margin-left:15px;">
										<button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--Fecha content-->
			<?= form_close() ?>
		</div><!--Fecha container-fluid-->
