 <div class="container" style="margin-top: 150px;">
    <div class="row">
      <div class="col-xs=12 col-sm-12 col-md-12">
        <form id="formGrau"  method="Post" >
          <div class="col-xs-10 col-sm-6 col-md-6"  style="margin-right:500px;">
            <div class="form-group">
              <label>Nome:</label>
              <input type="text"
                pattern="[a-zA-Z\s]+$"
                class="form-control"
                id="nome"
                name="nome"
                required="required"
                placeholder="Ex:Tecnólogo"
                value="<?= set_value('nome_grau') ?>"
                />


            </div>
          </div>

          <div class="col-xs-6 col-sm-3 col-md-3">
            <div class="form-group">
              <label>Codigo:</label>
              <input type="number"
                class="form-control"
                id="codigo"
                name="codigo"
                placeholder="Código da Modalidade"
                value="<?= set_value('codigo') ?>"
                />
            </div>

          </div>
      	<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Grau')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
        </form>
      </div>

    </div>
  </div>
