<!DOCTYPE html>
<html lang ="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro dos Professores</title>

				<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
				<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
				<link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/datatables.min.css') ?>">
				<link rel="stylesheet" type="text/css" href="<?= base_url('assets/multi-select/css/multi-select.css')?>">

	</head>
	<body>
		<!-- as classes container-fluid, row e col-md-xx são do GRID do bootstrap -->
		<!-- procure por 'bootstrap grid' e estude-as -->
		<div class="container-fluid">
			<div class="row">
				<div id="header" class="col">
					<div id="classclock">
						<h1>Class Clock</h1>
					</div>
					<div id="ifsp">

						<img src="<?= base_url('assets/img/ifsp.jpg')?>" class="logo">

					</div>
				</div>
			</div><!--Fecha row-->

			<div class="row">

				<div id="sidebar" class="col-md-2" role="navigation">
					<h2>Menu</h2>
					<ul class="nav nav-pills nav-stacked">
						<li><?= anchor('Curso','Cursos') ?></li>
						<li><?= anchor('Disciplina','Disciplinas') ?></li>
						<li class="active"><?= anchor('Professor','Professores') ?></li>
						<li><?= anchor('Sala','Salas') ?></li>
						<hr>
						<li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
					</ul>
				</div>

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
					<?php print_r($professores) ?>
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
								<div style="margin-top: 25px;">
									<table id="professorTable" class="table table-striped">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Matrícula</th>
											<th>Data Nascimento</th>
											<th>Nível acadêmico<th>
											<th>Contrato<th>
											<th>Status</th>
											<th>Ações</th>
										</tr>
									</thead>
									<tbody>
											<?php foreach ($professores as $professor) : ?>
												<?= ($professor['status'] ? '<tr>' : '<tr class="danger">') ?>
														<td><?= $professor['nome'] ?></td>
														<td><?= $professor['matricula'] ?></td>
														<td><?= sqlToBr($professor['nascimento']) ?></td>
														<td><?= $professor['nivel'] ?></td>
														<td></td>
														<td><?= $professor['contrato'] ?></td>
														<td></td>
														<td><?= ($professor['status']) ? "Ativo" : "Inativo"?></td>
														<td><?php if($professor['status']): ?>
															<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whatevernome="<?= $professor['nome']?>" data-whateverid="<?= $professor['id']?>" data-whatevercontrato="<?= $professor['idContrato']?>" data-whatevernivel="<?= $professor['idNivel']?>" data-whatevermatricula= "<?= $professor['matricula']?>" data-whatevernascimento= "<?= sqlToBr($professor['nascimento']) ?>"><span class="glyphicon glyphicon-pencil"></span></button>
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
								<div class="form-group percent-40">
									<label>Nome</label>
									<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?= set_value('nome')?>"/>
									<?= form_error('nome') ?>
								</div>
								<div class="form-group">
									<label>Matrícula</label>
									<input type="text" class="form-control percent-20" name="matricula"  maxlength="7" placeholder="ex: cg0000000" value="<?= set_value('matricula')?>"/>
									<?= form_error('matricula') ?>
								</div>
								<div class="form-group disc">
									<label>Disciplinas que pode lecionar</label>
									<?= form_dropdown('disciplinas[]',$disciplinas,set_value('disciplinas[]'),array('id'=>'disciplinas','multiple'=>'multiple')) ?>
									<?= form_error('disciplinas[]') ?>
								</div>
								<div class="form-group percent-40">
									<label>Data de Nascimento</label>
									<input type="text" class="form-control percent-40" name="nascimento" value="<?= set_value('nascimento')?>"/>
									<?= form_error('nascimento') ?>
								</div>
								<div class="form-group percent-30 inline">
										<label for="nivelAcademico" >Nivel Acadêmico</label>
										<div id="u1" class="ax_default droplist" data-label="DropListNivel">
											<?= form_dropdown('nivel',$nivel,set_value('nivel'),array('class'=>'form-control')) ?>
											<?= form_error('nivel') ?>
										</div>
								</div>
								<div class="form-group percent-30 inline">
									<label>Regime de contrato</label>
									<div id="u2" class="ax_default droplist" data-label="DropListContrato">
										<?= form_dropdown('contrato',$contrato,set_value('contrato'),array('class'=>'form-control')) ?>
										<?= form_error('contrato') ?>
									</div>
									</select>
								</div>
								<div class="form-group percent-50">
									<input id="coordenador" type="checkbox" name="coordenador" class="form-group" value="<?= set_value('coordenador')?>"/>
									<label for="coordenador">Coordenador</label>
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
								<div class="form-group">
									<label>Nome</label>
									<input type="text" class="form-control" name="recipient-nome" placeholder="Nome" id="recipient-nome" value="<?= set_value('nome')?>"/>
									<?= form_error('recipient-nome') ?>
								</div>
								<div class="form-group">
									<label>Matrícula</label>
									<input type="text" class="form-control percent-20" name="recipient-matricula"  id="recipient-matricula" maxlength="7" placeholder="ex: cg0000000" value="<?= set_value('recipient-matricula')?>"/>
									<?= form_error('recipient-matricula') ?>
								</div>
								<div class="form-group percent-50">
									<label>Disciplinas que pode lecionar: </label>
									<!-- Pessoal do back-end, aqui o campo de texto deverá auto-completar o que o usuário começar a digitar -->
									<?= form_dropdown('professorDisciplinas[]',$disciplinas,set_value('professorDisciplinas[]'),array('id'=>'professorDisciplinas','multiple'=>'multiple')) ?>
									<?= form_error('professorDisciplinas[]') ?>
								</div>
								<div class="form-group percent-50">
									<label>Data de Nascimento</label>
									<input type="text" class="form-control percent-40" name="recipient-nascimento" id="recipient-nascimento" value="<?= set_value('nascimento')?>"/>
									<?= form_error('recipient-nascimento') ?>
								</div>
								<div class="form-group">
									<label for="nivelAcademico" >Nivel Acadêmico</label>
									<div id="u1" class="ax_default droplist" data-label="DropListNivel">
										<?= form_dropdown('recipient-nivelAcademico',$nivel,set_value('recipient-nivelAcademico'),array('class'=>'form-control')) ?>
										<?= form_error('recipient-nivelAcademico') ?>
								</div>
								<div class="form-group percent-30 inline">
									<label>Regime de contrato</label>
									<div id="u2" class="ax_default droplist" data-label="DropListContrato">
										<?= form_dropdown('recipient-contrato',$contrato,set_value('recipient-contrato'),array('class'=>'form-control')) ?>
										<?= form_error('recipient-contrato') ?>
									</div>
								</div>
								<div class="form-group percent-50">
									<input type="checkbox" name="coordenador" class="form-group" id="recipient-coordenador"/>
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



			<div class="row">
				<div id="footer" class="col">
					<p>Desenvolvido por Metal Code</p>
				</div>
			</div><!--Fecha row-->

		</div><!--Fecha container-fluid-->


		<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootbox.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/JqueryMask/jquery.mask.min.js')?>"></script>
		<!-- multi-select -->
    <script type="text/javascript" src="<?= base_url('assets/multi-select/js/jquery.multi-select.js')?>"></script>
    <script>
    	$("#professorDisciplinas").multiSelect();
    	$("#disciplinas").multiSelect();
    </script>
		<script type="text/javascript">
			$('#exampleModal').on('show.bs.modal', function (event) {
				$("#professorDisciplinas").multiSelect('deselect_all');
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				<!-- Foi criado todos os var caso seja necessario adicionar ou mudar os que já existem-->
				var recipientnome = button.data('whatevernome')
				var recipientmatricula = button.data('whatevermatricula')
				var recipientnomeDisciplina = button.data('whatevernomeDisciplina')
				var recipientnascimento = button.data('whatevernascimento')
				var recipientnivelAcademico = button.data('whatevernivel')
				var recipientregimeContrato = button.data('whatevercontrato')
				var recipientcoordenador = button.data('whareevercoordenador')
				var recipientid = button.data('whateverid')
				var url = '<?= base_url('index.php/Professor/disciplinas/') ?>'+recipientid;
				$.getJSON(url,function (response) {
					var disciplinas = [];
					$.each(response,function (index,value) {
						disciplinas.push(value.id);
					});
					$("#professorDisciplinas").multiSelect('select',disciplinas);
				});

				console.log(recipientnivelAcademico);

				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('Alterar Professores')
				<!-- Foi criado todos os modal caso seja necessario adicionar ou mudar os que já existem-->
				modal.find('#recipient-nome').val(recipientnome)
				modal.find('#recipient-matricula').val(recipientmatricula)
				modal.find('#recipient-nomeDisciplina').val(recipientnomeDisciplina)
				modal.find('#recipient-nascimento').val(recipientnascimento)
				modal.find('select[name=recipient-nivelAcademico] option[value='+recipientnivelAcademico+']').prop('selected',true)
				modal.find('select[name=recipient-contrato] option[value='+recipientregimeContrato+']').prop('selected',true)
				modal.find('#recipient-coordenador').val(recipientcoordenador)
				modal.find('#recipient-id').val(recipientid)
			})
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#professorTable").DataTable({
					"language":{
						"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
					}
				});
			});
		</script>
		<script type="text/javascript">
			function exclude(id){
				bootbox.confirm({
					message: "Realmente deseja desativar esse Professor?",
					buttons: {
						confirm: {
							label: 'Sim',
							className: 'btn-success'
						},
						cancel: {
							label: 'Não',
							className: 'btn-danger'
						}
					},
					callback: function (result) {
						if(result)
							window.location.href = '<?= base_url('index.php/Professor/desativar/')?>'+id
					}
				});
			}
			function able(id){
				bootbox.confirm({
					message: "Realmente deseja ativar esse Professor?",
					buttons: {
						confirm: {
							label: 'Sim',
							className: 'btn-success'
						},
						cancel: {
							label: 'Não',
							className: 'btn-danger'
						}
					},
					callback: function (result) {
						if(result)
							window.location.href = 'Professor/ativar/'+id
					}
				});
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("input[name=nascimento]").mask('00/00/0000', {placeholder: "__/__/____"});
			});
		</script>

	</body>
</html>
