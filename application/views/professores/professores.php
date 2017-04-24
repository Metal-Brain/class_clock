<div id="content" class="col-md-10">
					<?php if (validation_errors()): ?>
					<div class="alert alert-danger text-center">
						<p><?= $this->session->flashdata('formDanger') ?></p>
						<?= validation_errors() ?>
					</div>
				<?php endif; ?>

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

				<h1>Professores</h1>
				<!-- Lista de 'botoes' links do Bootstrap -->
				<ul class="nav nav-pills">
					<!-- 'botao' link para a listagem -->
					<li class="active"><a data-toggle="pill" href="#list">Listar todos</a></li>
					<!-- 'botao' link para novo registro -->
					<li><a data-toggle="pill" href="#new">Cadastrar</a></li>
				</ul>
			<div class="tab-content">
					<!-- Aqui é a Listagem dos Itens -->
						<div id="list" class="tab-pane fade in active">
							<div style="margin-top: 25px;">
								<table id="professorTable" class="table table-striped">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Matrícula</th>
											<th>Email</th>
											<th>Data Nascimento</th>
											<th>Nível acadêmico</th>
											<th>Contrato</th>
											<th>Status</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tbody>
											<?php foreach ($professores as $professor) : ?>
												<?= ($professor['status'] ? '<tr>' : '<tr class="danger">') ?>
														<td><?= $professor['nome'] ?></td>
														<td><?= $professor['matricula'] ?></td>
														<td><?= $professor['email'] ?></td>
														<td><?= sqlToBr($professor['nascimento']) ?></td>
														<td><?= $professor['nivel'] ?></td>
														<td><?= $professor['contrato'] ?></td>
														<td><?= ($professor['status']) ? "Ativo" : "Inativo"?></td>
														<td><?php if($professor['status']): ?>
															<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whatevernome="<?= $professor['nome']?>" data-whateverid="<?= $professor['id']?>" data-whatevercoordenador="<?= $professor['coordenador']?>" data-whatevercontrato="<?= $professor['idContrato']?>" data-whatevernivel="<?= $professor['idNivel']?>" data-whatevermatricula= "<?= $professor['matricula']?>" data-whateveremail="<?= $professor['email']?>" data-whatevernascimento= "<?= sqlToBr($professor['nascimento']) ?>"><span class="glyphicon glyphicon-pencil"></span></button>
															<button onClick="exclude(<?= $professor['id']?>);" type="button" class="btn btn-danger" title="Excluir"><span class="glyphicon glyphicon-remove"></span></button>
													<?php else:?>
														<button onClick="able(<?= $professor['id']?>)" type="button" class="btn btn-success" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
													<?php endif;?>
													</td>
												</tr>
											<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>

						<!-- Aqui é o formulário de registro do novo item-->
						<div id="new" class="tab-pane fade">
							<h3>Cadastrar Professor</h3>
							<?= form_open('Professor') ?>
							<div class="row">
								<div class="form-group col-md-6">
									<label>Nome</label>
									<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?= set_value('nome')?>"/>
									<?= form_error('nome') ?>
								</div>
							</div>
							
							<div class="row">	
								<div class="form-group col-md-2">
									<label>Matrícula</label>
									<input type="text" class="form-control percent-20" name="matricula"  maxlength="8" placeholder="ex: cg0000000" value="<?= set_value('matricula')?>"/>
									<?= form_error('matricula') ?>
								</div>
							</div>	
							
							<div class="row">	
								<div class="form-group col-md-4">
									<label>Email</label>
									<input type="email" class="form-control percent-40" name="email" placeholder="Email" value="<?= set_value('email')?>"/>
									<?= form_error('email') ?>
								</div>
							</div>	
							
							<div class="row">	
								<div class="form-group disc col-md-5">
									<label>Disciplinas que pode lecionar</label>
									<?= form_dropdown('disciplinas[]',$disciplinas,set_value('disciplinas[]'),array('id'=>'disciplinas','multiple'=>'multiple')) ?>
									<?= form_error('disciplinas[]') ?>
								</div>
							</div>	
							
							<div class="row">	
								<div class="form-group col-md-2">
									<label>Data de Nascimento</label>
									<input type="text" class="form-control percent-40" name="nascimento" value="<?= set_value('nascimento')?>"/>
									<?= form_error('nascimento') ?>
								</div>
							</div>
							
							<div class="row">	
								<div class="form-group col-md-2">
										<label for="nivelAcademico" >Nivel Acadêmico</label>
										<div id="u1" class="ax_default droplist" data-label="DropListNivel">
											<?= form_dropdown('nivel',$nivel,set_value('nivel'),array('class'=>'form-control')) ?>
											<?= form_error('nivel') ?>
										</div>
								</div>
							</div>	
								
							<div class="row">	
								<div class="form-group col-md-2">
									<label>Regime de contrato</label>
									<div id="u2" class="ax_default droplist" data-label="DropListContrato">
										<?= form_dropdown('contrato',$contrato,set_value('contrato'),array('class'=>'form-control')) ?>
										<?= form_error('contrato') ?>
									</div>
								</div>
							</div>	
								
							<div class="row">	
								<div class="form-group col-md-2">
									<input id="coordenador" type="checkbox" name="coordenador" class="form-group" value="true"/>
									<label for="coordenador">Coordenador</label>
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

		<!-- Aqui é o Modal de alteração dos professores-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Professor</h4>
					</div>
					<div class="modal-body">
						<?= form_open('Professor/atualizar') ?>
							<div class="form-group">
								<input type="hidden" name="recipient-id" id="recipient-id">
							</div>
							<div class="form-group col-md-12">
								<label>Nome</label>
								<input type="text" class="form-control" name="recipient-nome" placeholder="Nome" id="recipient-nome" value="<?= set_value('nome')?>"/>
								<?= form_error('recipient-nome') ?>
							</div>
							<div class="form-group col-md-12">
								<label>Matrícula</label>
								<input type="text" class="form-control percent-20" name="recipient-matricula"  id="recipient-matricula" maxlength="8" placeholder="ex: cg0000000" value="<?= set_value('recipient-matricula')?>"/>
								<?= form_error('recipient-matricula') ?>
							</div>
								<div class="form-group col-md-12">
								<label>Email</label>
								<input type="email" class="form-control" name="recipient-email" placeholder="Email" id="recipient-email" value="<?= set_value('email')?>"/>
								<?= form_error('recipient-email') ?>
							</div>
							<div class="form-group col-md-12">
								<label>Disciplinas que pode lecionar: </label>
								<!-- Pessoal do back-end, aqui o campo de texto deverá auto-completar o que o usuário começar a digitar -->
								<?= form_dropdown('professorDisciplinas[]',$disciplinas,set_value('professorDisciplinas[]'),array('id'=>'professorDisciplinas','multiple'=>'multiple')) ?>
								<?= form_error('professorDisciplinas[]') ?>
							</div>
							<div class="form-group col-md-12">
								<label>Data de Nascimento</label>
								<input type="text" class="form-control percent-40" name="recipient-nascimento" id="recipient-nascimento" value="<?= set_value('nascimento')?>"/>
								<?= form_error('recipient-nascimento') ?>
							</div>
							<div class="form-group col-md-12">
								<label for="nivelAcademico" >Nivel Acadêmico</label>
								<div id="u1" class="ax_default droplist" data-label="DropListNivel">
									<?= form_dropdown('recipient-nivelAcademico',$nivel,set_value('recipient-nivelAcademico'),array('class'=>'form-control')) ?>
									<?= form_error('recipient-nivelAcademico') ?>
								</div>
							</div>
							<div class="form-group col-md-12 inline">
								<label>Regime de contrato</label>
								<div id="u2" class="ax_default droplist" data-label="DropListContrato">
									<?= form_dropdown('recipient-contrato',$contrato,set_value('recipient-contrato'),array('class'=>'form-control')) ?>
									<?= form_error('recipient-contrato') ?>
								</div>
							</div>
							<div class="form-group col-md-12">
								<input type="checkbox" name="recipient-coordenador" value="true" class="form-group" id="recipient-coordenador"/>
								<label for="recipient-coordenador">Coordenador</label>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Alterar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
