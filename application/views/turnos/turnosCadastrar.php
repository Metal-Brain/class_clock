<div class="container col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-top: 5px">
	<form id="formTurnos" action="<?= site_url('turno/salvar')?>" method="post">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-5 form-group">
				<label>Nome:</label>
				<input id="nome_turno" name="nome_turno" class="form-control" type="text" placeholder="Nome" value="<?= set_value('nome_turno')?>">
				<?= form_error('nome_turno') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				<button id="btnAdd" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar Aula</button>
				<button id="btnRemove" type="button" class="btn btn-danger add-field"><span class="glyphicon glyphicon-minus"></span> Remover Aula</button>
			</div>
		</div>
		<div class="row aux" id="linha">
			<div class="col-xs-12 col-sm-12 col-md-1">
				<label style="padding: 8px 0 0 0;">Aula 1</label>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2 form-group">
				<input id="inicio" name="horario[0]" class="form-control hora" type="text" placeholder="Início">
				<?= form_error('horario[]') ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2 form-group">
				<input id="fim" name="horario[1]" class="form-control hora" type="text" placeholder="Fim">
				<?= form_error('horario[]') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Turno')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
	</form>
</div>
