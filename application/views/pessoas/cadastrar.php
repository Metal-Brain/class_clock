<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<form id="formPessoas" action="<?= site_url('pessoa/salvar')?>" method="post">
		<div class="row">
			<div class="col-md-5 form-group">
				<label>Nome:</label>
				<input id="nome" name="nome" class="form-control" type="text" placeholder="Nome" value="<?= set_value('nome')?>">
				<?= form_error('nome') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 form-group">
				<label>Prontuário:</label>
				<input id="prontuario" name="prontuario" class="form-control" type="text" placeholder="Prontuário" maxlength="6" value="<?= set_value('prontuario')?>">
				<?= form_error('prontuario') ?>
			</div>
			
			<div class="col-md-3 form-group">
				<label>Senha:</label>
				<input id="senha" name="senha" class="form-control" type="text" placeholder="Senha" maxlength="6" value="<?= set_value('senha')?>">
				<?= form_error('senha') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 form-group">
				<label>Data de nascimento:</label>
				<input id="data_nascimento" name="data_nascimento" class="form-control" type="date" value="<?= set_value('data_nascimento')?>">
				<?= form_error('data_nascimento') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 form-group">
				<label>E-mail:</label>
				<input id="email" name="email" class="form-control" type="email" placeholder="E-mail" value="<?= set_value('email')?>">
				<?= form_error('email') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/pessoa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
	</form>
</div>
