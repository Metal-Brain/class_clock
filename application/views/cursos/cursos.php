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

    <h1>Cursos</h1>

    <!-- Lista de 'botoes' links do Bootstrap -->
    <ul class="nav nav-pills">
        <!-- 'botao' link para a listagem -->
        <li class="active"><a data-toggle="pill" href="#list">Listar todos</a></li>
        <!-- 'botao' link para novo registro -->
        <li><a data-toggle="pill" href="#new">Cadastrar</a></li>
    </ul>

    <!-- Dentro dessa div vai o conteúdo que os botões acima exibem ou omitem -->
    <div class="tab-content">
        <!-- Aqui é a Listagem dos Itens -->
        <div id="list" class="tab-pane fade in active">
            <div style="margin-top:25px;">
                <table id="curso-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sigla</th>
                            <th>Nome</th>
                            <th>Qtd. Semestres</th>
                            <th>Período</th>
                            <th>Grau</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cursos as $curso) : ?>
                                <?= ($curso['status'] ? '<tr>' : '<tr class="danger">') ?>
                                <td><?= $curso['sigla'] ?></td>
                                <td><?= $curso['nome'] ?></td>
                                <td><?= $curso['qtdSemestres'] ?></td>
                                <td><?= $curso['periodo'] ?></td>
                                <td><?= $curso['grauNome'] ?></td>
                                <td><?php
                                    if ($curso['status']): echo "Ativo";
                                    else: echo "Inativo";
                                    endif;
                                    ?></td>
                                <td>
                                    <?php if ($curso['status']): ?>
                                        <button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?= $curso['id'] ?>" data-whateversigla="<?= $curso['sigla'] ?>" data-whatevernome="<?= $curso['nome'] ?>" data-whateversemestres="<?= $curso['qtdSemestres'] ?>" data-whatevergrau="<?= $curso['grau'] ?>" data-whateverperiodo="<?= $curso['idPeriodo'] ?>"><span class="glyphicon glyphicon-pencil"></span></button>
                                        <button onClick="exclude(<?= $curso['id'] ?>);" type="button" class="btn btn-danger" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
                                    <?php else: ?>
                                        <button onClick="able(<?= $curso['id'] ?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
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
            <h3>Cadastrar Curso</h3>

            <?= form_open('Curso/cadastrar') ?>

            <div class="row">
                <div class="form-group col-md-6">
                    <?= form_label('Nome', 'nome') ?>
                    <?= form_input('nome', set_value('nome'), array('class' => 'form-control', 'placeholder' => 'ex: Análise e Desenvolvimento de Sistemas', 'required' => 'required')) ?>
                </div>
            </div>

			<div class="row">
				<div class="col-md-3 margin-top-error">
					<?= form_error('nome') ?>
				</div>
			</div>

            <div class="row">
                <div class="form-group col-md-2">
                    <?= form_label('Sigla', 'sigla') ?>
                    <?= form_input('sigla', set_value('sigla'), array('class' => 'form-control', 'placeholder' => 'ex: ADS', 'maxlength' => '5', 'required' => 'required')) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 margin-top-error">
					<?= form_error('sigla') ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<label>Quantidade de semestres</label>
				</div>
			</div>

            <div class="row">
                <div class="form-group col-md-2">
                    <?= form_input(array('name' => 'qtdSemestres', 'value' => set_value('qtdSemestres'), 'type' => 'number', 'maxlength' => '2', 'pattern' => '[0-9]+$', 'class' => 'form-control', 'placeholder' => 'ex: 6', 'required' => 'required')) ?>
                </div>
            </div>

			<div class="row">
                <div class="col-md-6 margin-top-error">
					<?= form_error('qtdSemestres') ?>
				</div>
			</div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label>Período</label>
                    <?= form_dropdown('periodo[]', $periodo, null, array('id' => 'periodos', 'multiple' => 'multiple')) ?>
                </div>
            </div>

			<div class="row">
				<div class="col-md-3 margin-top-error">
					<?= form_error('periodo[]') ?>
				</div>
			</div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Grau</label>
                    <!-- <div id="u1" class="ax_default droplist" data-label="DropListGrau"> -->
					<?= form_dropdown('grau', $graus, set_value('grau'), array('class' => 'form-control')) ?>
                </div>
            </div>

			<div class="row">
				<div class="col-md-3 margin-top-error">
					<?= form_error('grau') ?>
				</div>
			</div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label>Disciplinas </label>
                    <?= form_dropdown('disciplinas[]', $disciplinas, set_value('disciplinas[]'), array('id' => 'disciplinas', 'multiple' => 'multiple')) ?>
                </div>
            </div>

			<div class="row">
				<div class="col-md-6 margin-top-error">
					<?= form_error('disciplinas[]') ?>
				</div>
			</div>

			<div class="form-group">
				<?= form_submit('submit', 'Cadastrar', array('class' => 'btn btn-primary')) ?>
			</div>


            <?= form_close() ?>
        </div>
    </div><!--fecha tab-content-->
</div><!--Fecha content-->

<!-- Aqui é o Modal de alteração dos cursos-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Cursos</h4>
            </div>
            <div class="modal-body">

				<?= form_open('Curso/atualizar') ?>

				<div class="form-group">
					<input type="hidden" name="cursoId" value="" id="recipient-id">
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<?= form_label('Nome:', 'recipient-nome', array('class' => 'control-label')) ?>
						<?= form_input('nomeCurso', set_value('nomeCurso'), array('class' => 'form-control', 'id' => 'recipient-nome', 'required' => 'required')) ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 margin-top-error">
						<?= form_error('nomeCurso') ?>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-3">
						<?= form_label('Sigla:', 'recipient-sigla', array('class' => 'control-label')) ?>
						<?= form_input('cursoSigla', set_value('cursoSigla'), array('class' => 'form-control', 'id' => 'recipient-sigla', 'maxlength' => '5', 'required' => 'required')) ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 margin-top-error">
						<?= form_error('cursoSigla') ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<?= form_label('Quantidade de Semestres:', 'recipient-semestres', array('class' => 'control-label')) ?>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-2">
						<?= form_input('cursoQtdSemestres', set_value('cursoQtdSemestres'), array('pattern' => '[0-9]+$', 'maxlength' => '2', 'id' => 'recipient-semestres', 'class' => 'form-control', 'required' => 'required')) ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-11 margin-top-error">
						<?= form_error('cursoQtdSemestres') ?>
					</div>
				</div>

				<div class="row">
					<!-- DropListPeriodo (Droplist) -->
					<div class="form-group col-md-9">
						<label>Período:</label>
						<?= form_dropdown('cursoPeriodos[]', $periodo, null, array('id' => 'cursoPeriodos', 'multiple' => 'multiple')) ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 margin-top-error">
						<?= form_error('cursoPeriodos[]') ?>
					</div>
				</div>

				<div class="row">
					<!-- DropListGrau (Droplist) -->
					<div class="form-group col-md-7">
						<label for="curso-name" class="control-label">Grau:</label>
						<?= form_dropdown('cursoGrau', $graus, null, array('class' => 'form-control')) ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 margin-top-error">
						<?= form_error('cursoGrau') ?>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-9">
						<label>Disciplinas:</label>
						<?= form_dropdown('cursoDisciplinas[]', $disciplinas, null, array('id' => 'cursoDisciplinas', 'multiple' => 'multiple')) ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-10 margin-top-error">
						<?= form_error('cursoDisciplinas[]') ?>
					</div>
				</div>

				<div class="modal-footer">
					<?= form_submit('submit', 'Alterar', array('class' => 'btn btn-primary')) ?>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>

				<?= form_close() ?>
            </div>
        </div>
    </div>
</div>
