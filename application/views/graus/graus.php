<div class="container col-md-12 col-lg-10">
  <!-- Alertas de sucesso / erro -->
  <div class="row">
    <div class="col-lg-offset-3 col-lg-6">
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success">
          <p class="text-center"><?= $this->session->flashdata('success') ?></p>
        </div>
      <?php elseif ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger">
          <p class="text-center"><?= $this->session->flashdata('danger') ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Início do conteúdo da view-->
  <div class="top-bar" style="padding: 0 0 15px 0">
    <div class="row">
      <div class="col-md-5">
        <div class="input-group">
          <input type="text"
           class="form-control input-filter"
            placeholder="Pesquisar"
            />
          <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        </div>
      </div>
      <div class="col-md-2">
        <a class="btn btn-success" href="<?= base_url('index.php/Grau/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
      </div>
    </div>
  </div>

  <table id="GrauTable" class="table table-striped">
    <thead>
      <tr>
        <th><center>Nome</th>
        <th><center>Código</th>

      </tr>
    </thead>
    <!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
    <tbody>
      <?php foreach ($graus as $grau) { ?>
        <?= ($graus['valid'] ? '<tr>' : '<tr class="danger">') ?>
          <td><center><?= $grau['nome_grau']; ?></td>
          <td><center><?= $grau['codigo']; ?></td>

        <td><center>
          <?php if ($grau['valid']): ?>
            <!-- Esse button editar vai chamar o outro tab-pane editar, não está direcionado pois os dados que ele tenta passar estão com problema, se deixar apeanas o data-toggle= pill e o href editar vai chamar o tabpane -->
            <button type="button"  data-toggle="pill" href="#editar" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whatevernomeCurso="<?= $grau['nome_grau']; ?>" data-whateverid="<?= $grau['id']; ?>" <span class="glyphicon glyphicon-pencil"></span></button>
            <button onClick="exclude(<?= $grau['id'] ?>);" type="button" class="btn btn-danger" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
          <?php else : ?>
            <button onClick="table(<?= $grau['id'] ?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
          <?php endif; ?>
        </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
