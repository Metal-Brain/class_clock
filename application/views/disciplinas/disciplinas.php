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
    <ul class="nav nav-pills">
        <!-- 'botao' link para a listagem -->
        <li class="active"><a data-toggle="pill" href="#list">Listar todas</a></li>
        <!-- 'botao' link para novo registro -->
        <li><a data-toggle="pill" href="#new">Cadastrar</a></li>
    </ul>

    <!-- Dentro dessa div vai o conteúdo que os botões acima exibem ou omitem -->
    <div class="tab-content">

        <!-- Aqui é a Listagem dos Itens -->
        <div id="list" class="tab-pane fade in active">
            <div style="margin-top: 25px;">
                <table id="disciplinaTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sigla</th>
                            <th>Nome</th>
                            <th>Qtd. Professores</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($disciplinas as $disciplina): ?>
                            <?= ($disciplina['status'] ? '<tr>' : '<tr class="danger">') ?>
							<td><?= $disciplina['sigla'] ?></td>
							<td><?= $disciplina['nome'] ?></td>
							<td><?= $disciplina['qtdProf'] ?></td>
							<td><?php
								if ($disciplina['status']): echo "Ativo";
								else: echo "Inativo";
								endif;
                            ?></td>
							<td>
								<?php if ($disciplina['status']): ?>
									<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whateversigla="<?= $disciplina['sigla'] ?>" data-whatevernome="<?= $disciplina['nome'] ?>" data-whateverid="<?= $disciplina['id'] ?>" data-whateverqtdprof="<?= $disciplina['qtdProf'] ?>"><span class="glyphicon glyphicon-pencil"></span></button>
									<button onClick="disable(<?= $disciplina['id'] ?>)" type="button" class="btn btn-danger delete" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
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

            <form action="" method="post">
                <div class="form-group percent-40">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?= set_value('nome') ?>">
					<?= form_error('nome') ?>
                </div>
                <div class="form-group">
                    <label>Sigla</label>
                    <input type="text" class="form-control percent-40" name="sigla" placeholder="ex: LOPA1" value="<?= set_value('sigla') ?>">
					<?= form_error('sigla') ?>
                </div>
                <div class="form-group">
                    <label>Quantidade de professores</label>
                    <input type="text" maxlength="1" pattern="[0-9]+$" class="form-control percent-5" name="qtdProf" placeholder="ex: 1" value="<?= set_value('qtdProf') ?>">
					<?= form_error('qtdProf') ?>
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
				<?= form_open('Disciplina/atualizar') ?>

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
					<div class="col-md-6 margin-top-error">
						<?= form_error('recipient-nome') ?>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-3">
						<label for="sigla-name" class="control-label">Sigla:</label>
						<input type="text" class="form-control" name="recipient-sigla" id="recipient-sigla" required>
					</div>
				</div>

                <div class="row">
					<div class="col-md-5 margin-top-error">
						<?= form_error('recipient-sigla') ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<label for="qtd-prof" class="control-label">Quantidade de professores:</label>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-2">
						<input type="text" maxlength="1" pattern="[0-9]+$"  class="form-control" name="recipient-qtd-prof" id="recipient-qtd-prof" required>
					</div>
				</div>

                <div class="row">
					<div class="col-md-8 margin-top-error">
						<?= form_error('recipient-qtd-prof') ?>
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
