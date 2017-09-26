<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
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
<div class="top-bar" style="padding: 0 0 15px 0">
    <div class="row">
         <div class="col-md-12">
              <h2 class="page-header">Modalidade
                <a class="btn btn-success" title="Cadastrar" href="<?= base_url('index.php/Modalidade/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
              </h2>
         </div>
    </div>
</div>

<table id="ModalidadeTable" class="table table-striped">
      <thead>
        <tr>
          <th><center>Nome</th>
          <th><center>Código</th>
          <th></th>
          <th></th>
        </tr>
      </thead>

    <!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
      <tbody>
            <?php foreach ($modalidades as $modalidade) { ?>
        <tr <?php if($modalidade->deletado_em): echo 'class="danger"'; endif; ?>>
    <!-- <?= ($modalidades['valid'] ? '<tr>' : '<tr class="danger">') ?>  -->
		      <td><center><?= $modalidade['nome_modalidade']; ?></td>
          <td><center><?= $modalidade['codigo']; ?></td>

          <td class="text-center"><?= ( empty($modalidade->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
          <td class="text-center">



            <?php if ( empty($modalidade->deletado_em) ) : ?>
              <a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('modalidade/editar/'.$modalidade->id)?>"></a>
              <button class="btn btn-danger" title="Desativar" type="button" id="btn-delete" onclick="confirmDelete(<?= $modalidade->id ?>,'Deseja desativar a modalidade?','deletar')" > <i class="glyphicon glyphicon-remove"></i></button>
            <?php else : ?>
              <a class="btn btn-warning glyphicon glyphicon-pencil disabled" title="Editar" href="<?= site_url('modalidade/editar/'.$modalidade->id)?>"></a>
              <button class="btn btn-success" title="Ativar" type="button" id="btn-delete" onclick="confirmDelete(<?= $modalidade->id ?>,'Deseja ativar a modalidade?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>
            <?php endif; ?>
        </td>
      </tr>
            <?php } ?>
    </tbody>
  </table>
</div>
