<!DOCTYPE html>
<html lang ="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro dos Professores</title>
					
				<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
				<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
				<link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/datatables.min.css') ?>">
				
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
						
						<img src="<?= base_url('assets/img/ifsp.png')?>" class="logo">
						
					</div>
				</div>
			</div><!--Fecha row-->
			
			<div class="row">

				<div id="sidebar" class="col-md-2" role="navigation">
					<h2>Menu</h2>
					<ul class="nav nav-pills nav-stacked">
						<li><?= anchor('Curso','Cursos') ?></li>
						<li><?= anchor('Disciplina','Disciplina') ?></li>
						<li class="active"><?= anchor('Professor','Professor') ?></li>
						<li><?= anchor('Sala','Sala') ?></li>
						<hr>
						<li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
					</ul>
				</div>

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
				
				
				
					<h1>Professores</h1>

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
						<div style="margin-top: 25px;">
							<div id="list" class="tab-pane fade in active">
								<table id="professorTable" class="table table-striped">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Matricula</th>
											<th>Nivel Acadêmico</th>
											<th>Visualizar</th>
										</tr>
									</thead>
									<tbody>
										<tbody>
										
											
											<?php
												foreach ($Professor as $Professor) {
													$row = '<tr>
														<td>'.$professor['nome'].'</td>
														<td>'.$professor['matricula'].'</td>
														<td>'.$professor['nivelAcademico'].'</td>
														<td>
														
															
															<button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whatevernome="'.$professor['nome'].'" data-whateverid="'.$professor['id'].'" data-whatevermatricula= "'.$professor['matricula'].'" data-whatevernivelAcademico= "'.$professor['nivelAcademico'].'"><span class="glyphicon glyphicon-pencil"></span></button>
															<button onClick="exclude('.$professor['id'].');" type="button" class="btn btn-danger delete" title="Editar" "><span class="glyphicon glyphicon-remove"></span></button>
															
														</td>
													</tr>';

													echo $row;
												}
									
											?> 
											
											
									
									
										
										
									</tbody>
								</table>
							</div>	
						</div>

						<!-- Aqui é o formulário de registro do novo item-->
						<div id="new" class="tab-pane fade">
							<h3>Cadastrar Professores</h3>
							<form>
								<div class="form-group percent-40 inline">
									<label>Nome</label>
									<input type="text" pattern="[A-Za-z]" class="form-control" name="nome" placeholder="Nome" value="<?= set_value('nome')?>"/>
									<?= form_error('nome') ?>
								</div>
								<div class="form-group percent-20 inline">
									<label>Matricula</label>
									<input type="text" class="form-control" name="matricula"  maxlength="8" placeholder="ex: cg0000000" value="<?= set_value('matricula')?>"/>
									<?= form_error('matricula') ?>
								</div>
								<div class="form-group percent-50">
									<label>Disciplina que pode lecionar: </label>
									<!-- Pessoal do back-end, aqui o campo de texto deverá auto-completar o que o usuário começar a digitar -->
									<input type="text" class="form-control" name="nomeDisciplina" placeholder="ex: Arquitetura de Computadores" value="<?= set_value('nomeDisciplina')?>"/>
									<?= form_error('nomeDisciplina') ?>
								</div>
								<div class="form-group percent-40">
									<label>Data de Nascimento</label>
									<input type="date" class="form-control percent-40" name="nascimento" value="<?= set_value('nascimento')?>"/>
									<?= form_error('nascimento') ?>
								</div>
								<div class="form-group percent-30 inline">
										<label for="nivelAcademico" >Nivel Acadêmcio:</label>
										<select  class="form-control" name="nivelAcademico" id="nivelAcademico" value="<?= set_value('nivelAcademico')?>">
											<option  selected>Mestre</option>
											<option>Doutor</option>
											<?= form_error('nivelAcademico') ?>
										</select>
									
									
								</div>
								<div class="form-group percent-30 inline">
									<label>Regime de contrato</label>
									<select  class="form-control" name="regimeContrato" id="regimeContrato" value="<?= set_value('regimeContrato')?>">
											<option  selected>Dedicação exclusiva</option>
											<option>Integral</option>
											<option>Parcial</option>
											<?= form_error('regimeContrato') ?>
									</select>
								</div>
								<div class="form-group percent-50">
									<input type="checkbox" name="coordenador" class="form-group" value="<?= set_value('coordenador')?>"/>
									<label>Coordenador</label>
									<?= form_error('coordenador') ?>
								</div>								

								
								<div class="inline">
									<button type='submit' class='btn bt-lg btn-primary'>Cadastrar</button>
									<button type='reset' class='btn bt-lg btn-default'>Limpar Campos</button>
								</div>
							</form>
						</div>

					</div><!--fecha tab-content-->

				</div><!--Fecha content-->

			</div><!--Fecha row-->
			
			<!-- Aqui é o Modal de visualização dos professores-->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Professor</h4>
						</div>
						<div class="modal-body">
							<p>Nome</p>
							<p>Matricula</p>
							<p>Nivel acadêmico</p>
						</div>
					</div>
				</div>
			</div>

			
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
									<label for="nome-name" class="control-label">Professor</label>
									<input type="text" class="form-control" id="recipient-nome">
									<?= form_error('recipient-nome') ?>
								</div>
								<div class="form-group">
									<label for="matricula-name" class="control-label">Matricula</label>
									<input type="text" class="form-control" id="recipient-matricula">
									<?= form_error('recipient-matricula') ?>
								</div>
								<div class="form-group percent-50">
								<label>Disciplina que pode lecionar: </label>
									<!-- Pessoal do back-end, aqui o campo de texto deverá auto-completar o que o usuário começar a digitar -->
									<input type="text" class="form-control" name="nomeDisciplina" id="recipient-nomeDisciplina"/>
								</div>
								<div class="form-group percent-40">
									<label>Data de Nascimento</label>
									<input type="date" class="form-control percent-40" name="nascimento" id="recipient-nascimento"/>
									<?= form_error('recipient-nascimento') ?>
								</div>
								<div class="form-group">
									<!--<label for="tipo-name" class="control-label">Tipo</label>
									<input type="text" class="form-control" id="recipient-tipo">-->
									
									<label for="nivelAcademico-name" class="control-label">Nivel Acadêmico</label>
										<select  class="form-control" name="nivelAcademico" id="recipient-nivelAcademico">
											<option>Mestre</option>
											<option>Doutor</option>
										</select>
										<?= form_error('recipient-nivelAcademico') ?>
									
									
									
								</div>
								<div class="form-group percent-30 inline">
									<label>Regime de contrato</label>
									<select  class="form-control" name="regimeContrato" id="recipient-regimeContrato">
											<option  selected>Dedicação exclusiva</option>
											<option>Integral</option>
											<option>Parcial</option>
											<?= form_error('recipient-regimeContrato') ?>
									</select>
								</div>
								
								<div class="form-group percent-50">
									<input type="checkbox" name="coordenador" class="form-group" id="recipient-coordenador"/>
									<label>Coordenador</label>
									<?= form_error('recipient-coordenador') ?>
								</div>		
								
								
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-danger">Alterar</button>
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
		
	
		<script type="text/javascript"> 
		
				$('#exampleModal').on('show.bs.modal', function (event) {
						var button = $(event.relatedTarget) // Button that triggered the modal
						var recipient = button.data('whatever') // Extract info from data-* attributes
						<!-- Foi criado todos os var caso seja necessario adicionar ou mudar os que já existem-->			
						var recipientnome = button.data('whatevernome')
						var recipientmatricula = button.data('whatevermatricula')
						var recipientnomeDisciplina = button.data('whatevernomeDisciplina')
						var recipientnascimento = button.data('whatevernascimento')
						var recipientnivelAcademico = button.data('whatevernivelAcademico')
						var recipientregimeContrato = button.data('whateverregimeContrato')
						var recipientcoordenador = button.data('whareevercoordenador')
						var recipientid = button.data('whareeverid')
						
												
						// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
						// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
						var modal = $(this)
						modal.find('.modal-title').text('Alterar Professores')
						<!-- Foi criado todos os modal caso seja necessario adicionar ou mudar os que já existem-->
						modal.find('#recipient-nome').val(recipientnome)
						modal.find('#recipient-matricula').val(recipientmatricula)
						modal.find('#recipient-nomeDisciplina').val(recipientnomeDisciplina)
						modal.find('#recipient-nascimento').val(recipientnascimento)
						modal.find('#recipient-nivelAcademico').val(recipientnivelAcademico)
						modal.find('#recipient-regimeContrato').val(recipientregimeContrato)
						modal.find('#recipient-coordenador').val(recipientcoordenador)
						modal.find('#recipient-id').val(recipientid)
						
						
				})
		</script>
		
		<script type="text/javascript">
			$(document).ready(function () {
				$("#ProfessorTable").DataTable({
					"language":{
						"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
					}
				});
			});
		</script>
		<script>
			function exclude(id){
				bootbox.confirm({
					message: "Realmente deseja excluir esse Professor?",
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
							window.location.href = 'Professor/deletar/'+id
					}
				});
			}
		</script>
		
		
	</body>
</html>