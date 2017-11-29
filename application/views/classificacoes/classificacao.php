<?php $tipoUsuario = $this->session->userdata('usuario_logado')['tipo']; ?>
<pre>
		<?php print_r($cursos) ?>
</pre>

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	

	<!-- Início do conteúdo da view-->
	<div class="top-bar" style="padding: 0 0 15px 0">
		<div class="row">
			<div class="col-md-12">
			<h2 class="page-header">Classificação
			
			</h2>
			</div>
		</div>
		<?php if (in_array($tipoUsuario,[1])) :?>
			<div class="row">
				<h4 class="page-header">Selecione o curso desejado.</h4>
				<form action="" method="GET">
					<select class="form-control" name="curso">

						<?php
						foreach($cursos as $curso){
								echo '<option value="'. $curso->id .'">'.$curso->nome_curso.'</option>';
															}
						
								
						?>

					 </select>
					<input type="submit" class="btn btn-success" style="float: right;">
				</form>
			</div>
		<?php endif; ?>
	</div>
	<table id="classificacaoTable" class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Docente</th>
				<th class="text-center">Curso</th>
				<th class="text-center">Disciplina</th>
			</tr>
		</thead>

		<tbody>
		<?php if (in_array($tipoUsuario,[1])) :?>
			<?php foreach ($classificacoes as $curso) { ?>
				
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome'])); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome_curso'])); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome_disciplina'])); ?></td>
					
			    </tr>
			
			<?php } ?>
		<?php endif; ?>	
		<?php if (in_array($tipoUsuario,[4])) :?>
			<?php foreach ($cursos as $curso) { ?>
				
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome'])); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome_curso'])); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome_disciplina'])); ?></td>
					
			    </tr>
			
			<?php } ?>
		<?php endif; ?>	
		</tbody>
	</table>


</div>
