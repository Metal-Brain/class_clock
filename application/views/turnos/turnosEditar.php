

	<!-- TODO: Falta colocar os nome, values e outros paramatros nos inputs -->


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

						</form>
					</div>
				</div>
		</div>
