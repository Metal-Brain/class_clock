<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
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
	<input type ="checkbox" id="manipulaViewCadastroViaCSV"  class="btn btn-success">
		<label>clique no checkbox para importar via arquivo .csv</label>
		<div class="csv" style="display: none;">

			<form method="post" action="<?=base_url('Area/importCsv')?>" enctype="multipart/form-data">
				<!--      //redirecionamento BASE/ImportCsv -->
				<div>

					<label>Selecione o arquivo CSV para importação:</label>
					<input id="csvCampo" type="file"  name="csvfile"/>
				  </br>
					<input  type="submit" value="Importar" class="btn btn-success campoImportar" style="display: none"/>
				</div>
				</br>
				</br>
				<article>
				Para a inclusão correta do arquivo CSV o mesmo deve ter o dados inseridos entre aspas duplas </br> e separados por vírgula, contendo dados referentes aos seguintes campos:</br>
				<b>Nome da Área e o Código</b>
				</br>
				Insira os IDs referentes as informações que deseja inserir no CSV de acordo com a tabela abaixo.
				</br>
				</br>
				</br>
				<a href="<?=base_url('Area/download')?>">Clique para baixar o modelo de CSV</a>
			    </br>
				</article>
			</div>
		</form>

	<!-- Formulário para inserção de dados da view-->
	<div class="formAreas">
	<form class="formAreas" action="<?= site_url('area/salvar')?>" method="post">
		<label>Código</label>
		<div class="form-group">
			<input id="codigo" name="codigo" class="form-control" type="number" placeholder="Código" value="<?= set_value('codigo')?>">
			<span class="text-danger">
				<?= form_error('codigo') ?>
			</span>
		</div>

		<label>Área</label>
		<div class="form-group">
			<input id="nome_area" name="nome_area" class="form-control" type="text" placeholder="Área"  value="<?= set_value('nome_area')?>">
			<span class="text-danger">
				<?= form_error('nome_area') ?>
			</span>
		</div>

		<div class="form-group">
			<a class="btn btn-danger active" href="<?= base_url('index.php/area')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
			<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
		</div>
	</form>
	</div>
</div>
