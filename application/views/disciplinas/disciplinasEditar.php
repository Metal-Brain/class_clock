 <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-top: 5px">

            <form id="formDisciplina" class="form-Control"  method="post" action="<?= site_url('Disciplina/atualizar/'.$id)?>">
            		<h1>Editar Disciplina</h1>

					<div class="form-group">
						<label>Nome</label>
						<input type="text" class="form-control" name="nome_disciplina" placeholder="Nome" value="<?= $data['disciplina']['nome_disciplina'] ?>">
					</div>

					<div class="form-group">
						<label>Sigla</label>
						<input type="text" class="form-control" name="sigla_disciplina" placeholder="ex: LOPA1" style="max-width:300px;" value="<?= $data['disciplina']['sigla_disciplina'] ?>">
					</div>

					<div class="form-group test">
						<label>Curso</label>
						<select name="curso_id" class="form-control" style="max-width:400px;" value="<?= $data['disciplina']['curso_id'] ?>">
                            <?php foreach($data['cursos'] as $curso){ ?>
								<option value="<?=$curso['id'] ?>"><?=$curso['nome_curso'] ?></option>
							<?php }?>
						</select>
					</div>

					<div class="form-group">
						<label>Quantidade de professores</label>
						<input type="number" class="form-control" name="qtd_professor" placeholder="ex: 1" style="max-width:300px;" value="<?= $data['disciplina']['qtd_professor'] ?>">
					</div>

					<div class="form-group">
						<label>Módulo</label>
						<input type="number" class="form-control" name="modulo" placeholder="ex: 6" style="max-width: 300px" value="<?= $data['disciplina']['modulo'] ?>">
					</div>

					<div class="form-group">
						<label>Qtd. Aulas por Semana</label>
						<input type="number" class="form-control" name="qtd_aulas" placeholder="ex: 4" style="max-width:300px;" value="<?= $data['disciplina']['qtd_aulas'] ?>">
					</div>

					<div class="form-group">
						<label>Tipo de sala Necessária</label>
						<select name="tipo_sala_id" class="form-control" style="max-width:400px;" value="<?= $data['disciplina']['tipo_sala_id'] ?>">
                            <?php foreach($data['tipo_salas'] as $curso){ ?>
								<option value="<?=$curso['id'] ?>"><?=$curso['nome_tipo_sala'] ?></option>
							<?php }?>
						</select>
					</div>

                	<div class="form-group">
						<a class="btn btn-danger active" href="<?= base_url('index.php/Disciplina')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
						<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
					</div>
            </form>
            
        </div>