 <div class="container" style="margin-top: 150px;">
    <div class="row">
      <div class="col-xs=12 col-sm-12 col-md-12">
        <form id="formGrau" method="Post" >
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
          <div class="col-xs-12 col-sm-12 col-md-12">
                          <button type="submit" class="btn btn-primary btn-lg active" style="margin-top: 30px;">Confirmar</button>
                          <button type="button" class="btn btn-danger btn-lg active" style="margin-top: 30px;">Deletar</button>
                      </div>
        </form>
      </div>

    </div>
  </div>
