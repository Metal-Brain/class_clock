<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<form id="formTurnos" action="<?= site_url('Turno/salvar')?>" method="post">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-5 form-group">
				<label>Nome:</label>
				<input id="nome_turno" name="nome_turno" class="form-control" type="text" placeholder="Nome" value="<?= set_value('nome_turno')?>">
				<?= form_error('nome_turno') ?>
			</div>
		</div>
		<div class="row" id="turnoCadastrar">
			<div class="col-xs-12 col-sm-12 col-md-12 form-group">
				<button id="btnAdd" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar Aula</button>
			</div>
		</div>
		<div id="horarios">

			<?php if ( form_error('horario[]') ) : ?>
				<div class="alert alert-danger alert-dismissible text-center" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<p><strong>Foram encontrados erro nos horários de aula</strong></p>
					<?= form_error('horario[]') ?>
				</div>
			<?php endif; ?>

			<?php $horarios = set_value('horario'); ?>
			<?php $aula = 0; ?>
			<?php if($horarios != ""): ?>
			<?php for ($i = 0; $i < count($horarios); $i += 2): ?>
					<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-1 form-group">
						<p class="aula"><strong>Aula <?= ++$aula ?></strong></p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-2 form-group">
						<label >Horário de entrada:</label>
						<input name="horario[<?= $i ?>]" class="form-control hora" type="text" value="<?= $horarios[$i] ?>">
					</div>
				<div class="col-xs-12 col-sm-12 col-md-2 form-group">
					<label >Horário de saída:</label>
					<input name="horario[<?= ($i+1) ?>]" class="form-control hora" type="text" value="<?= $horarios[$i+1] ?>">
				</div>
				<div col-md-2 style="padding: 25px 0 0 0;">
					<button id="btnRemove" type="button" class="btn btn-danger add-field"><span class="glyphicon glyphicon-remove"></span></button>
				</div>
			</div>
		<?php endfor;endif; ?>


		</div>
		<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Turno')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
	</form>
	<!--div class="container" style="padding-top: 5px"-->
</div>
