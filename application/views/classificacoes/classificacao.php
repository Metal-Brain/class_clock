<?php $tipoUsuario = $this->session->userdata('usuario_logado')['tipos']; ?>

<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">


	<!-- Início do conteúdo da view-->
	<div class="top-bar" style="padding: 0 0 15px 0">
		<div class="row">
			<div class="col-md-12">
			<h2 class="page-header">Classificação

			</h2>
			</div>
		</div>
		<?php if (($tipoUsuario[0]==3) || ($tipoUsuario[0] == 1)) :?>
			<div class="row">
				<h4 class="page-header">Selecione o curso desejado.</h4>
				<form action="" method="GET">
					<select class="form-control" name="curso" onchange="this.form.submit()">

						<?php
							echo '<option value=""> Nenhum Curso selecionado</option>';
						foreach($cursos as $curso){
								if($cursoPesquisado	 == $curso['id']){

							echo '<option value="'. $curso->id .'" selected>'.$curso->nome_curso.'</option>';


						}else{
							echo '<option value="'. $curso->id .'">'.$curso->nome_curso.'</option>';

						}
															}


						?>

					 </select>

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

			<?php foreach ($classificacoes as $classificacao) { ?>
          <tr>
  					<td class="text-center"><?= htmlspecialchars(ucwords($classificacao['nome'])); ?></td>
  					<td class="text-center"><?= htmlspecialchars(ucwords($classificacao['nome_curso'])); ?></td>
  					<td class="text-center"><?= htmlspecialchars(ucwords($classificacao['nome_disciplina'])); ?></td>
			    </tr>
			<?php } ?>

		</tbody>
	</table>


</div>
