<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<form id="formPessoas" action="<?= site_url('pessoa/salvar')?>" method="post">
		<label>Nome:</label>
		<div class="form-group width-400">
			<input id="nome" name="nome" class="form-control" type="text" placeholder="Nome" value="<?= set_value('nome')?>">
			<?= form_error('nome') ?>
		</div>

		<label>Prontuário:</label>
		<div class="form-group width-180">
			<input id="prontuario" name="prontuario" class="form-control" type="text" placeholder="Prontuário" maxlength="6" value="<?= set_value('prontuario')?>">
			<?= form_error('prontuario') ?>
		</div>

		<label>Senha:</label>
		<div class="form-group width-180">
			<input id="senha" name="senha" class="form-control" type="password" placeholder="Senha" value="<?= set_value('senha')?>">
			<?= form_error('senha') ?>
		</div>

		<label>E-mail:</label>
		<div class="form-group width-400">
			<input id="email" name="email" class="form-control" type="email" placeholder="E-mail" value="<?= set_value('email')?>">
			<?= form_error('email') ?>
		</div>


		<label>Tipo:</label>
		<div class="form-group">
			<div class="checkbox" style="margin-top: 0px;">
				<label><input name="tipos[]" type="checkbox" value="1">Administrador</label>
				<label><input name="tipos[]" type="checkbox" value="2">CRA</label>
				<label><input name="tipos[]" type="checkbox" value="3">DAE</label>
				<label><input name="tipos[]" class ="checkdocente-toggle" type="checkbox" value="4" data-element="#conteudo-docente"> Docente</label>
			</div>
		</div>

		<!-- Docente -->
		<div id="conteudo-docente">
			<label>Data de nascimento:</label>
			<div class="form-group width-180">
				<input id="nascimento" name="nascimento" class="form-control" type="date" value="<?= set_value('nascimento')?>">
				<?= form_error('nascimento') ?>
			</div>

			<label>Data de ingresso no câmpus:</label>
			<div class="form-group width-180">
				<input id="ingresso_campus" name="ingresso_campus" class="form-control" type="date" value="<?= set_value('ingresso_campus')?>">
				<?= form_error('ingresso_campus') ?>
			</div>

			<label>Data de ingresso no câmpus:</label>
			<div class="form-group width-180">
				<input id="ingresso_ifsp" name="ingresso_ifsp" class="form-control" type="date" value="<?= set_value('ingresso_ifsp')?>">
				<?= form_error('ingresso_ifsp') ?>
			</div>

			<!-- <label>Área:</label>
			<div class="form-group width-180">
				<div class="dropdown">
					<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Selecione
					<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#">HTML</a></li>
						<li><a href="#">CSS</a></li>
						<li><a href="#">JavaScript</a></li>
					</ul>
				</div>
			</div> -->

			<label>Regime de contrato:</label>
			<div class="form-group width-180">
				<select class="form-control" id="sel1">
					<option>Selecione</option>
					<option value="0">20 horas semanais</option>
					<option value="1">40 horas semanais</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<a class="btn btn-danger active" href="<?= base_url('index.php/pessoa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
			<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
		</div>
	</form>
</div>
