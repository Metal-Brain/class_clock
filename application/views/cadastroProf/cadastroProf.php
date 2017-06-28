	<div id="content" class="col-md-10">
		
		<!-- Form de vizualização do cadastro do professor -->
		<?= form_open('Professor/cadastro') ?>
			<div class="row">
				<div class="col-md-12">
					<h1>Visualizar cadastro</h1>
				</div>
			</div>
			
			<fieldset disabled>
				<div class="row">
					<div class="form-group col-md-6">
				
						<?php foreach ($professores as $professor) : ?>
								<input type="hidden" value="<?= $professor['id']?>" id="identificador">
						<?php endforeach; ?>
							
						<label>Nome</label>
						
						<input type="text" class="form-control" value="<?= $professor['nome'] ?>"/>
				
					</div>
				</div>
											
				<div class="row">
					<div class="form-group col-md-2">
						<label>Matrícula</label>
							<input type="text" class="form-control" value="<?= $professor['matricula'] ?>"/>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-4">
						<label>E-mail</label>
							<input type="text" class="form-control" value="<?= $professor['email'] ?>"/>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-6">
						<label>Disciplinas que pode lecionar</label>
						<ul id="lecionarList" style="margin: 0 0 0 -20px;"></ul>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-2">
						<label>Data de Nascimento</label>
							<input type="date" class="form-control" value="<?= ($professor['nascimento']) ?>"/>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-2">
						<label>Nível Acadêmico</label>
							<input type="text" class="form-control" value="<?= $professor['nivel'] ?>"/>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-2">
						<label>Regime de contrato</label>
							<input type="text" class="form-control" value="<?= $professor['contrato'] ?>"/>
					</div>
				</div>
			</fieldset>
		<?= form_close() ?>
	</div><!--Fecha content-->
</div><!--Fecha container-fluid-->