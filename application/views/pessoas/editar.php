<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<form id="formPessoas" method="post" action="<?= site_url('pessoa/atualizar/'.$pessoa->id)?>">
		<div class="row">
			<div class="col-md-5 form-group">
				<label>Nome:</label>
				<input id="nome" name="nome" class="form-control" type="text" placeholder="Nome" value="<?= $pessoa->nome ?>">
				<?= form_error('nome') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 form-group">
				<label>Prontuário:</label>
				<input id="prontuario" name="prontuario" class="form-control" type="text" placeholder="Prontuário" maxlength="6" value="<?= $pessoa->prontuario ?>">
				<?= form_error('prontuario') ?>
			</div>

			<div class="col-md-3 form-group">
				<label>Senha:</label>
				<input id="senha" name="senha" class="form-control" type="text" minlength="6">
				<?= form_error('senha') ?>
			</div>
		</div>
		<!-- SOMENTE PARA DOCENTE
		<div class="row">
			<div class="col-md-2 form-group">
				<label>Data de nascimento:</label>
				<input id="nascimento" name="nascimento" class="form-control" type="date" value="<?= $pessoa->nascimento ?>">
				<?= form_error('nascimento') ?>
			</div>
		</div> -->
		<div class="row">
			<div class="col-md-5 form-group">
				<label>E-mail:</label>
				<input id="email" name="email" class="form-control" type="email" placeholder="E-mail" value="<?= $pessoa->email ?>">
				<?= form_error('email') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 form-group">
				<label>Tipo:</label>
				<div class="checkbox" style="margin-top: 0px;">
					<label><input <?= in_array(1, $tipos_pessoa)?"checked":"" ?> name="tipos[]" type="checkbox" value="1">Administrador</label>
					<label><input <?= in_array(2, $tipos_pessoa)?"checked":"" ?> name="tipos[]" type="checkbox" value="2">CRA</label>
					<label><input <?= in_array(3, $tipos_pessoa)?"checked":"" ?> name="tipos[]" type="checkbox" value="3">DAE</label>
					<label><input <?= in_array(4, $tipos_pessoa)?"checked":"" ?> name="tipos[]" type="checkbox" value="4">Docente</label>
				</div>
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
