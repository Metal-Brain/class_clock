<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<!-- Alertas de sucesso / erro -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="alert alert-danger">
					<p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Início do conteúdo da view-->
	<form class="formPessoas" action="<?= site_url('pessoa/salvar')?>" method="post">
		<label>Nome:</label>
		<div class="form-group width-400">

			<input id="nome" name="nome" class="form-control" type="text" placeholder="Nome" value="<?= set_value('nome')?>">
			<span class="text-danger">
				<?= form_error('nome') ?>
			</span>
		</div>

		<label>Prontuário:</label>
		<div class="form-group width-180">
			<input id="prontuario" name="prontuario" class="form-control" type="text" placeholder="Prontuário" maxlength="6" value="<?= set_value('prontuario')?>">
			<span class="text-danger">
				<?= form_error('prontuario') ?>
			</span>
		</div>

		<label>Senha:</label>
		<div class="form-group width-180">
			<input id="senha" name="senha" class="form-control" type="password" placeholder="Senha" value="<?= set_value('senha')?>">
			<span class="text-danger">
				<?= form_error('senha') ?>
			</span>
		</div>

		<label>E-mail:</label>
		<div class="form-group width-400">
			<input id="email" name="email" class="form-control" type="email" placeholder="E-mail" value="<?= set_value('email')?>">
			<span class="text-danger">
				<?= form_error('email') ?>
			</span>
		</div>

		<label>Tipo:</label>
		<div class="form-group">
			<div class="checkbox" style="margin-top: 0px;">
				<label><input <?= set_checkbox('tipos[]', 1) ?> name="tipos[]" type="checkbox" value="1" >Administrador</label>
				<label><input <?= set_checkbox('tipos[]', 2) ?> name="tipos[]" type="checkbox" value="2">CRA</label>
				<label><input <?= set_checkbox('tipos[]', 3) ?> name="tipos[]" type="checkbox" value="3">DAE</label>
				<label><input <?= set_checkbox('tipos[]', 4) ?> name="tipos[]" type="checkbox" value="4" class="checkdocente-toggle" >Docente</label>
			</div>
			<span class="text-danger">
				<?= form_error('tipos[]') ?>
			</span>
		</div>

		<!-- Docente -->
		<div class="conteudo-docente" style="display: none;">
			<label>Data de nascimento:</label>
			<div class="form-group width-180">
				<input id="nascimento" name="nascimento" class="form-control" type="date" value="<?= set_value('nascimento')?>">
				<span class="text-danger">
					<?= form_error('nascimento') ?>
				</span>
			</div>

			<label>Data de ingresso no câmpus:</label>
			<div class="form-group width-180">
				<input id="ingresso_campus" name="ingresso_campus" class="form-control" type="date" value="<?= set_value('ingresso_campus')?>">
				<span class="text-danger">
					<?= form_error('ingresso_campus') ?>
				</span>
			</div>

			<label>Data de ingresso no IFSP:</label>
			<div class="form-group width-180">
				<input id="ingresso_ifsp" name="ingresso_ifsp" class="form-control" type="date" value="<?= set_value('ingresso_ifsp')?>">
				<span class="text-danger">
					<?= form_error('ingresso_ifsp') ?>
				</span>
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
			<div class="form-group">
				<label class="radio-inline"><input type="radio" name="regime" <?= set_radio('regime', '0') ?> value="0">20 horas semanais</label>
				<label class="radio-inline"><input type="radio" name="regime" <?= set_radio('regime', '1') ?> value="1">40 horas semanais</label>
				<span class="text-danger">
					<?= form_error('regime') ?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<a class="btn btn-danger active" href="<?= base_url('index.php/pessoa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
			<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
		</div>
	</form>
</div>