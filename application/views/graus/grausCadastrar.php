 <div class="col-xs=10 col-sm-10 col-md-10">
        <form id="formCadastrar" action="<?= site_url('grau/salvar')?>" method="post">
          <div class="form-group" >

              <label>Nome:</label>
				<input type="text"

                class="form-control"
                id="nome_grau"
                name="nome_grau"

                placeholder="Ex:Tecnólogo"
                value="<?= set_value('nome_grau') ?>"
                />



            </div>
             <?= form_error("nome_grau") ?>

            <div class="form-group">
              <label>Codigo:</label>
              <input type="text"
                class="form-control"
                id="codigo"
                name="codigo"
                placeholder="Código da Modalidade"
                value="<?= set_value('codigo') ?>"
                />
            </div>
            <?= form_error("codigo") ?>
			<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Grau')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Voltar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
        </form>
 </div>
