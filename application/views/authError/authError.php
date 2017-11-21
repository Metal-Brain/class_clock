<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class Clock - acesso negado</title>
    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Style -->
    <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
  </head>
  <body>

    <div class="row hidden-print">
      <header class="col-xs-12 col-sm-12">
        <div class="col-xs-6 col-sm-3">
          <a href="">
            <img class="img-responsive center-block navbar-brand" src="<?= base_url('assets/img/logo-white.png')?>">
          </a>
        </div>
        <div class="col-xs-6 col-sm-6 pull-right">
          <a href=""><img class="img-responsive ifsp-logo center-block pull-right" src="<?= base_url('assets/img/ifsp.png')?>"></a>
        </div>
      </header>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Ops, você não deveria estar aqui!</h1>
        <img class="img-responsive center-block" src="<?= base_url('assets/img/professor.gif')?>">
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <a href="<?= site_url('Turno')?>" class="btn btn-success btn-lg btn-block">Voltar</a>
      </div>
    </div>

  </body>
</html>
