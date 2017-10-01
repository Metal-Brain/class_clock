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

	<!-- Formulário para inserção de dados da view-->
	<form class="formAreas" action="<?= site_url('area/salvar')?>" method="post">
		<label>Código</label>
		<div class="form-group">
			<input id="codigo" name="codigo" class="form-control" type="number" placeholder="Código" value="<?= set_value('codigo')?>">
			<span class="text-danger">
				<?= form_error('codigo') ?>
			</span>
		</div>

		<label>Área</label>
		<div class="form-group">
			<input id="nome_area" name="nome_area" class="form-control" type="text" placeholder="Área"  value="<?= set_value('nome_area')?>">
			<span class="text-danger">
				<?= form_error('nome_area') ?>
			</span>
		</div>

		<div class="form-group">
			<a class="btn btn-danger active" href="<?= base_url('index.php/area')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
			<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
		</div>
	</form>
</div>
