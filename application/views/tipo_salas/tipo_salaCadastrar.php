<div class="container col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-top: 5px">
	
	<form id="formTipo_Sala" action="<?= site_url('tipo_sala/cadastrar')?>" method="post">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-5 form-group">
				<label>Nome:</label>
				<input id="nome_tipo_sala" name="nome_tipo_sala" class="form-control" type="text" placeholder="Nome" maxlength="20" required value="<?= set_value('nome_tipo_sala')?>">
				<?= form_error('nome_tipo_sala') ?>
			</div>
		</div>
        <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-5 form-group">
				<label>Descrição:</label>
				<input id="descricao_tipo_sala" name="descricao_tipo_sala" class="form-control" type="text" placeholder="Descrição" maxlength="20" required value="<?= set_value('descricao_tipo_sala')?>">
				<?= form_error('descricao_tipo_sala') ?>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-5 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Tipo_Sala')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
		
	</form>
</div>