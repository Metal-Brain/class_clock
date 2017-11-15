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

    	<form method="post" class= "csv" style="display: none; " action="<?=base_url('Disciplina/importCsv')?>" enctype="multipart/form-data">
    		<!--      //redirecionamento BASE/ImportCsv -->
				
				<a href="<?=base_url('Disciplina/download')?>">Clique para baixar o modelo de CSV</a>
				 <table id="disciplinaTable" class="table">
		    			<thead>
		    				<tr>
		    					<th class="text-center">Curso</th>
		                        <th class="text-center">ID do Curso</th>
		                        <th class="text-center">Tipos de Sala</th>
		                        <th class="text-center">ID dos Tipos de Sala</th>
		    				</tr>
		    			</thead>
		    			<tbody>
		    				<?php foreach($data['cursos'] as $curso){ ?>
								<td><?=$curso['nome_curso'] ?></td>
								<td><?=$curso['id_curso'] ?></td>
								<?php foreach($data['tipo_salas'] as $tipo){ ?>
								<td><?=$tipo['nome_curso'] ?></td>
								<td><?=$tipo['id'] ?></td>
								<?php }?>	
							<?php }?>	
		    			</tbody>         
		           </table>  
				<div>
				<input id="csvCampo" type="file"  name="csvfile"/>	
				<label>Selecione o arquivo CSV para importação:</label>

				<h1>Orientações para criação do arquivo .csv</h1>
					<h3>O arquivo deve conter os valores respectivos campos:</h3>
					<p>codigo, codigo_curso, tipo_sala, nome_disciplpina, modulo, sigla_disciplina, qtd_professor, qtd_aulas, deletado_em.</p>	
							 	 		
				</div>
				<div>
			 <input  type="submit" value="Importar" class="btn btn-success campoImportar" style="display: none"/>
				</div>		
         </form>   

            <form id="formDisciplina" class="formDisciplina"  action="<?= site_url('Disciplina/salvar')?>" method="post">


					<div class="form-group">
						<label>Nome</label>
						<input type="text" class="form-control" onkeypress="this.value = this.value.toLowerCase();" 
												onChange="this.value = this.value.toLowerCase();" 
												onpaste="this.value = this.value.toLowerCase();" id="nome_curso" name="nome_disciplina" placeholder="Nome" >
					</div>

					<div class="form-group">
						<label>Sigla</label>
						<input maxlength="5" style="text-transform:uppercase;" type="text" class="form-control" id="sigla_curso" name="sigla_disciplina" placeholder="ex: LOPA1" style="max-width:300px;" >
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
			</form>			
    </div>
       			
