<div class="col-xs=10 col-sm-10 col-md-10">
	<form id="formTipo_Sala" action="<?= site_url('tipo_sala/atualizar/'.$id)?>" method="post">

	<div class="form-group">	
		<label>Nome:</label>
		<input name="nome_tipo_sala" class="form-control" required maxlength="30" value="<?= htmlspecialchars($tipo_salas->nome_tipo_sala) ?>">
		<?= form_error('nome_tipo_sala') ?>
	</div>

	<div class="form-group">
		<label>Descrição:</label>
		<textarea name="descricao_tipo_sala" class="form-control" rows="5" required maxlength="254"><?= $tipo_salas->descricao_tipo_sala?></textarea>
		<?= form_error('descricao_tipo_sala') ?>
	</div>


	<div class="row">
		<div class="col-md-12 form-group">
			<button class="btn btn-danger active" type="button" id="btn-delete" style="float: right;" onclick="cancelEdition('Deseja abandonar sua edição?')"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
			<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
		</div>
	</div>

	</form>
</div>
