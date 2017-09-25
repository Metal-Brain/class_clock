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
	<form class="formPeriodos" method="post" action="<?= site_url('periodo/atualizar/'.$periodo->id)?>">
		<div class="form-group width-400">
			<label>Nome:</label>
			<input id="nome_editar" name="nome" class="form-control" type="text" placeholder="Nome" value="<?= htmlspecialchars($periodo->nome) ?>">
			<?= form_error('nome') ?>
		</div>

		<div class="form-group">
			<a class="btn btn-danger active" href="<?= base_url('index.php/periodo')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
			<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
		</div>
	</form>
</div>