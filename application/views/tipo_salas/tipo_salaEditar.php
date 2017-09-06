<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-10">
			<form id="formTipo_Sala" action="<?= site_url('tipo_sala/atualizar/'.$id)?>" method="post">

				<div class="col-xs-12 col-sm-12 col-md-12 form-group">
					<div class="col-xs-12 col-sm-12 col-md-12" style="height: 40px;"></div>
						<label>Nome:</label>
						<input name="nome_tipo_sala" class="form-control" required maxlength="30" value="<?= $tipo_salas->nome_tipo_sala?>">
						<?= form_error('nome_tipo_sala') ?>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 form-group">
					<div class="col-xs-12 col-sm-12 col-md-12" style="height: 40px;"></div>
					<label>Descrição:</label>
					<textarea name="descricao_tipo_sala" class="form-control" rows="5" required maxlength="254"><?= $tipo_salas->descricao_tipo_sala?></textarea>
					
					<?= form_error('descricao_tipo_sala') ?>
							
				</div>

				
				<div class="col-md-10 form-group">
					<button type="submit" class="btn btn-primary btn-lg active" >Atualizar</button>
				</div>

			</form>
		</div>
	</div>
</div>
