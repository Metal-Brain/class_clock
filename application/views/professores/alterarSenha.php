<div id="content" class="col-md-10">

  <?php if ($this->session->flashdata('success')) : ?>
    <div class="text-center alert alert-success" role="alert">
      <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
      <?= $this->session->flashdata('success') ?>
    </div>
  <?php elseif ($this->session->flashdata('danger')) : ?>
    <div class="text-center alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <?= $this->session->flashdata('danger') ?>
    </div>
  <?php endif; ?>

  <h1>Configurações <small>Alterar Senha</small></h1>

  <div class="col-md-offset-4 col-md-4">
    <?= form_open('Usuario/alterarSenha',array('class'=>'form-horizontal')) ?>

    <div class="form-group">
      <?= form_label('Senha Atual:','senhaAtual') ?>
      <?= form_password('senhaAtual','',array('id'=>'senhaAtual','class'=>'form-control','autofocus'=>'')) ?>
      <?= form_error('senhaAtual') ?>
    </div>

    <div class="form-group">
      <?= form_label('Nova Senha:','novaSenha') ?>
      <?= form_password('novaSenha','',array('id'=>'novaSenha','class'=>'form-control')) ?>
      <?= form_error('novaSenha') ?>
    </div>

    <div class="form-group">
      <?= form_label('Confirma a senha:','confirmaSenha') ?>
      <?= form_password('confirmaSenha','',array('id'=>'confirmaSenha','class'=>'form-control')) ?>
      <?= form_error('confirmaSenha') ?>
    </div>

    <div class="form-group">
      <?= form_submit('submit','Alterar',array('class'=>'btn btn-success')) ?>
    </div>

    <?= form_close() ?>
  </div>



</div>
