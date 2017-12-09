<?php
function podeVer($tipos, $levels) {
	$intersecao = array_intersect($tipos, $levels);

	return !empty($intersecao);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Class Clock</title>
		<!-- Bootstrap -->
		<link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
		<!-- Style -->
		<link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
		<link href="<?= base_url('assets/DataTables/dataTables.bootstrap.min.css')?>" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- DataTable -->
    <link href="<?= base_url('assets/DataTables/dataTables.bootstrap.min.css')?>" rel="stylesheet">

	<!-- Select2 -->
	<link href="<?= base_url('assets/css/select2.min.css')?>" rel="stylesheet">

	</head>



		<div class="container-fluid">
			<div class="row hidden-print">
				<header class="col-xs-12 col-sm-12">
					<div class="col-xs-6 col-sm-3">
						<a href="<?= base_url('index.php')?>">
							<img class="img-responsive center-block navbar-brand" src="<?= base_url('assets/img/logo-white.png')?>">
						</a>
					</div>
					<div class="col-xs-6 col-sm-6 pull-right">
							<img class="img-responsive ifsp-logo center-block pull-right" src="<?= base_url('assets/img/ifsp.png')?>">
					</div>
				</header>
			</div>
			<div class="row">
				<div class="text-right users">
					<ul class="nav">
						<button class="btn btn-defaul sidebar-toggler hidden-lg collapsed pull-left" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
							<span class="glyphicon glyphicon-icon-bar"></span>
							<span class="glyphicon glyphicon-icon-bar"></span>
							<span class="glyphicon glyphicon-icon-bar"></span>
						</button>

						<li class="dropdown pull-left" style="margin-left: 10px">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle usuario" role="button" style="background: #b2daa6 !important; color: #33691e !important">
								<?php $periodoAtivoHeader = @Periodo_model::periodoAtivo()->nome ?>
								<?=  $periodoAtivoHeader ? "Periodo: {$periodoAtivoHeader}" : "" ?>
							</a>
						</li>

						<li class="dropdown pull-right">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle usuario" role="button" aria-haspopup="true" aria-expanded="false">
								<?= ucwords($this->session->usuario_logado['nome']) ?> <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<!--<li><a href="" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Meu perfil</a></li>
								<li class="divider"></li>-->
								<li><a href="<?= site_url('Login/logout')?>"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div id="content" class="row">
