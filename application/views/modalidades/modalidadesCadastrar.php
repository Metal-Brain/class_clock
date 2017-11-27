<div class="col-xs=10 col-sm-10 col-md-10">
    <form id="formCadastrar" action="<?= site_url('modalidade/salvar')?>" method="post">
        <div class="form-group width-400">
            <label>Nome:</label>
			<input type="text" class="form-control" id="nome_modalidade" name="nome_modalidade" placeholder="Ex:Tecnólogo" value="<?= set_value('nome_modalidade') ?>"/>
            <span class="text-danger">
                <?= form_error("nome_modalidade") ?>
            </span>
        </div>
        
        <div class="form-group width-180">
            <label>Código:</label>
            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código da Modalidade" value="<?= set_value('codigo') ?>" maxlength="5"/>
            <span class="text-danger">
                <?= form_error("codigo") ?>
            </span>
        </div>
            
		<div class="row">
			<div class="col-md-12 form-group">
				<a class="btn btn-danger active" href="<?= base_url('index.php/Modalidade')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
				<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
			</div>
		</div>
    </form>
</div>
