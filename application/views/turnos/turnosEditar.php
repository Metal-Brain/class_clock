<div class="container col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-top: 5px">
	<form id="formTurnos" method="post" action="<?= site_url('turno/atualizar/'.$id)?>">
		<div class="row">
			<div class="col-md-5 form-group">
				<label>Nome:</label>
				<input name="nome_turno" class="form-control" placeholder="Nome" value="<?= $turno->nome_turno?>">
				<?= form_error('nome_turno') ?>
			</div>
		</div>
		<?php $index = 0; ?>
		<?php foreach ($turno->horarios as $horario) : ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-2 form-group">
					<label >Horário de entrada:</label>
					<input name="horario[<?= $index++; ?>]" class="form-control hora" type="time" value="<?= substr($horario->inicio, 0, -3); ?>">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 form-group">
					<label >Horário de saída:</label>
					<input name="horario[<?= $index++; ?>]" class="form-control hora" type="time" value="<?= substr($horario->fim, 0, -3); ?>">
				</div>
			</div>
		<?php endforeach; ?>

		<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Turno')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
	</form>
</div>
