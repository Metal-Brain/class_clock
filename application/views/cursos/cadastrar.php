<!--<pre>
		<?php //print_r($data['teste']) ?>
		<?php //print_r($data['cursos'][1]->docente_id) ?>
		<?php //print_r($data['modalidades']) ?>
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
		<input type ="checkbox" id="manipulaViewCadastroViaCSV"  class="btn btn-success">
		<label>clique no checkbox para importar via arquivo .csv</label>
		<div class="csv" style="display: none;">

			<form method="post" action="<?=base_url('Curso/importCsv')?>" enctype="multipart/form-data">
				<!--      //redirecionamento BASE/ImportCsv -->
				<div>

					<label>Selecione o arquivo CSV para importação:</label>
					<input id="csvCampo" type="file"  name="csvfile"/>


					<input  type="submit" value="Importar" class="btn btn-success campoImportar" style="display: none"/>
				</div>
				</br>
				</br>
				<article>
				Para a inclusão correta do arquivo CSV o mesmo deve ter o dados inseridos entre aspas duplas </br> e separados por vírgula, contendo dados referentes aos seguintes campos:</br>
				<b>ID DO CURSO, ID DO DOCENTE, ID DA MODALIDADE, ID DO COORDENADOR, FECHAMENTO, CODIGO DO CURSO, NOME DO CURSO, SIGLA, QUANTIDADE DE SEMESTRES E FECHAMENTO</b>
				</br>
				Insira os IDs referentes as informações que deseja inserir no CSV de acordo com a tabela abaixo.
				</br>
				</br>
				</br>
				<a href="<?=base_url('Curso/download')?>">Clique para baixar o modelo de CSV</a>
			    </br>
				</article>
				<table id="cursoTable" class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Código</th>
				<th class="text-center">Nome do Curso</th>
				<th class="text-center">ID do Curso</th>
				<th class="text-center">Sigla</th>
				<th class="text-center">Quantidade de Semestres</th>
				<th class="text-center">Modalidade</th>
				<th class="text-center">ID da Modalidade</th>
				<th class="text-center">Coordenador</th>
				<th class="text-center">ID do Coordenador</th>
				<th class="text-center">Fechamento</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($data['cursos'] as $curso) { ?>
				<tr <?php if($curso->deletado_em): echo 'class="danger"'; endif; ?>>
					<td class="text-center"><?= ucwords($curso['codigo_curso']); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome_curso'])); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['id'])); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['sigla_curso'])); ?></td>
					<td class="text-center"><?= ucwords($curso['qtd_semestre']); ?></td>
					<td class="text-center"><?= htmlspecialchars($curso->modalidade->nome_modalidade) ?></td>
					<td class="text-center"><?= ucwords($curso->modalidade->id)?></td>
					<td class="text-center"><?= htmlspecialchars(@$curso->docente->pessoa['nome']); ?></td>
				  <td class="text-center"><?= htmlspecialchars(@$curso->docente->pessoa['id']); ?></td>
					<td class="text-center"><?= ucwords($curso['fechamento']); ?></td>
				</tr>

			<?php } ?>
		</tbody>
	</table>
</form>

		</div>
		<div class="formCurso">
			<form  id="formCurso" class="formCurso" name="formCurso" method="post" action="<?= site_url('curso/salvar')?>">
				<h1>Cadastrar Curso</h1>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-11 form-group">

						<label>Nome:</label>
						<input class="form-control" placeholder="Nome" onkeypress="this.value = this.value.toLowerCase();"
						onChange="this.value = this.value.toLowerCase();"
						onpaste="this.value = this.value.toLowerCase();" name="nome_curso" id="nome_curso" maxlength="75">

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
						<input class="form-control" placeholder="ex: ADS" name="sigla_curso" id="sigla_curso" maxlength="3">

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
						<input class="form-control" placeholder="ex: 123" type="number" onKeyPress="var key = event.keyCode || event.charCode; if((this.value.length==5) && !(key == 8)) return false;" name="codigo_curso" id="codigo_curso">

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
						<input class="form-control" placeholder="ex: 2" type="number"  onKeyPress="var key = event.keyCode || event.charCode; if((this.value.length==2) && !(key == 8)) return false;" name="qtd_semestre" id="qtd_semestre" maxlength="2">

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
						<label><input type="radio" name="fechamento" id="radioBimestral" value="B" checked>Bimestral</label>
						<label><input type="radio" name="fechamento" id="radioSemestral" value="S">Semestral</label>
					</div>
				</div>

				<div class="row">

					<div class="form-group col-sm-5 col-md-4">
						<label>Modalidade</label>
						<select name="modalidade_id">

							<?php
							foreach($data['modalidades'] as $modalidade){
								echo '<option value="'. $modalidade['id'] .'">'. $modalidade['nome_modalidade'] .'</option>';}
								?>
							</select>

						</div>
					</div>

					<div class="row">
						<div class="col-md-3 margin-top-error error">
							<?= form_error('modalidade_id') ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 form-group">
							<label> Coordenador</label>
							<select class="form-control" name="docente_id">

								<?php
								echo '<option value="">Sem Coordenador</option>';
								foreach($data['docentes'] as $docente){
									echo '<option value="'. $docente->id .'">['. $docente->prontuario ."] ".$docente->nome.'</option>';
								}
								?>

							</select>

						</div>
					</div>

					<div class="row">
						<div class="col-md-12 form-group">
							<a class="btn btn-danger active" title="Cancelar" href="<?= base_url('index.php/Curso')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
							<button type="submit" title="Salvar" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
						</div>
					</div>

				</form>
			</div>
			<!--<button onclick="myFunction()">Try it</button> -->
		</div>
