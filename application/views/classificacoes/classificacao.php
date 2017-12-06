<?php $tipoUsuario = $this->session->userdata('usuario_logado')['tipos']; ?>

 
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
	

	<!-- Início do conteúdo da view-->
	<div class="top-bar" style="padding: 0 0 15px 0">
		<div class="row">
			<div class="col-md-12">
			<h2 class="page-header">Classificação</h2>
			</div>
		</div>
	</div>

	<?php if (!$cursos->isEmpty()) :?>
		<form method="POST">
			<select name="curso">
				<?php foreach ($cursos as $curso): ?>
					<?php if($curso == $classificacoes[0]->curso_id): ?>
						<option value="<?= $curso['id'] ?>" selected>
							<?= htmlspecialchars(ucwords($curso['nome_curso'])); ?>
						</option>
					<?php else: ?>
						<option value="<?= $curso['id'] ?>">
							<?= htmlspecialchars(ucwords($curso['nome_curso'])); ?>
						</option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
			<button class="btn btn-primary">Selecionar Curso</button>
		</form>
	<?php endif; ?>
	<br>

	<table id="classificacaoTable" class="table table-striped">
		<thead>
			<tr>
				<th class="text-center">Docente</th>
				<th class="text-center">Curso</th>
				<th class="text-center">Disciplina</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($classificacoes as $curso) { ?>
				
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome'])); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome_curso'])); ?></td>
					<td class="text-center"><?= htmlspecialchars(ucwords($curso['nome_disciplina'])); ?></td>
					
			    </tr>
			
			<?php } ?>
			</tbody>
		</table>
</div>
