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

    <h1>Salas</h1>

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
                <table id="salaTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Número da Sala</th>
                            <th>Capacidade Máxima</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($salas as $sala) { ?>
							<?= ($sala['status'] ? '<tr>' : '<tr class="danger">') ?>
							<td><?= $sala['nSala']; ?></td>
							<td><?= $sala['capMax']; ?></td>
							<td><?= $sala['tipo']; ?></td>
							<td><?php if ($sala['status']): echo "Ativo";
							else: echo "Inativo";
							endif; ?></td>
							<td>
								<?php if ($sala['status']): ?>
									<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whatevernsala="<?= $sala['nSala']; ?>" data-whateverid="<?= $sala['id']; ?>" data-whatevercapmax="<?= $sala['capMax']; ?>"  data-whatevertipo="<?= $sala['tipo']; ?>"><span class="glyphicon glyphicon-pencil"></span></button>
									<button onClick="exclude(<?= $sala['id'] ?>);" type="button" class="btn btn-danger" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
								<?php else : ?>
									<button onClick="able(<?= $sala['id'] ?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
								<?php endif; ?>
							</td>
							</tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Aqui é o formulário de registro do novo item-->
        <div id="new" class="tab-pane fade">
            <h3>Cadastrar Sala</h3>
			
            <form action="" method="post">
				
				<div class="row">
					<div class="form-group col-md-2">
						<label>Sala</label>
						<input type="number" min="0" class="form-control" pattern="[0-9]+$" name="nSala" placeholder="ex: 110" required>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 margin-top-error">
						<?= form_error('nSala') ?>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-2">
						<label for="tipo">Tipo</label>
						<select  class="form-control" name="tipo" id="tipo" required>
							<option  selected>Laboratório</option>
							<option>Teórica</option>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 margin-top-error">
						<?= form_error('tipo') ?>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-2">
						<label>Capacidade Máxima</label>
						<input type="number" min="0" max="999" class="form-control" name="capMax" placeholder="ex: 30" required>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 margin-top-error">
						<?= form_error('capMax') ?>
					</div>
				</div>
				
                <div class="inline">
                    <button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
                </div>
            </form>
        </div>

    </div><!--Fecha tab-content-->

</div><!--Fecha content-->

</div><!--Fecha row-->

<!-- Aqui é o Modal de alteração das salas-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Salas</h4>
            </div>
            <div class="modal-body">
			
				<?= form_open('Sala/atualizar') ?>
				
                <div class="form-group">
                    <input type="hidden" name="recipient-id" id="recipient-id">
                </div>
				
				<div class="row">
					<div class="form-group col-md-2">
						<label for="nSala-name" class="control-label">Sala</label>
						<input type="number" min="0" class="form-control" name="recipient-nSala" id="recipient-nSala" required>
					</div>
                </div>
				
				<div class="row">
					<div class="col-md-6 margin-top-error">
						<?= form_error('recipient-nSala') ?>
					</div>
				</div>
                
				<div class="row">
					<div class="form-group col-md-4">
						<label for="tipo-name" class="control-label">Tipo</label>
						<select  class="form-control" name="recipient-tipo" id="recipient-tipo" required>
							<option>Laboratório</option>
							<option>Teórica</option>
						</select>
					</div>
                </div>
				
				<div class="row">
					<div class="col-md-6 margin-top-error">
						<?= form_error('recipient-tipo') ?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<label for="capMax-name" class="control-label">Capacidade Máxima</label>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-2">
						<input type="number" max="999" maxlength="3" pattern="[0-9]+$"class="form-control" name="recipient-capMax" id="recipient-capMax" required>
					</div>
                </div>
				
				<div class="row">
					<div class="col-md-7 margin-top-error">
						<?= form_error('recipient-capMax') ?>
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
