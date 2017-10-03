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
	<form class="formPeriodos" action="<?= site_url('periodo/salvar')?>" method="post">
		<label>Ano e semestre:</label>
		<div class="form-group width-400">
			<input id="nome" name="nome" class="form-control" type="text" placeholder="Ano e semestre" onkeyup="mascara(this,somenteNumeros);"  value="<?= set_value('nome')?>" maxlength="5">
			<span class="text-danger">
				<?= form_error('nome') ?>
			</span>
		</div>

		<div class="form-group">
			<a class="btn btn-danger active" href="<?= base_url('index.php/periodo')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
			<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
		</div>
	</form>
</div>