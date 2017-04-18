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
						<h1 style="text-align:center">Class Clock</h1>
						<div class="tab-content">
							<!-- tela login -->
							<div id="principal" class="col-md-6 col-md-offset-3 tab-pane fade in active">
								<h2 style="text-align:center">Login</h2>
								<?= form_open('',array('id'=>'login','class'=>'form-horizontal')); ?>
									<div class="form-group input-group" align="center">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<?= form_input('matricula',set_value('matricula'), array('class'=>'form-control','placeholder'=>'ex: 0000000','maxlength'=>'8')) ?>
									</div>

									<div class="form-group input-group ">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<?= form_password('password',null,array('id'=>'password','class'=>'form-control','placeholder'=>'Senha')) ?>
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
										<a  data-toggle="pill" style="text-align:center;display:block;" href="#recupera">Clique aqui para recuperar a senha</a>   <!-- OBS: Liberar essa opção só quando começar a ser implementada!!! -->
									</div>
								<?= form_close() ?>
							</div>
							<!-- fim tela login-->

							<!-- modal da recuperação de senha -->
							<div id="recupera" class="col-md-6 col-md-offset-3 tab-pane fade">
								<h2 style="text-align:center">Recuperar Senha</h2>
								 <?php echo form_open('Login/enviaEmail'); ?>

								<div class="help">
									<p><strong>Ex: 0000000 </strong> Informe seu login, instruções serão enviadas para o<br> e-mail cadastrado em nosso sistema, se necessário, procure a CTI.</p>
								</div>
								<form>
									<div class="form-group input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<?= form_input('matricula',set_value('matricula'), array('class'=>'form-control','placeholder'=>'ex: 0000000','maxlength'=>'8')) ?>

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

									</div>

									<div class="col-md-6 col-md-offset-3 inline">



										<button type='submit' class='btn bt-lg btn-primary' style="background-color: #4CAF50">Redefinir</button>
										<button type='button' class='btn bt-lg btn-default'  data-toggle="pill" href="#principal">Cancelar</button>
									</div>
								</form>
							</div>

							<!-- Fim modal da recuperação de senha -->
						</div>

						<!-- img logo -->
						<div style="border-bottom: 1px #606060 solid;">
							  <img src="<?= base_url('assets/img/ifsp.jpg')?>"  class="logo" style="margin: 20px auto 40px; display: block;"/>
						</div>
						<!-- Fim logo -->
					</div>
				</div>
			</div>

			<div class="row">
				<div id="footer" class="col" style="text-align:center">
					<p>Desenvolvido por Metal Code</p>
				</div>
			</div><!--Fecha row-->

		</div><!--Fecha container-fluid-->

		<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	</body>
</html>
