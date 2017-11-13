<div class="col-md-10 col-lg-10">
  <!-- Alertas de sucesso / erro -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="alert alert-danger">
					<p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>

  <!-- Início do conteúdo da view-->
  <div class="row">
      <div class="col-md-12">
          <h2 class="page-header">FPA</h2>
      </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <h4>Selecione as disciplinas que deseja lecionar (por ordem de preferência):</h4>
    </div>
  </div>

  <form id="formPref" action="" method="POST">
    <div class="row">
      <div class="col-md-12 form-group">
        <button id="btnAdd" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar Aula</button>
      </div>
    </div>

    <div id="disciplinas">

    </div>

    <div class="row">
      <div class="col-md-12">
          <a class="btn btn-danger active" href="<?= base_url('index.php/Fpa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
          <button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
      </div>
    </div>
    
  </form>

</div>
