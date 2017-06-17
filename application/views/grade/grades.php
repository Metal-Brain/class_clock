	<pre>
		<?php print_r($grade) ?>
	</pre>

		<div id="content" class="col-md-10">

			<?php if($this->session->flashdata('success')) : ?>
				<div class="text-center alert alert-success">
					<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
					<?= $this->session->flashdata('success') ?>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="text-center alert alert-danger">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<?= $this->session->flashdata('danger') ?>
				</div>
			<?php endif; ?>

			<!-- Cadastro das preferências do professor -->
			<?= form_open('Professor/disponibilidade') ?>
				<div class="col-md-12">
					<div class="container">
						<div class="row">
							<div class="row">
								<div class="col-sm-10">
									<h3 class="text-center">Grade</h3>

									<?php if (isset($grade)) : ?>
									<table class="table table-bordered">
										<tr>
											<th class="text-center" style="background-color: #4CAF50; color: #fff;" colspan="6">1° Semestre</th>
										</tr>
										<table class="table table-bordered">
											<tr>
											<td rowspan="6" class="dsemana" style="padding-top: 5%;"><b>2° <br />Segunda</b></td>
											<th class="dsemana"></th>
											<th class="dsemana">Disciplina</th>
											<th class="dsemana">Turma</th>
											<th class="dsemana">Profesor</th>
											<th class="dsemana">Sala</th>
										</tr>
												<tr>
												<td class="text-center">1</td>
												<td class="text-center">MD1 A1</td>
												<td class="text-center">ADS</td>
												<td class="text-center">MARILENE</td>
												<td class="text-center">A209</td>
											</tr>
												<tr>
												<td class="text-center">1</td>
												<td class="text-center">MD1 A1</td>
												<td class="text-center">ADS</td>
												<td class="text-center">MARILENE</td>
												<td class="text-center">A209</td>
											</tr>
												<tr>
													<td class="text-center">1</td>
													<td class="text-center">MD1 A1</td>
                        	<td class="text-center">ADS</td>
													<td class="text-center">MARILENE</td>
                        	<td class="text-center">A209</td>
												</tr>
											</table>
									</table>
									<?php elseif ($this->session->isCoordenador) : ?>
										<?= anchor('Professor/gerarGrade/'.$this->session->id,'Gerar Grade',array('class'=>'btn btn-success btn-block','style'=>'color: white;')) ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div><!--Fecha content-->
			<?= form_close() ?>
		</div><!--Fecha container-fluid-->
