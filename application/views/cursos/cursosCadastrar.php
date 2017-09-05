 <div class="col-xs=10 col-sm-10 col-md-10">
								<form  name="formCurso" method="post" action="<?= site_url('curso/cadastrar')?>">
										<div class="row">	
											<div class="col-xs-12 col-sm-12 col-md-11 form-group">
										
												<label>Nome:</label>
												<input class="form-control" placeholder="Nome" name="nome" id="nome" maxlength="75" required>
												
											</div>
										</div>
										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('nome') ?>
										  </div>
										</div>

										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
											<label>Sigla</label>
												<input class="form-control" placeholder="ex: ADS" name="sigla" id="sigla" maxlength="3" required>
																		
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('sigla') ?>
										  </div>
										</div>
										
										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
											<label>Codigo</label>
												<input class="form-control" placeholder="ex: 123" type="number" name="codigo" id="codigo" maxlength="5"required>
																		
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('codigo') ?>
										  </div>
										</div>


										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
												<label>Quantidade de semestres</label>
												<input class="form-control" placeholder="ex: 2" type="number" name="qtdSemestres" id="qtdSemestres" maxlength="2" required>
												
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('qtdSemestres') ?>
										  </div>
										</div>
										<div class="row">	
										
											<div class="col-xs-12 col-sm-12 col-md-11 form-group">
												<label>Fechamento</label><br>
												<label><input type="radio" name="fechamento" id="radioBimestral" value="Bimestral">Bimestral</label>
												<label><input type="radio" name="fechamento" id="radioSemestral" value="Semestral">Semestral</label>
											</div>
										</div>
										
										<div class="row">
											<div class="form-group col-sm-5 col-md-4">
												<label>modalidade</label>
												<?= form_dropdown('modalidade', $graus, set_value('modalidade'), array('class' => 'form-control')) ?>
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('modalidade') ?>
										  </div>
										</div>
										
										<div class="row">
											<div class="col-md-12 form-group">
												<a class="btn btn-danger active" href="<?= base_url('index.php/Grau')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
												<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
											</div>
										</div>
										
								</form>
											
							</div>