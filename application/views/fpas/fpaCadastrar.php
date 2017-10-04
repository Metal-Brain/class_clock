<div class="col-md-10 col-lg-10">
   <div style="padding: 0 0 15px 0">

      <div class="row">
          <div class="col-md-12">
              <h2 class="page-header"><strong>FPA</strong></h2>
          </div>
      </div>

        <div class="row">
          <div class="container">
            <div class="col-md-12">
                <h4><strong>Selecione o método desejado:</strong></h4>
            </div>

              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width:171px; height:40px;">Selecionar
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#" id="showDisponibilidade">Disponibilidade</a></li>
                    <li><a href="#" id="showIndisponibilidade">Indisponibilidade</a></li>
                </ul>
              </div>
          </div>
        </div>

        <div id="disponibilidade" class="row" style="display:none;">
          <div class="col-md-offset-1 col-md-10">
            <div class="table-responsive">
              <form action="<?= site_url('fpa/salvar')?>" method="POST">
              <table class="table">
                <thead>
                  <tr >
                    <th class="text-center">Horarios</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sabado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($horarios as $horarios) :?>
                  <tr >
                    <td><?= removerSegundos($horarios->inicio) . '-' . removerSegundos($horarios->fim) ?></td>
                    <td><input type="checkbox" name="disp[seg][]" value="<?= $horarios->id ?>"></td>
                    <td><input type="checkbox" name="disp[ter][]" value="<?= $horarios->id ?>"></td>
                    <td><input type="checkbox" name="disp[qua][]" value="<?= $horarios->id ?>"></td>
                    <td><input type="checkbox" name="disp[qui][]" value="<?= $horarios->id ?>"></td>
                    <td><input type="checkbox" name="disp[sex][]" value="<?= $horarios->id ?>"></td>
                    <td><input type="checkbox" name="disp[sab][]" value="<?= $horarios->id ?>"></td>
                  </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <a class="btn btn-danger active" href="<?= base_url('index.php/Fpa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
            <button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
          </form>
          </div>
        </div>

        <div id="indisponibilidade" class="row" style="display:none;">
          <div class="col-md-offset-1 col-md-10">
            <div class="table-responsive">
              <form action="<?= site_url('fpa/salvar')?>" method="POST">
              <table class="table">
                <h4 class="text-center">Selecione o dia em que você nao estará disponivel!</h4>
                <thead>
                  <tr>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sabado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="radio" name="indisponibilidade" value="seg"></td>
                    <td><input type="radio" name="indisponibilidade" value="ter"></td>
                    <td><input type="radio" name="indisponibilidade" value="qua"></td>
                    <td><input type="radio" name="indisponibilidade" value="qui"></td>
                    <td><input type="radio" name="indisponibilidade" value="sex"></td>
                    <td><input type="radio" name="indisponibilidade" value="sab"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <a class="btn btn-danger active" href="<?= base_url('index.php/Fpa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
            <button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
          </form>
          </div>
        </div>



    </div>
</div>
