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
       </div>
     <?php endif; ?>
   </div>
   </div>


            <form id="formDisciplina" class="form-Control"  method="post" action="<?= site_url('Disciplina/atualizar/'.$id)?>">
            		<h1>Editar Disciplina</h1>

					<div class="form-group">
						<label>Nome</label>
						<input type="text" class="form-control" onkeypress="this.value = this.value.toLowerCase();" 
												onChange="this.value = this.value.toLowerCase();" 
												onpaste="this.value = this.value.toLowerCase();" name="nome_disciplina" placeholder="Nome" value="<?= htmlspecialchars($data['disciplina']['nome_disciplina']) ?>">
					</div>

					<div class="form-group">
						<label>Sigla</label>

						<input maxlength="5" style="text-transform:uppercase;" type="text" class="form-control" name="sigla_disciplina" id="sigla_curso" placeholder="ex: LOPA1" style="max-width:300px;" value="<?= $data['disciplina']['sigla_disciplina'] ?>">
					</div>

					<div class="form-group test">
						<label>Curso</label>
						<select name="curso_id" class="form-control" style="max-width:400px;" value="<?= $data['disciplina']['curso_id'] ?>">
								
                            <?php foreach($data['cursos'] as $curso){ ?>
								<?php if($data['disciplina']['curso_id'] == $curso['id'] ){ ?>
										
										<option value="<?=$curso['id'] ?>" selected><?=$curso['nome_curso'] ?></option>
										
								<?php 	}else{ ?>
										<option value="<?=$curso['id'] ?>"><?=$curso['nome_curso'] ?></option>
										
								<?php	}
								
								
								
							
								
							 }?>
						</select>
					</div>

					<div class="form-group">
						<label>Quantidade de professores</label>
						<input type="number" class="form-control" name="qtd_professor" placeholder="ex: 1" style="max-width:300px;" value="<?= $data['disciplina']['qtd_professor'] ?>">
					</div>

					<div class="form-group">
						<label>Módulo no curso que ocorrerá</label>
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
								<?php if($data['disciplina']['tipo_sala_id'] == $curso['id'] ){ ?>
									<option value="<?=$curso['id'] ?>" selected><?=$curso['nome_tipo_sala'] ?></option>
								
								<?php }else{ ?>
									<option value="<?=$curso['id'] ?>"><?=$curso['nome_tipo_sala'] ?></option>
									
								<?php }
							
							}?>
							
						</select>
					</div>

                	<div class="form-group">
						<a class="btn btn-danger active" href="<?= base_url('index.php/Disciplina')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
						<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
					</div>
            </form>

        </div>
