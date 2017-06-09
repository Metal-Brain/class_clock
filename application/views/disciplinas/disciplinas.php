<div id="content" class="col-md-10">
    <?php if ($this->session->flashdata('success')) : ?>
        <!-- Alert de sucesso -->
        <div class="text-center alert alert-success" role="alert">
            <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
            <span class="sr-only">Succes:</span>
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php elseif ($this->session->flashdata('danger')) : ?>
        <!-- Alert de erro -->
        <div class="text-center alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            <?= $this->session->flashdata('danger') ?>
        </div>
    <?php endif; ?>

    <?php if (validation_errors()): ?>
        <div class="alert alert-danger text-center">
            <p><?= $this->session->flashdata('formDanger') ?></p>
            <?= validation_errors() ?>
        </div>
    <?php endif; ?>

    <h1>Disciplinas</h1>

    <!-- Lista de 'botoes' links do Bootstrap -->

	<?php if ($this->session->nivel == 1) :?>
    <ul class="nav nav-pills">
        <!-- 'botao' link para a listagem -->
        <li class="active"><a data-toggle="pill" href="#list">Listar todas</a></li>
        <!-- 'botao' link para novo registro -->
        <li><a data-toggle="pill" href="#new">Cadastrar</a></li>
    </ul>
	<?php endif;?>

    <!-- Dentro dessa div vai o conteúdo que os botões acima exibem ou omitem -->
    <div class="tab-content">

        <!-- Aqui é a Listagem dos Itens -->
        <div id="list" class="tab-pane fade in active">
            <div style="margin-top: 25px;">
                <table id="disciplinaTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th><center>Sigla</th>
                            <th><center>Nome</th>
                            <th><center>Qtd. Professores</th>
                            <th><center>Semestre</th>
                            <th><center>Qtd. Aulas Semanais</th>
                            <th><center>Status</th>
                            <th><center>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($disciplinas as $disciplina): ?>
                            <?= ($disciplina['status'] ? '<tr>' : '<tr class="danger">') ?>
							<td><center><?= $disciplina['sigla'] ?></td>
							<td><center><?= $disciplina['nome'] ?></td>
							<td><center><?= $disciplina['qtdProf'] ?></td>
							<td><center><?= $disciplina['semestre'] ?></td>
              <td><center><?= $disciplina['qtdAulas'] ?></td>
							<td><center><?php
								if ($disciplina['status']): echo "Ativo";
								else: echo "Inativo";
								endif;
                            ?></td>
							<td><center>
								<?php if ($disciplina['status']): ?>
									<?php if ($this->session->nivel == 1) :?>
										<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whateversemestre="<?= $disciplina['semestre'] ?>" data-whateversigla="<?= $disciplina['sigla'] ?>" data-whateverqtdAula="<?= $disciplina['qtdAulas'] ?>" data-whatevernome="<?= $disciplina['nome'] ?>" data-whateverid="<?= $disciplina['id'] ?>" data-whateverqtdprof="<?= $disciplina['qtdProf'] ?>"><span class="glyphicon glyphicon-pencil"></span></button>
										<button onClick="disable(<?= $disciplina['id'] ?>)" type="button" class="btn btn-danger delete" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
									<?php endif;?>
										<?php if ($this->session->nivel == 2 || $this->session->nivel == 3) :?>
										<button type="button" class="btn btn-primary" title="Visualizar" data-toggle="modal" data-target="#exampleModal2" data-whateversemestre="<?= $disciplina['semestre'] ?>" data-whateversigla="<?= $disciplina['sigla'] ?>" data-whateverqtdAula="<?= $disciplina['qtdAulas'] ?>" data-whatevernome="<?= $disciplina['nome'] ?>" data-whateverid="<?= $disciplina['id'] ?>" data-whateverqtdprof="<?= $disciplina['qtdProf'] ?>"><span class="glyphicon glyphicon-eye-open"></span></button>
										<?php endif;?>

								<?php else : ?>
									<button onClick="able(<?= $disciplina['id'] ?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
								<?php endif; ?>
							</td>
							</tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Aqui é o formulário de registro do novo item-->
        <div id="new" class="tab-pane fade">
            <h3>Cadastrar Disciplina</h3>

            <form action="" method="post" id="cadastrarDisciplina">

				<div class="row">
					<div class="form-group col-md-6">
						<label>Nome</label>
						<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?= set_value('nome') ?>" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 margin-top-error">
						<?= form_error('nome') ?>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-2">
						<label>Sigla</label>
						<input type="text" maxlength="5" class="form-control" name="sigla" placeholder="ex: LOPA1" value="<?= set_value('sigla') ?>" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 margin-top-error">
						<?= form_error('sigla') ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label>Quantidade de professores</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4">
						<input type="text" maxlength="1" pattern="[0-9]+$" class="form-control" name="qtdProf" placeholder="ex: 1" value="<?= set_value('qtdProf') ?>" required style="width: 100px">
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 margin-top-error">
						<?= form_error('qtdProf') ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label>Semestre</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4">
						<input type="text" maxlength="2" pattern="[0-9]+$" class="form-control" name="semestre" placeholder="ex: 6" value="<?= set_value('semestre') ?>" required style="width: 100px">
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 margin-top-error">
						<?= form_error('semestre') ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label>Qtd. Aulas por Semana</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-4">
						<input type="text" maxlength="1" pattern="[0-9]+$" class="form-control" name="qtdAulas" placeholder="ex: 4" value="<?= set_value('qtdAulas') ?>" required style="width: 100px">
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 margin-top-error">
						<?= form_error('qtdAulas') ?>
					</div>
				</div>


                <div class="inline">
                    <button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
                </div>
            </form>
        </div>

    </div><!--fecha tab-content-->

</div><!--Fecha content-->

</div><!--Fecha row-->

<!-- Aqui é o Modal de alteração das disciplinas-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Disciplinas</h4>
            </div>
            <div class="modal-body">

				<?= form_open('Disciplina/atualizar', 'id="alterarDisciplina"') ?>

                <div class="form-group">
                    <input type="hidden" name="recipient-id" id="recipient-id">
                </div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="nome-name" class="control-label">Nome:</label>
						<input type="text" class="form-control" name="recipient-nome" id="recipient-nome" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 margin-top-error">
						<?= form_error('recipient-nome') ?>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-8">
						<label for="sigla-name" class="control-label">Sigla:</label>
						<input type="text" maxlength="5" class="form-control" name="recipient-sigla" id="recipient-sigla" required style="width:90px;">
					</div>
				</div>

                <div class="row">
					<div class="col-md-8 margin-top-error">
						<?= form_error('recipient-sigla') ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<label for="qtd-prof" class="control-label">Quantidade de professores:</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-8">
						<input type="text" maxlength="1" pattern="[0-9]+$" class="form-control" name="recipient-qtd-prof" id="recipient-qtd-prof" required style=" width:50px;">
					</div>
				</div>

                <div class="row">
					<div class="col-md-11 margin-top-error">
						<?= form_error('recipient-qtd-prof') ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<label for="semestre" class="control-label">Semestre:</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-8">
						<input type="text" maxlength="2" pattern="[0-9]+$"  class="form-control" name="recipient-semestre" id="recipient-semestre" required style=" width:50px;">
					</div>
				</div>

                <div class="row">
					<div class="col-md-11 margin-top-error">
						<?= form_error('recipient-semestre') ?>
					</div>
				</div>


				<div class="row">
					<div class="col-md-5">
						<label for="qtdAulas" class="control-label">Qtd.Aulas por Semana:</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-8">
						<input type="text" maxlength="1" pattern="[0-9]+$" class="form-control" name="recipient-qtdAula" id="recipient-qtdAula" required style=" width:50px;">
					</div>
				</div>

                <div class="row">
					<div class="col-md-11 margin-top-error">
						<?= form_error('recipient-qtdAula') ?>
					</div>
				</div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

				<?= form_close() ?>
            </div>
        </div>
    </div>
</div>


<!-- Aqui é o Modal2 de alteração das disciplinas-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Disciplinas</h4>
            </div>
            <div class="modal-body">

				<?= form_open('Disciplina/atualizar') ?>

                <div class="form-group">
                    <input type="hidden" name="recipient-id" id="recipient-id">
                </div>

				<div class="row">
					<div class="form-group col-md-12">
						<label for="nome-name" class="control-label">Nome:</label>
						<input type="text" class="form-control" name="recipient-nome" id="recipient-nome" required readonly/>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-3">
						<label for="sigla-name" class="control-label">Sigla:</label>
						<input type="text" maxlength="5" class="form-control" name="recipient-sigla" id="recipient-sigla" required readonly/>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<label for="qtd-prof" class="control-label">Quantidade de professores:</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-2">
						<input type="text" maxlength="1" pattern="[0-9]+$"  class="form-control" name="recipient-qtd-prof" id="recipient-qtd-prof" required readonly/>
					</div>
				</div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

                <div class="row">
					<div class="col-md-5">
						<label for="qtdAulas" class="control-label">Qtd.Aulas por Semana:</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-8">
						<input type="text" maxlength="1" pattern="[0-9]+$" class="form-control" name="recipient-qtdAula" id="recipient-qtdAula" required style=" width:50px;">
					</div>
				</div>

				<?= form_close() ?>
            </div>
        </div>
    </div>
</div>
