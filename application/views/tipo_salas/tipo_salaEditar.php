	<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-10">
						<form method="post">
								<div class="col-xs-12 col-sm-12 col-md-12 form-group">
									<div class="col-xs-12 col-sm-12 col-md-12" style="height: 40px;"></div>
										<label>Nome:</label>
										<input name="nome_tipo_sala" class="form-control" placeholder="Nome" required maxlength="20" value="<?= $tipo_salas->nome_tipo_sala?>">
										<?= form_error('nome_tipo_sala') ?>
								</div>
                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12" style="height: 40px;"></div>
                                            <label>Descrição:</label>
                                            <input name="descricao_tipo_sala" class="form-control" placeholder="Nome" required maxlength="20" value="<?= $tipo_salas->descricao_tipo_sala?>">
                                            <?= form_error('descricao_tipo_sala') ?>
                                    </div>

								
								<div class="col-md-10 form-group">
									<button type="submit" class="btn btn-primary btn-lg active" >Cadastrar</button>
								</div>

						</form>
					</div>
				</div>
		</div>
