<!DOCTYPE html>
<html lang ="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Class Clock</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
	</head>
	<body>
		<!-- as classes container-fluid, row e col-md-xx são do GRID do bootstrap -->
		<!-- procure por 'bootstrap grid' e estude-as -->
		<div class="Absolute-Center is-Responsive">
			<div class="container">
			  <div class="row">
				  <div class="col-sm-12 col-md-10 col-md-offset-1">
						<img src="<?= base_url('assets/img/logo-black.png')?>"  class="logoClassClock" style="margin: 20px auto; display: block;"/>
						<div class="tab-content">
							<!-- tela login -->
							<div id="principal" class="col-md-6 col-md-offset-3 tab-pane fade in active">
								<?= form_open('',array('id'=>'login','class'=>'form-horizontal')); ?>
									<div class="form-group input-group" align="center">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<?= form_input('prontuario',set_value('prontuario'), array('class'=>'form-control','placeholder'=>'ex: 0000000','maxlength'=>'6')) ?>
									</div>

									<div class="form-group input-group ">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<?= form_password('senha',null,array('id'=>'senha','class'=>'form-control','placeholder'=>'Senha')) ?>
									</div>

									<div class="form-group">
										<!-- Alert de sucesso -->
										<?php if ($this->session->flashdata('success')) : ?>
											<div class="text-center alert alert-success" role="alert">
												<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
												<span class="sr-only">Succes:</span>
												<?= $this->session->flashdata('success') ?>
											</div>
										<!-- Alert de erro -->
										<?php elseif ($this->session->flashdata('danger')) : ?>
											<div class="text-center alert alert-danger" role="alert">
												<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
												<span class="sr-only">Error:</span>
												<?= $this->session->flashdata('danger') ?>
											</div>
										<?php endif; ?>

										<?php if (validation_errors()): ?>
											<div class="alert alert-danger text-center">
												<p><?= $this->session->flashdata('formDanger') ?></p>
												<?= validation_errors() ?>
											</div>
										<?php endif; ?>

										<button type="submit" class="btn btn-def btn-block" style="background-color: #4CAF50">Entrar</button>
										</div>
								<?= form_close() ?>
							</div>
							<!-- fim tela login-->

							

						<!-- img logo -->
						<div>
							  <img src="<?= base_url('assets/img/ifsp.jpg')?>"  class="logo img-responsive" style="margin: 20px auto 40px; display: block; width:500px;"/>
						</div>
						<!-- Fim logo -->
					</div>
				</div>
			</div>

			<!--<div id="footer1" class="text-center">
				<div class="col-md-12">
				<p><strong>Desenvolvido por Metal Code</strong></p>
				</div>
			</div> -->


		</div><!--Fecha container-fluid-->

		<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	</body>
</html>
