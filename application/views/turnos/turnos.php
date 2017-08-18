

	<!-- TODO: Falta colocar os nome, values e outros paramatros nos inputs -->


		<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<form method="post">
								<div class="col-xs-12 col-sm-12 col-md-12 form-group">
										<div class="col-xs-12 col-sm-12 col-md-12" style="height: 40px;"></div>
										<label>Nome:</label>
										<input name="nome_turno" class="form-control" placeholder="Nome">
										<?= form_error('nome_turno') ?>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 form-group">
										<label>Quantidade de aulas:</label>
										<input class="form-control"  placeholder="Informe a quantidade">
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 form-group">
									<label >Horario de entrada da aula:</label>
									<select name="inicio" class="form-control">
										<option>Selecionar</option>
										<option>07:00 às 12:00</option>
										<option>13:00 às 18:00</option>
										<option>19:00 às 23:00</option>
									</select>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 form-group">
									<button type="submit" class="btn btn-primary btn-lg active" >Cadastrar</button>
								</div>

						</form>
					</div>
				</div>
		</div>
