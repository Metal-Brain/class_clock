<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-top: 5px">
	<form id="formTurnos" method="post" action="<?= site_url('turno/atualizar/'.$id)?>">
		<div class="row">
			<div class="col-md-5 form-group">
				<label>Nome:</label>
				<input name="nome_turno" class="form-control" placeholder="Nome" value="<?= htmlspecialchars(ucwords($turno->nome_turno))?>">
				<?= form_error('nome_turno') ?>
			</div>
		</div>

		<div id="horarios">
			<button id="btnAdd" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar Aula</button>

		</div>

	<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<form method="post">
								<div class="col-xs-12 col-sm-12 col-md-12 form-group">
									<div class="col-xs-12 col-sm-12 col-md-12" style="height: 40px;"></div>
										<label>Nome:</label>
										<input name="nome_turno" class="form-control" placeholder="Nome" required maxlength="20" value="<?= $turno->nome_turno?>">
										<?= form_error('nome_turno') ?>
								</div>

								<div class="col-xs-12 col-sm-12 col-md-12 form-group"></div>
									<?php foreach ($turno->horarios as $horario) : ?>
										<div class="col-xs-2 col-sm-2 col-md-2 form-group">
											<label >Horario de entrada:</label>
											<input name="horario[]" class="form-control" type="time" value="<?= $horario->inicio ?>">
										</div>

										<div class="col-xs-2 col-sm-2 col-md-2 form-group">
											<label >Horario de saida:</label>
											<input name="horario[]" class="form-control" type="time" value="<?= $horario->fim ?>">
										</div>

									<?php endforeach; ?>

								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 form-group">
									<button type="submit" class="btn btn-primary btn-lg active" >Cadastrar</button>
								</div>

		<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Turno')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
	</form>
</div>
