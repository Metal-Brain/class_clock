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

			<!-- Cadastro das preferências do professor -->
			<?= form_open('Professor/disponibilidade') ?>
				<div class="col-md-12">
					<div class="container">
						<div class="row">
							<div class='col-sm-8'>
								<h1>Disponibilidade</h1>
								<div class="table-responsive">
									<table id="listas" class="table">
										<tr>
											<th>Periodo</th>
											<th>Dia</th>
											<th>Inicio</th>
											<th>Fim</th>
										</tr>
										<tr class="form-row">
											<td>
												<?= form_dropdown('periodo',$periodo,null,array('id'=>'periodo','class'=>'form-control')) ?>
												<?= form_error('periodo') ?>
											</td>
											<td>
												<?= form_dropdown('dia',$dia,null,array('class'=>'form-control')) ?>
												<?= form_error('dia') ?>
											</td>
											<td>
												<?= form_dropdown('inicio',$horas,null,array('id'=>'inicio','class'=>'form-control','disabled'=>'disabled')) ?>
												<?= form_error('inicio') ?>
											</td>
											<td>
												<?= form_input('fim','',array('id'=>'fim','class'=>'form-control','readonly'=>'readonly')) ?>
											</td>
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

							<div class="row" style="margin-top:100px;">
								<div class="col-sm-8">
									<h3 class="text-center">Tabela de disponibilidade</h3>
									<table class="table table-bordered">
										<tr>
											<th class="text-center">Dia</th>
											<th class="text-center" colspan="6">Horario</th>
										</tr>
										<?php foreach ($disponibilidade as $dia) : ?>
											<tr>
											<?php if ($dia) :?>
												<td><?= ucfirst($dia[0]['dia']) ?></td>
												<?php foreach ($dia as $horario) : ?>
													<td><?= $horario['inicio'] ?></td>
												<?php endforeach; ?>
											<?php endif; ?>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div><!--Fecha content-->
			<?= form_close() ?>
		</div><!--Fecha container-fluid-->
