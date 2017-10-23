<!--<pre>
		<?php //print_r($data['curso']->docente_id) ?>
    <?php print_r($data['coordenador'][0]->id) ?>
</pre>-->
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
								<form  id="formCurso" name="formCurso" method="post" action="<?= site_url('curso/atualizar/'.$id)?>">
                                        <h1>Editar Curso</h1>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-11 form-group">

												<label>Nome:</label>
												<input class="form-control" placeholder="Nome" name="nome_curso" id="nome_curso" 
												onkeypress="this.value = this.value.toLowerCase();" 
												onChange="this.value = this.value.toLowerCase();" 
												onpaste="this.value = this.value.toLowerCase();" 
												maxlength="75" required value="<?= htmlspecialchars($data['curso']->nome_curso)?>">

											</div>
										</div>
										<div class="row">
										  <div class="col-md-3 margin-top-error error">
											<?= form_error('nome_curso') ?>
										  </div>
										</div>

										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
											<label>Sigla</label>
												<input class="form-control" placeholder="ex: ADS" name="sigla_curso" id="sigla_curso" maxlength="3" required value="<?= htmlspecialchars($data['curso']->sigla_curso)?>">

											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error error">
											<?= form_error('sigla_curso') ?>
										  </div>
										</div>

										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
											<label>Codigo</label>
												<input class="form-control" placeholder="ex: 123" type="number" name="codigo_curso" id="codigo_curso" onKeyPress="var key = event.keyCode || event.charCode; if((this.value.length==5) && !(key == 8)) return false;"  required value="<?= $data['curso']->codigo_curso?>">

											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error error">
											<?= form_error('codigo_curso') ?>
										  </div>
										</div>


										<div class="row">
											<div class="form-group col-sm-3 col-md-2">
												<label>Quantidade de semestres</label>
												<input class="form-control" placeholder="ex: 2" type="number"  onKeyPress="var key = event.keyCode || event.charCode; if((this.value.length==2) && !(key == 8)) return false;" name="qtd_semestre" id="qtd_semestre" maxlength="2" required value="<?= $data['curso']->qtd_semestre?>">

											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error error">
											<?= form_error('qtd_semestre') ?>
										  </div>
										</div>
										<div class="row">

											<div class="col-xs-12 col-sm-12 col-md-11 form-group">
												<label>Fechamento</label><br>
												<?php
													if($data['curso']->fechamento =='B'){
														echo'<label><input type="radio" name="fechamento" id="radioBimestral" value="B" checked>Bimestral</label>';
														echo'<label><input type="radio" name="fechamento" id="radioSemestral" value="S">Semestral</label>';

													}elseif($data['curso']->fechamento =='S'){
														echo'<label><input type="radio" name="fechamento" id="radioBimestral" value="B">Bimestral</label>';
														echo'<label><input type="radio" name="fechamento" id="radioSemestral" value="S" checked>Semestral</label>';
													}

												?>


											</div>
										</div>

										<div class="row">
											<div class="form-group col-sm-5 col-md-4">
												<label>Modalidade</label>
												<select name="modalidade_id">

												<?php
													foreach($data['modalidades'] as $modalidade){

												if($modalidade['id'] == $data['curso']->modalidade_id){

													echo '<option value="'. $modalidade['id'] .'" selected>'. $modalidade['nome_modalidade'] .'</option>';
												}else{
													echo '<option value="'. $modalidade['id'] .'">'. $modalidade['nome_modalidade'] .'</option>';
													 }


														}
												?>
												</select>
											</div>
										</div>

										<div class="row">
										  <div class="col-md-3 margin-top-error error">
											<?= form_error('modalidade') ?>
										  </div>
										</div>

										<div class="row">
											<div class="col-md-12 form-group">
												<label> Coordenador</label>
												<select class="form-control" name="docente_id">

													<?php
                            echo '<option value="">Sem Coordenador</option>';
                            if($data['coordenador'][0]->id):
                              echo '<option value="'. $data['coordenador'][0]->id .'"  selected>['. $data['coordenador'][0]->prontuario ."] ".$data['coordenador'][0]->nome.'</option>';
                            endif;

														foreach($data['docentes'] as $docente){
															echo '<option value="'. $docente->id .'">['. $docente->prontuario ."] ".$docente->nome.'</option>';
                            }
													?>

											    </select>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12 form-group">
												<a class="btn btn-danger active" title="Cancelar" href="<?= base_url('index.php/curso')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
												<button type="submit" title="Salvar" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
											</div>
										</div>

								</form>

							</div>
