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
	<form class="formPessoas" method="post" action="<?= site_url('pessoa/atualizar/'.$pessoa->id)?>">
		<div class="form-group width-400">
			<label>Nome:</label>
			<input id="nome_editar" name="nome" class="form-control" type="text" placeholder="Nome" value="<?= htmlspecialchars($pessoa->nome) ?>">
			<?= form_error('nome') ?>
		</div>

		<div class="form-group width-180">
			<label>Prontuário:</label>
			<input id="prontuario_editar" name="prontuario" class="form-control" type="text" placeholder="Prontuário" maxlength="6" value="<?= $pessoa->prontuario ?>">
			<?= form_error('prontuario') ?>
		</div>

		<div class="form-group width-180">
			<label>Senha:</label>
			<input id="senha_editar" name="senha" class="form-control" type="text" minlength="6">
			<?= form_error('senha') ?>
		</div>

		<div class="form-group width-400">
			<label>E-mail:</label>
			<input id="email_editar" name="email" class="form-control" type="email" placeholder="E-mail" value="<?= $pessoa->email ?>">
			<?= form_error('email') ?>
		</div>

		<div class="form-group">
			<label>Tipo:</label>
			<div class="checkbox" style="margin-top: 0px;">
				<label><input <?= in_array(1, $tipos_pessoa)?"checked":"" ?> name="tipos[]" type="checkbox" value="1">Administrador</label>
				<label><input <?= in_array(2, $tipos_pessoa)?"checked":"" ?> name="tipos[]" type="checkbox" value="2">CRA</label>
				<label><input <?= in_array(3, $tipos_pessoa)?"checked":"" ?> name="tipos[]" type="checkbox" value="3">DAE</label>
				<label><input <?= in_array(4, $tipos_pessoa)?"checked":"" ?> name="tipos[]" type="checkbox" value="4" class="checkdocente-toggle">Docente</label>
			</div>
		</div>

		<!-- Docente -->
		<div class="conteudo-docente" style="display: none;">
			<label>Data de nascimento:</label>
			<div class="form-group width-180">
				<input id="nascimento_editar" name="nascimento" class="form-control data" value="<?= @$pessoa->docente->nascimento ?>">
				<?= form_error('nascimento') ?>
			</div>

			<label>Data de ingresso no câmpus:</label>
			<div class="form-group width-180">
				<input id="ingresso_campus_editar" name="ingresso_campus" class="form-control data" value="<?= @$pessoa->docente->ingresso_campus ?>">
				<?= form_error('ingresso_campus') ?>
			</div>

			<label>Data de ingresso no câmpus:</label>
			<div class="form-group width-180">
				<input id="ingresso_ifsp_editar" name="ingresso_ifsp" class="form-control data" value="<?= @$pessoa->docente->ingresso_ifsp ?>">
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

			<!-- VERIFICAR COMO TRAZER QUAL ESTAVA MARCADO -->
			<label>Regime de contrato:</label>
			<div class="form-group">
				<label class="radio-inline"><input <?= @$pessoa->docente->regime == 0 ?"checked":"" ?> type="radio" name="regime" value="0">20 horas semanais</label>
				<label class="radio-inline"><input <?= @$pessoa->docente->regime == 1 ?"checked":"" ?> type="radio" name="regime" value="1">40 horas semanais</label>
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
