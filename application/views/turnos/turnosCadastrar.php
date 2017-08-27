<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<form id="formTurnos" action="<?= site_url('turno/cadastrar')?>" method="post">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 form-group">
					<label>Nome:</label>
					<input id="nome_turno" name="nome_turno" class="form-control" type="text" placeholder="Nome" maxlength="20" required value="<?= set_value('nome_turno')?>">
					<?= form_error('nome_turno') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 form-group">
					<button id="btnAdd" type="button" class="btn btn-primary btn-success add-field" style="background: green; ">+ Adicionar Aula</button>
					<button id="btnRemove" type="button" class="btn btn-primary btn-success add-field" style="background: red; ">- Remover Aula</button>
				</div>
			</div>
			<div class="row aux" id="linha">
				<div class="col-xs-12 col-sm-12 col-md-1">
					<label style="padding: 8px 0 0 0;">Aula 1</label>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 form-group">
					<input id="inicio" name="horario[0]" class="form-control hora" type="text" placeholder="Início" minlength="5" maxlength="5" required>
					<?= form_error('horario') ?>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 form-group">
					<input id="fim" name="horario[1]" class="form-control hora" type="text" placeholder="Fim" minlength="5" maxlength="5" required>
					<?= form_error('horario[]') ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				<button type="submit" class="btn btn-primary btn-lg active cadastrar" >Cadastrar</button>
			</div>
		</form>
	</div>
</div>