<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-top: 5px">
	<form id="formAreas" method="post" action="<?= site_url('area/atualizar/'.$id)?>">
		<div class="row">
			<div class="col-md-6 form-group">
				<label>Código</label>
				<input name="codigo" class="form-control" placeholder="Código" type="number" value="<?= htmlspecialchars(ucwords($area->codigo))?>">
				<?= form_error('codigo') ?>
        <br>
				<input name="nome_area" class="form-control" placeholder="Área" value="<?= htmlspecialchars(ucwords($area->nome_area))?>">
				<?= form_error('nome_area') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/area')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
	</form>
</div>
