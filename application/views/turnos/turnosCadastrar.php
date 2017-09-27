<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<form id="formTurnos" action="<?= site_url('Turno/salvar')?>" method="post">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-5 form-group">
				<label>Nome:</label>
				<input id="nome_turno" name="nome_turno" class="form-control" type="text" placeholder="Nome" value="<?= set_value('nome_turno')?>">
				<?= form_error('nome_turno') ?>
			</div>
		</div>
		<div class="row" id="turnoCadastrar">
			<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				<button id="btnAdd" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar Aula</button>
			</div>
		</div>
		<div id="horarios">

			<?= form_error('horario[]') ?>
		</div>
		<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Turno')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
	</form>
	<!--div class="container" style="padding-top: 5px"-->
</div>
