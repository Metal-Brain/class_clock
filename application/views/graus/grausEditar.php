 <div class="col-xs=10 col-sm-10 col-md-10">
        <form id="formEditar" method="post" action="<?= site_url('grau/atualizar/'.$id)?>">
          <div class="form-group" >

              <label>Nome:</label>
				<input type="text"

                class="form-control"
                id="nome_grau"
                name="nome_grau"

                placeholder="Ex:Tecnólogo"
                value="<?= $grau->nome_grau?>"
                />


            </div>


            <div class="form-group">
              <label>Codigo:</label>
              <input type="text"
                class="form-control"
                id="codigo"
                name="codigo"
                value="<?=htmlspecialchars($grau->codigo)?>"
                />
            </div>

			<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Grau')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
        </form>
 </div>
