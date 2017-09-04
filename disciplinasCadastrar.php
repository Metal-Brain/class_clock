<!-- Aqui é o formulário de registro do novo item-->
        <div class="col-xs=8 col-sm-8 col-md-10">

			        	<!-- Alertas de sucesso / erro -->
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
           

            <form id="formDisciplina" class="form-Control"action="<?= site_url('disciplina/cadastrar')?>" method="post">
            		<h1>Cadastrar Disciplina</h1>
				
					<div class="form-group">
						<label>Nome</label>
						<input type="text" class="form-control" id="nome_disciplina" name="nome_disciplina" placeholder="nome" value="<?= set_value('nome_disciplina') ?>">
					</div>

					<div class="form-group">
						<label>Sigla</label>
						<input type="text" class="form-control" id="sigla_disciplina" name="sigla_disciplina" placeholder="ex: LOPA1" value="<?= set_value('sigla_disciplina') ?>" style="max-width:300px;" >
					</div>

					<div class="form-group">
						<label>Curso</label>	
						<select class="form-control" style="max-width:300px;">
							  <option>Selecione</option>
							
						</select>
					</div>	
			
					<div class="form-group">
						<label>Quantidade de professores</label>
						<input type="number" class="form-control" id="qtd_professor" name="qtd_professor" placeholder="ex: 1" value="<?= set_value('qtd_professor') ?>" style="max-width:300px;">
					</div>
									
					<div class="form-group">
						<label>Semestre</label>
						<input type="number" class="form-control" id="modulo" name="modulo" placeholder="ex: 6" value="<?= set_value('modulo') ?>" style="max-width: 300px">
					</div>
									
					<div class="form-group">
						<label>Qtd. Aulas por Semana</label>
						<input type="number" class="form-control" id="carga_semanal" name="carga_semanal" placeholder="ex: 4" value="<?= set_value('carga_semanal') ?>" style="max-width:300px;">
					</div>

					<div class="form-group">
						<label>Tipo de sala Necessária</label>	
						<select class="form-control" style="max-width:300px;">
							 <option>Selecione</option>
							 
						</select>
					</div>	
									
                	<div class="form-group">
						<a class="btn btn-danger active" href="<?= base_url('index.php/Disciplina')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
						<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
					</div>
            </form>
        </div>