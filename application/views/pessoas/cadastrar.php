<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	<form id="formPessoas" action="<?= site_url('pessoa/salvar')?>" method="post">
		<label>Nome:</label>
		<div class="form-group width-400">
			<input id="nome" name="nome" class="form-control" type="text" placeholder="Nome" value="<?= set_value('nome')?>">
			<?= form_error('nome') ?>
		</div>
		
		<label>Prontuário:</label>
		<div class="form-group width-180">
			<input id="prontuario" name="prontuario" class="form-control" type="text" placeholder="Prontuário" maxlength="6" value="<?= set_value('prontuario')?>">
			<?= form_error('prontuario') ?>
		</div>
		
		<label>Senha:</label>
		<div class="form-group width-180">
			<input id="senha" name="senha" class="form-control" type="password" placeholder="Senha" value="<?= set_value('senha')?>">
			<?= form_error('senha') ?>
		</div>
		
		<label>E-mail:</label>
		<div class="form-group width-400">
			<input id="email" name="email" class="form-control" type="email" placeholder="E-mail" value="<?= set_value('email')?>">
			<?= form_error('email') ?>
		</div>
		
		
		<label>Tipo:</label>
		<div class="form-group">
			<div class="checkbox" style="margin-top: 0px;">
				<label><input type="checkbox" value="">Administrador</label>
				<label><input type="checkbox" value="">CRA</label>
				<label><input type="checkbox" value="">DAE</label>
				<label><input class ="checkdocente-toggle" type="checkbox" value="" data-element="#conteudo-docente"> Docente</label>
			</div>
		</div>
		
		<!-- Docente -->
		<div id="conteudo-docente">
		<label>Data de nascimento:</label>
		<div class="form-group width-180">
			<input id="data_nascimento" name="data_nascimento" class="form-control" type="date" value="<?= set_value('data_nascimento')?>">
			<?= form_error('data_nascimento') ?>
		</div>
		
		<label>Data de ingresso no câmpus:</label>
		<div class="form-group width-180">
			<input id="ingressoCampus" name="ingressoCampus" class="form-control" type="date" value="<?= set_value('ingressoCampus')?>">
			<?= form_error('ingressoCampus') ?>
		</div>
				
		<label>Data de ingresso no câmpus:</label>
		<div class="form-group width-180">
			<input id="ingressoIFSP" name="ingressoIFSP" class="form-control" type="date" value="<?= set_value('ingressoIFSP')?>">
			<?= form_error('ingressoIFSP') ?>
		</div>
		
		<!-- <label>Área:</label>
		<div class="form-group width-180">
			<div class="dropdown">
				<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Selecione
				<span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="#">HTML</a></li>
					<li><a href="#">CSS</a></li>
					<li><a href="#">JavaScript</a></li>
				</ul>
			</div>
		</div> -->
		
		<label>Regime de contrato:</label>
		<div class="form-group width-180">
			<div class="dropdown">
				<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Selecione
				<span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="#">HTML</a></li>
					<li><a href="#">CSS</a></li>
					<li><a href="#">JavaScript</a></li>
				</ul>
			</div>
		</div>
		</div>
		
		<div class="form-group">
			<a class="btn btn-danger active" href="<?= base_url('index.php/pessoa')?>" style="float: right;"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
			<button type="submit" class="btn btn-success active salvar" style="float: right; margin-right: 10px;"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(function() {
		$(".checkdocente-toggle").click(function(e){
			e.preventDefault();
			el = $(this).data('element');
			$(el).toggle();
		});
	});
</script>
