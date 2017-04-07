<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Professor</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
	</head>
	<body>
		<!-- as classes container-fluid, row e col-md-xx são do GRID do bootstrap -->
		<!-- procure por 'bootstrap grid' e estude-as -->
		<div class="container-fluid">
			<div class="row">
				<div id="header" class="col">
					<div id="classclock">
						<h1>Class Clock</h1>
					</div>
					<div id="ifsp">
						<img src="<?= base_url('assets/img/ifsp.jpg')?>" class="logo">
					</div>
				</div>
			</div><!--Fecha row-->

			<div class="row">

				<div id="sidebar" class="col-md-2" role="navigation">
					<h2>Menu</h2>
					<ul class="nav nav-pills nav-stacked">
						<li>Disponibilidade</a></li>
						<li class="active"><?= anchor('Preferencia','Preferências') ?>Preferência</a></li>
						<li>Visualizar Grade</a></li>
						<hr>
						<li><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
					</ul>
				</div>

				<div id="content" class="col-md-10">
					<h1>Preferências</h1>
					<form>
						<div class="modal-content col-md-offset-3 col-md-5">
							<div class="form-group disc">
								<label>Disciplinas</label>
								
								<!-- Aqui entra o multi select -->

								<div class="form-group">
									<button type='button' class='btn bt-lg btn-primary'>Cadastrar</button>
								</div>
							</div>
						</div>
					</form>
						
					<div id="footer" class="col">
						<p>Desenvolvido por Metal Code</p>
					</div>
				</div><!--Fecha content-->
			</div><!--Fecha row-->
		</div><!--Fecha container-fluid-->
		
		<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
	</body>
</html>
