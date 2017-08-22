<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    Teste OK!
  </body>
</html>
<form class="" action="" method="post">
  <div class="row">
    <div class="form-group col-md-4">
      <input type="text" maxlength="5" class="form-control" name="nome_grau" placeholder="ex: 4" value="<?= set_value('nome_grau') ?>" required style="width: 100px">
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 margin-top-error">
      <?= form_error('qtdAulas') ?>
    </div>
  </div>


          <div class="inline">
              <button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
          </div>
      </form>
  </div>
</form>
