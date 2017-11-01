
<?php print_r($this->session->userdata('usuario_logado')) ?>

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
      <h4>Selecione o método desejado:</h4>
    </div>
    <div class="col-md-12">
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width:171px; height:40px;">Selecione
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#" id="showDisponibilidade">Disponibilidade</a></li>
          <li><a href="#" id="showIndisponibilidade">Indisponibilidade</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Criando a tabela de disponibilidade-->
  <div id="disponibilidade" class="row" style="display:none;">
    <div class="col-md-12">
      <form id="formDisp" action="<?= site_url('fpa/salvar')?>" method="POST">
        <h4 class="text-center">Selecione os horários em que você estará disponível!</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th  class="text-center">Horários</th>
                <th class="text-center">Segunda</th>
                <th class="text-center">Terça</th>
                <th class="text-center">Quarta</th>
                <th class="text-center">Quinta</th>
                <th class="text-center">Sexta</th>
                <th class="text-center">Sábado</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($horarios as $horarios) :?>
                <tr >
                  <td class="text-center"><?= removerSegundos($horarios->inicio) . '-' . removerSegundos($horarios->fim) ?></td>
                  <td class="text-center"><input type="checkbox" name="disp[seg][]" value="<?= $horarios->id ?>"></td>
                  <td class="text-center"><input type="checkbox" name="disp[ter][]" value="<?= $horarios->id ?>"></td>
                  <td class="text-center"><input type="checkbox" name="disp[qua][]" value="<?= $horarios->id ?>"></td>
                  <td class="text-center"><input type="checkbox" name="disp[qui][]" value="<?= $horarios->id ?>"></td>
                  <td class="text-center"><input type="checkbox" name="disp[sex][]" value="<?= $horarios->id ?>"></td>
                  <td class="text-center"><input type="checkbox" name="disp[sab][]" value="<?= $horarios->id ?>"></td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
          <div id="contador" data-value="0"> </div>
        </div>
        <div class="form-group">
          <div class="col-md-1">
            <input type="number" name="totalAula" class="form-control" min="0" readonly>
          </div>
        </div>
        <div class="col-md-12">
          <a class="btn btn-danger active" href="<?= base_url('index.php/Fpa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
          <button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Fim da tabela disponibilidade-->

  <!-- Aqui ocorre a tabela de indisponibilidade-->
  <div id="indisponibilidade" class="row" style="display:none;">
    <div class="col-md-12">
      <div class="table-responsive">
        <form action="<?= site_url('fpa/salvar')?>" method="POST">
          <table class="table">
            <h4 class="text-center">Selecione o dia em que você não estará disponível!</h4>
            <thead>
              <tr>
                <th class="text-center">Segunda</th>
                <th class="text-center">Terça</th>
                <th class="text-center">Quarta</th>
                <th class="text-center">Quinta</th>
                <th class="text-center">Sexta</th>
                <th class="text-center">Sábado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center"><input type="radio" name="indisponibilidade" value="seg"></td>
                <td class="text-center"><input type="radio" name="indisponibilidade" value="ter"></td>
                <td class="text-center"><input type="radio" name="indisponibilidade" value="qua"></td>
                <td class="text-center"><input type="radio" name="indisponibilidade" value="qui"></td>
                <td class="text-center"><input type="radio" name="indisponibilidade" value="sex"></td>
                <td class="text-center"><input type="radio" name="indisponibilidade" value="sab"></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <div class="col-md-12">
        <a class="btn btn-danger active" href="<?= base_url('index.php/Fpa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
        <button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
      </div>
    </div>
  </div>
</div>
