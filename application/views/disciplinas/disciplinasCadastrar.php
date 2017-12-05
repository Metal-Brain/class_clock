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
		<label>clique no checkbox para importar via arquivo .csv</label>
		<div class="csv" style="display: none;">

			<form method="post" action="<?=base_url('Disciplina/importCsv')?>"  enctype="multipart/form-data">
				<!--      //redirecionamento BASE/ImportCsv -->
				<div>

					<label>Selecione o arquivo CSV para importação:</label>
					<input id="csvCampo" type="file"  name="csvfile"/>


					<input  type="submit" value="Importar" class="btn btn-success campoImportar" style="display: none"/>
				</div>
  		<h3>Orientação para criação do arquivo .csv</h3>
  		<h4>O arquivo deve conter os valores respectivos campos:</h4>
  		<article> <b><i>Disciplina, Sigla, Curso, Quantidade de Aulas, Quantidade de Módulos, Quantidade de Aulas Semanais,
  		Tipo de Sala.</i></b>
		  	</br>
		  	Os dados devem estar separados por vírgulas e estar entre aspas duplas. <a href="<?=base_url('Disciplina/download')?>">Clique para baixar o modelo de CSV</a>
		  </br>
		  insira os ID referentes as informações de curso e tipo de sala, para que seja preservada a relação entre as mesmas, seguindo a tabela <b>abaixo.</b>
		</article>
		</br>
		</br>

			<table id="disciplinaTable" class="table table-striped">
				<thead>
					<tr>
						<th class="text-center">Disciplina</th>
						<th class="text-center">ID da Disciplina</th>
						<th class="text-center">Sigla</th>
						<th class="text-center">Curso</th>
						<th class="text-center">ID do Curso</th>
						<th class="text-center">Tipo de sala</th>
						<th class="text-center">ID do Tipo Sala</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data['disciplinas'] as $disciplina): ?>
						<tr <?php if($disciplina->deletado_em): echo 'class="danger"'; endif; ?>>
							<td class="text-center"><?= htmlspecialchars($disciplina['nome_disciplina']); ?></td>
							<td class="text-center"><?= htmlspecialchars($disciplina['id']); ?></td>
							<td class="text-center" style="text-transform:uppercase;"><?= $disciplina['sigla_disciplina']; ?></td>

							<td class="text-center"><?php
							foreach($data['cursos'] as $curso){
								if($curso['id'] == $disciplina['curso_id']):
									echo $curso['nome_curso'];
								endif;
							}
							?></td>
							<td class="text-center"><?php
							foreach($data['cursos'] as $curso){
								if($curso['id'] == $disciplina['curso_id']):
									echo $curso['id'];
								endif;
							}
							?></td>


							<td class="text-center"><?php
							foreach($data['tipo_salas'] as $tipo_sala){
								if($tipo_sala['id'] == $disciplina['tipo_sala_id']):
									echo $tipo_sala['nome_tipo_sala'];
								endif;
							}
							?></td>
							<td class="text-center"><?php
							foreach($data['tipo_salas'] as $tipo_sala){
								if($tipo_sala['id'] == $disciplina['tipo_sala_id']):
									echo $tipo_sala['id'];
								endif;
							}
							?></td>

						<?php endforeach; ?>
					</tbody>
				</table>
				<div>
				</div>
				<div>
				</div>
			</form>
		</div>

		<form id="formDisciplina" class="formDisciplina"  action="<?= site_url('Disciplina/salvar')?>" method="post">


			<div class="form-group">
				<label>Nome</label>
				<input type="text" class="form-control" onkeypress="this.value = this.value.toLowerCase();"
				onChange="this.value = this.value.toLowerCase();"
				onpaste="this.value = this.value.toLowerCase();" id="nome_disciplina" name="nome_disciplina" pattern="[A-Za-z0-9]" placeholder="Nome" value="<?= set_value('nome_disciplina')?>" >
        <span class="text-danger">
  				<?= form_error('nome_disciplina') ?>
  			</span>
			</div>

      <label>Sigla:</label>
  		<div class="form-group width-400">
  			<input id="sigla_disciplina" name="sigla_disciplina" pattern="[A-Za-z0-9]" class="form-control" type="text" placeholder="Sigla" onkeyup="mascara(this,alphanum);" value="<?= set_value('sigla_disciplina')?>">
  			<span class="text-danger">
  				<?= form_error('sigla_disciplina') ?>
  			</span>
  		</div>

			<div class="form-group">
				<label>Curso</label>
				<select name="curso_id" id="curso_id" class="form-control" style="max-width:400px;" value="<?= set_value('curso_id')?>">
					<option value="" disabled selected>Selecione</option>
					<?php foreach($data['cursos'] as $curso){ ?>
					<option value="<?=$curso['id'] ?>"><?=$curso['nome_curso'] ?></option>
					<?php }?>
				</select>
        <span class="text-danger">
          <?= form_error('curso_id') ?>
        </span>
			</div>

      <div class="form-group">
				<label>Quantidade de professores</label>
      <input type="number" class="form-control" id="qtd_professor" name="qtd_professor"
      onKeyPress="var key = event.keyCode || event.charCode; if((this.value.length==3) && !(key == 8)) return false;"
      placeholder="ex: 1" style="max-width:300px;" value="<?= set_value('qtd_professor')?>">
      <span class="text-danger">
        <?= form_error('qtd_professor') ?>
      </span>
    </div>

			<div class="form-group">
				<label>Módulo no curso que ocorrerá</label>
				<input type="number" class="form-control" id="modulo" name="modulo" placeholder="ex: 6" style="max-width: 300px" value="<?= set_value('modulo')?>">
        <span class="text-danger">
          <?= form_error('modulo') ?>
        </span>
			</div>

			<div class="form-group">
				<label>Qtd. Aulas por Semana</label>
				<input type="number" class="form-control" id="qtd_aulas" name="qtd_aulas" placeholder="ex: 4" style="max-width:300px;" value="<?= set_value('qtd_aulas')?>">
        <span class="text-danger">
          <?= form_error('qtd_aulas') ?>
        </span>
			</div>

			<div class="form-group">
				<label>Tipo de sala Necessária</label>
				<select name="tipo_sala_id" id="tipo_sala_id" class="form-control" style="max-width:400px;" value="<?= set_value('tipo_sala_id')?>">

					<option disabled selected>Selecione</option>
					<?php foreach($data['tipo_salas'] as $curso){ ?>
					<option value="<?=$curso['id'] ?>"><?=$curso['nome_tipo_sala'] ?></option>
					<?php }?>
				</select>
        <span class="text-danger">
          <?= form_error('tipo_sala_id') ?>
        </span>
			</div>

			<div class="form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Disciplina')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</form>
		</div>
