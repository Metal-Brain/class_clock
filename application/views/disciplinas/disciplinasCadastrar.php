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
<h1>Cadastrar Disciplina</h1>
<input type ="checkbox" id="manipulaViewCadastroViaCSV"  class="btn btn-success">
           <label>clique no checkbox para importar um arquivo .csv</label>	
    	<form method="post" class= "csv" style="display: none; " action="<?=base_url('Base/ImportCsv')?>" enctype="multipart/form-data">
    		
            
				<div>
				<input type="file"  name="csvfile"/>	
				<label>Selecione o arquivo CSV para importação:</label>	
				</div>
				<div>
			 <input type="submit" value="Importar" class="btn btn-success" />
				</div>		
         </form>   

            <form id="formDisciplina" class="formDisciplina"  action="<?= site_url('Disciplina/salvar')?>" method="post">


					<div class="form-group">
						<label>Nome</label>
						<input type="text" class="form-control" id="nome_curso" name="nome_disciplina" placeholder="Nome" >
					</div>

					<div class="form-group">
						<label>Sigla</label>
						<input type="text" class="form-control" id="sigla_curso" name="sigla_disciplina" placeholder="ex: LOPA1" style="max-width:300px;" >
					</div>

					<div class="form-group">
						<label>Curso</label>
						<select name="curso_id" id="curso_id" class="form-control" style="max-width:400px;">

							  <option value="" disabled selected>Selecione</option>
                            <?php foreach($data['cursos'] as $curso){ ?>
								<option value="<?=$curso['id'] ?>"><?=$curso['nome_curso'] ?></option>
							<?php }?>
						</select>
					</div>

					<div class="form-group">
						<label>Quantidade de professores</label>
						<input type="number" class="form-control" id="qtd_professor" name="qtd_professor" placeholder="ex: 1" style="max-width:300px;">
					</div>

					<div class="form-group">
						<label>Módulo no curso que ocorrerá</label>
						<input type="number" class="form-control" id="modulo" name="modulo" placeholder="ex: 6" style="max-width: 300px">
					</div>

					<div class="form-group">
						<label>Qtd. Aulas por Semana</label>
						<input type="number" class="form-control" id="qtd_aulas" name="qtd_aulas" placeholder="ex: 4" style="max-width:300px;">
					</div>

					<div class="form-group">
						<label>Tipo de sala Necessária</label>
						<select name="tipo_sala_id" id="tipo_sala_id" class="form-control" style="max-width:400px;">

							  <option value="" disabled selected>Selecione</option>
                            <?php foreach($data['tipo_salas'] as $curso){ ?>
								<option value="<?=$curso['id'] ?>"><?=$curso['nome_tipo_sala'] ?></option>
							<?php }?>
						</select>
					</div>

                	<div class="form-group">
						<a class="btn btn-danger active" href="<?= base_url('index.php/Disciplina')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
						<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
					</div>


					<!--Importação via CSV-->

					<div class="form-group">
					    

							<table>
								<caption>Disciplinas</caption>
								<thead>
									<tr>
										<th>Nome</th>
										<th>Sigla</th>
										<th>Curso</th>
										<th>Qtd. Professores</th>
										<th>Módulos</th>
										<th>Qtd. Aulas Semanais</th>
										<th>Tipo de Sala</th>		
									</tr>
								</thead>
								<tbody>
									<?php $disciplinas = &$disciplina ?>	
									<?php if ($disciplinas == false): ?>
										<tr><td colspan="2">Nenhum contato encontrado</td></tr>
									<?php else: ?>
										<?php foreach ($disciplinas as $row): ?>
											<tr>								
												<td><?php echo $row['nome_disciplina']; ?></td>
												<td><?php echo $row['sigla_disciplina']; ?></td>
												<td><?php echo $row['curso_id']; ?></td>
												<td><?php echo $row['qtd_professor']; ?></td>
												<td><?php echo $row['modulo']; ?></td>
												<td><?php echo $row['qtd_aulas']; ?></td>
												<td><?php echo $row['tipo_sala_id']; ?></td>

											</tr>
										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div> 
			</form>			
    </div>
       			
