<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro das Salas</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
	</head>
    <body>
      <p class="alert-success"><?= $this->session->flashdata("success") ?></p>
      <p class="alert-danger"><?= $this->session->flashdata("danger") ?></p>
      <h1> Salas </h1>
    <table class="table">
    <?php foreach ($salas as $sala) : ?>
      <tr>
          <td><?= $sala["nSala"]?></td>
          <td><?= $sala["capMax"]?></td>
          <td><?= $sala["tipo"]?></td>
      </tr>
    <?php endforeach ?>
  </table>


<?php /*
  <h1>Cadastro</h1>
  <form action="" method="post">
  								<div class="form-group percent-40 inline">
  									<label>nSALA</label>
  									<input type="text" class="form-control" name="nSala" placeholder="Nome" value="<?= set_value('nSala')?>">
  									<?= form_error('nSala') ?>
  								</div>
  								<div class="form-group percent-10 inline">
  									<label>CAPMAX</label>
  									<input type="text" class="form-control" name="capMax" placeholder="ex: LOPA1" value="<?= set_value('capMax')?>">
  									<?= form_error('capMax') ?>
  								</div>
  								<div class="form-group">
  									<label>TIPO</label>
  									<input type="text" class="form-control percent-5" name="tipo" placeholder="ex: 1" value="<?= set_value('tipo')?>">
  									<?= form_error('tipo') ?>
  								</div>
  								<div class="inline">
  									<button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
  									<button type='button' class='btn bt-lg btn-default'>Cancelar</button>
  								</div>

       </form> */?>
       <br>
       <br>
       <br>
       <br>
       <h1>Atualizar</h1>
       <form method="post" action="<?=base_url('')?>" enctype="multipart/form-data">
             <div>
               <label>nSala:</label>
               <input type="text" name="nome" value="<?=$sala['nSala']?>" required/>
             </div>
             <div>
               <label>capMa:</label>
               <input type="text" name="capMax" value="<?=$sala['capMax']?>" required/>
             </div>
             <div>
               <label>tipo:</label>
               <input type="text" name="tipo" value="<?=$sala['tipo']?>" required/>
             </div>
           <div>             
             <input type="hidden" name="id" value="<?=$sala['id']?>"/>
             <input type="submit" class="btn btn-danger" value="Atualizar" />
           </div>
         </form>
</body>

</html>
