<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" style="padding-top: 5px">
	<form id="formTurmas" method="post" action="<?= site_url('Turma/atualizar/'.$id)?>">
		<div class="row">
			<div class="col-md-5 form-group">
				<label>Nome:</label>
				<input name="nome_turma" class="form-control" placeholder="Nome" value="<?= htmlspecialchars(ucwords($turma->nome_turma))?>">
				<?= form_error('nome_turma') ?>
			</div>
		</div>

		<div id="horarios">
			<button id="btnAdd" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar Aula</button>

		</div>

		<?= form_error('horario[]') ?>

		<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/turma')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
	</form>
</div>
