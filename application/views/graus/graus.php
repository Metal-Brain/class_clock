<div class="container col-md-10 col-lg-10">
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
      <div class="col-md-12">
      <h2 class="page-header">Modalidade
        <a class="btn btn-success" href="<?= base_url('index.php/Grau/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
      </h2>
      </div>
    </div>
</div>

  <table id="GrauTable" class="table table-striped">
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
      <?php foreach ($graus as $grau) { ?>
      <tr <?php if($grau->deletado_em): echo 'class="danger"'; endif; ?>>
    <!-- <?= ($graus['valid'] ? '<tr>' : '<tr class="danger">') ?>  -->
		  <td><center><?= $grau['nome_grau']; ?></td>
          <td><center><?= $grau['codigo']; ?></td>
	
        <td class="text-center"><?= ( empty($grau->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
          <td class="text-center">

            <a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('grau/editar/'.$grau->id)?>"></a>
            
            <?php if ( empty($grau->deletado_em) ) : ?> 
              <button class="btn btn-danger" type="button" id="btn-delete" onclick="confirmDelete(<?= $grau->id ?>,'Deseja desativar a modalidade?','deletar')"> <i class="glyphicon glyphicon-remove"></i></button>
            <?php else : ?> 
            <button class="btn btn-success" type="button" id="btn-delete" onclick="confirmDelete(<?= $grau->id ?>,'Deseja ativar a modalidade?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>
            <?php endif; ?>
        </td>
        </tr> 
      <?php } ?>
    </tbody>
  </table>
</div>
