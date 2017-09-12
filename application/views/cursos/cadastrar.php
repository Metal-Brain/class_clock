<!--<pre>
		<?php print_r($grau_id) ?>
</pre> -->
 <div class="col-xs=10 col-sm-10 col-md-10">
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
								<form  id="formCurso" name="formCurso" method="post" action="<?= site_url('curso/salvar')?>">
                                        <h1>Cadastrar Curso</h1>
										<div class="row">	
											<div class="col-xs-12 col-sm-12 col-md-11 form-group">
										
												<label>Nome:</label>
												<input class="form-control" placeholder="Nome" name="nome_curso" id="nome_curso" maxlength="75">
												
											</div>
										</div>
										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('nome_curso') ?>
										  </div>
										</div>

										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
											<label>Sigla</label>
												<input class="form-control" placeholder="ex: ADS" name="sigla_curso" id="sigla_curso" maxlength="3">
																		
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('sigla_curso') ?>
										  </div>
										</div>
										
										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
											<label>Codigo</label>
												<input class="form-control" placeholder="ex: 123" type="number" name="codigo_curso" id="codigo_curso" maxlength="5">
																		
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('codigo_curso') ?>
										  </div>
										</div>


										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
												<label>Quantidade de semestres</label>
												<input class="form-control" placeholder="ex: 2" type="number" name="qtd_semestre" id="qtd_semestre" maxlength="2">
												
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('qtd_semestre') ?>
										  </div>
										</div>
										<div class="row">	
										
											<div class="col-xs-12 col-sm-12 col-md-11 form-group">
												<label>Fechamento</label><br>
												<label><input type="radio" name="fechamento" id="radioBimestral" value="B" checked>Bimestral</label>
												<label><input type="radio" name="fechamento" id="radioSemestral" value="S">Semestral</label>
											</div>
										</div>
										
										<div class="row">
											<div class="form-group col-sm-5 col-md-4">
												<label>Modalidade</label>
												<select name="grau_id">
												
												<?php
													foreach($data as $grau){
														echo '<option value="'. $grau['id'] .'">'. $grau['nome_grau'] .'</option>';}
												?>
												</select>
												
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error">
											<?= form_error('grau_id') ?>
										  </div>
										</div>
									
										<div class="row">
											<div class="col-md-12 form-group">
												<a class="btn btn-danger active" href="<?= base_url('index.php/Curso')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
												<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
											</div>
										</div>
										
								</form>
												<!--<button onclick="myFunction()">Try it</button> -->
							</div>