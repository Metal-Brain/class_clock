<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-top: 5px">

	<div class="row" style="margin-top: 5px;">
	<div class="col-md-12">
		<?php if ($this->session->flashdata('success')) : ?>
			<div class="alert alert-success">
				<p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
			</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="alert alert-danger">
					<p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
					<p><?=  var_dump(validation_errors()) ?></p>
				</div>
			<?php endif; ?>
		</div>
		</div>


					<form id="formTurma" method="post" class="form-Control" action="<?= site_url('Turma/atualizar/'.$turma->id)?>" >
					<h1>Editar Turma</h1>
						<div class="form-group">
							<label>Depedência</label><br />
							<label class="radio-inline"><input type="radio" value="1" <?= ($turma->dp) ? 'checked' : '' ?> name="dp">SIM</label>
							<label class="radio-inline"><input type="radio" value="0" <?= (!$turma->dp) ? 'checked' : '' ?> name="dp">NÃO</label>
						</div>

						<div class="form-group">
							<label>Disciplina</label>
							<select name="disciplina_id" id="disciplina_id" class="form-control" style="max-width:400px;">

									<option value="" disabled selected>Selecione</option>
									<?php foreach($disciplinas as $disciplina): ?>
									<option value="<?=$disciplina['id'] ?>" <?= ($turma->disciplina->id == $disciplina->id) ? 'selected' : ''  ?> ><?= $disciplina['nome_disciplina'] . ' - ' . $disciplina->curso->nome_curso ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group">
							<label>Turno</label>
							<select name="turno_id" id="turno_id" class="form-control" style="max-width:400px;">

									<option value="" disabled selected>Selecione</option>
									<?php foreach($turnos as $turno){ ?>
									<option value="<?=$turno['id'] ?>" <?= ($turma->turno->id == $turno->id) ? 'selected' : ''  ?> ><?=$turno['nome_turno'] ?></option>
									<?php }?>
							</select>
						</div>



						<div class="form-group">
							<label>Quantidade de alunos</label>
							<input type="number" class="form-control" id="qtd_alunos" onKeyPress="var key = event.keyCode || event.charCode; if((this.value.length==3) && !(key == 8)) return false;" name="qtd_alunos" placeholder="ex: 1" style="max-width:300px;" value="<?= htmlspecialchars(ucwords($turma->qtd_alunos))?>">
						</div>

										<div class="form-group">
							<a class="btn btn-danger active" href="<?= base_url('index.php/Turma')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
							<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
						</div>
							</form>
					</div>
