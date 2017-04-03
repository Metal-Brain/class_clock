<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro dos Cursos</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/DataTables/datatables.min.css')?>">
        <!-- Multi-Select -->
        <link rel="stylesheet" href="<?= base_url('assets/multi-select/css/multi-select.css')?>">
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
                      <li class="active"><?= anchor('Curso','Cursos') ?></li>
                      <li><?= anchor('Disciplina','Disciplinas') ?></li>
                      <li><a href="professores.html">Professores</a></li>
                      <li><a href="salas.html">Salas</a></li>
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
                                        <td><?php if($curso['status']): echo "Ativo"; else: echo "Inativo"; endif;?></td>
                                        <td>
											<?php if($curso['status']): ?>
                                            <button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?= $curso['id']?>" data-whateversigla="<?= $curso['sigla']?>" data-whatevernome="<?= $curso['nome']?>" data-whateversemestres="<?= $curso['qtdSemestres']?>" data-whatevergrau="<?= $curso['grau']?>" data-whateverperiodo="<?= $curso['idPeriodo']?>"><span class="glyphicon glyphicon-pencil"></span></button>
                                            <button onClick="exclude(<?= $curso['id']?>);" type="button" class="btn btn-danger" title="Desativar"><span class="glyphicon glyphicon-remove"></span></button>
											<?php else:?>
											<button onClick="able(<?= $curso['id']?>)" type="button" class="btn btn-success delete" title="Ativar"><span class="glyphicon glyphicon-ok"></span></button>
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
                            <h3>Cadastrar Curso</h3>
                            <?= form_open('Curso/cadastrar') ?>
                                <div class="form-group percent-40">
                                    <?= form_label('Nome','nome') ?>
                                    <?= form_input('nome',set_value('nome'),array('class'=>'form-control','placeholder'=>'ex: Análise e Desenvolvimento de Sistemas')) ?>
                                    <?= form_error('nome') ?>
                                </div>
                                <div class="form-group percent-40">
                                    <?= form_label('Sigla','sigla') ?>
                                    <?= form_input('sigla',set_value('sigla'),array('class'=>'form-control','placeholder'=>'ex: ADS')) ?>
                                    <?= form_error('sigla') ?>
                                </div>
                                <div class="form-group">
                                  <?= form_label('Quantidade de semestres','qtdSemestres') ?>
                                  <?= form_input(array('name'=>'qtdSemestres','value'=>set_value('qtdSemestres'),'type'=>'number','maxlength'=>'2','pattern'=>'[0-9]+$','class'=>'form-control percent-10','placeholder'=>'ex: 6')) ?>
                                  <?= form_error('qtdSemestres') ?>
                                </div>
                                <div class="form-group">
                                    <label>Período</label>
                                    <!-- DropListPeriodo (Droplist) -->
                                    <div class="form-group percent-15">
                                        <div id="u0" class="ax_default droplist" data-label="DropListPeriodo">
                                          <?= form_dropdown('periodo[]',$periodo,set_value('periodo[]'),array('class'=>'form-control','multiple'=>'multiple')) ?>
                                          <?= form_error('periodo[]') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Grau</label>
                                    <!-- DropListGrau (Droplist) -->
                                    <div class="form-group percent-15">
                                        <div id="u1" class="ax_default droplist" data-label="DropListGrau">
                                          <?= form_dropdown('grau',$graus,set_value('grau'),array('class'=>'form-control')) ?>
                                          <?= form_error('grau') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group disc">
                                  <label>Disciplinas </label>
                                  <?= form_dropdown('disciplinas[]',$disciplinas,null,array('id'=>'disciplinas','multiple'=>'multiple')) ?>
                                </div>

                                <div class="form-group">
                                    <?= form_submit('submit','Cadastrar',array('class'=>'btn btn-primary')) ?>
                                </div>

                            <?= form_close() ?>
                        </div>
                    </div><!--fecha tab-content-->
                </div><!--Fecha content-->
            </div><!--Fecha row-->

            <!-- Aqui é o Modal de alteração dos cursos-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Cursos</h4>
                        </div>
                        <div class="modal-body">
                              <?= form_open('Curso/atualizar') ?>
                                <div class="form-group">
                                  <input type="hidden" name="cursoId" value="" id="recipient-id">
                                </div>
                                <div class="form-group">
                                  <?= form_label('Sigla:','recipient-sigla',array('class'=>'control-label')) ?>
                                  <?= form_input('cursoSigla',set_value('cursoSigla'),array('class'=>'form-control','id'=>'recipient-sigla')) ?>
                                  <?= form_error('cursoSigla') ?>
                                </div>
                                <div class="form-group">
                                  <?= form_label('Nome:','recipient-nome',array('class'=>'control-label')) ?>
                                  <?= form_input('nomeCurso',set_value('nomeCurso'),array('class'=>'form-control','id'=>'recipient-nome')) ?>
                                  <?= form_error('nomeCurso') ?>
                                </div>
                                <div class="form-group">
                                  <?= form_label('Quantidade de Semestres:','recipient-semestres',array('class'=>'control-label')) ?>
                                  <?= form_input('cursoQtdSemestres',set_value('cursoQtdSemestres'),array('pattern'=>'[0-9]+$','maxlength'=>'2','id'=>'recipient-semestres','class'=>'form-control')) ?>
                                  <?= form_error('cursoQtdSemestres') ?>
                                </div>
                                <!-- DropListPeriodo (Droplist) -->
                                <div class="form-group percent-40 inline">
                                  <?= form_label('Período:','cursoPeriodos',array('class'=>'control-label')) ?>
                                  <?= form_dropdown('cursoPeriodos[]',$periodo,null,array('class'=>'form-control','multiple'=>'multiple','id'=>'cursoPeriodos')) ?>
                                  <?= form_error('cursoPeriodos[]') ?>
                                </div>
                                <br/>
                                <!-- DropListGrau (Droplist) -->
                                <div class="form-group percent-40 inline">
                                    <label for="curso-name" class="control-label">Grau:</label>
                                  <?= form_dropdown('cursoGrau',$graus,null,array('class'=>'form-control')) ?>
                                  <?= form_error('cursoGrau') ?>
                                </div>
                                <div class="form-group disc">
                                  <label>Disciplinas</label>
                                  <?= form_dropdown('cursoDisciplinas[]',$disciplinas,null,array('id'=>'cursoDisciplinas','multiple'=>'multiple')) ?>
                                </div>

                                <div class="modal-footer">
									<?= form_submit('submit','Alterar',array('class'=>'btn btn-primary')) ?>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer" class="col">
                <p>Desenvolvido por Metal Code</p>
            </div>

        </div><!--Fecha container-fluid-->

        <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
		    <script type="text/javascript" src="<?= base_url('assets/js/bootbox.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/DataTables/datatables.min.js')?>"></script>
        <!-- multi-select -->
        <script type="text/javascript" src="<?= base_url('assets/multi-select/js/jquery.multi-select.js')?>"></script>
        <script>
          $("#cursoDisciplinas").multiSelect();
          $("#disciplinas").multiSelect();
        </script>
        <script type="text/javascript">
            $('#exampleModal').on('show.bs.modal', function (event) {
                $("#cursoDisciplinas").multiSelect('deselect_all');
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientsigla = button.data('whateversigla')
                var recipientnome = button.data('whatevernome')
                var recipientsemestre = button.data('whateversemestres')
                var recipientgrau = button.data('whatevergrau')
                var recipientPeriodo = button.data('whateverperiodo').toString()
                var recipientid = button.data('whateverid')
                var url = '<?= base_url('index.php/Curso/disciplinas/') ?>'+recipientid;
                $.getJSON(url,function (response) {
                  var disciplinas = [];
                  $.each(response,function (index,value) {
                    disciplinas.push(value.id);
                  });
                  $("#cursoDisciplinas").multiSelect('select',disciplinas);
                });
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Alterar Curso')
                modal.find('#recipient-id').val(recipientid)
                modal.find('#recipient-sigla').val(recipientsigla)
                modal.find('#recipient-nome').val(recipientnome)
                modal.find('#recipient-semestres').val(recipientsemestre)
                modal.find('select[name=cursoGrau] option[value='+recipientgrau+']').prop('selected',true)
                if (recipientPeriodo.indexOf(',') != -1) {
                  recipientPeriodo = recipientPeriodo.split(',')

                  for (var i = 0; i < recipientPeriodo.length; i++)
                    modal.find('#cursoPeriodos option[value='+recipientPeriodo[i]+']').prop('selected',true)
                } else {
                  modal.find('#cursoPeriodos option[value='+recipientPeriodo+']').prop('selected',true)
                }

            })
        </script>
        <script type="text/javascript">
    			$(document).ready(function () {
    				$("#curso-table").DataTable({
    					"language":{
    						"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
    					}
    				});
    			});
    		</script>

		<script>
			function exclude(id){
				bootbox.confirm({
					message: "Realmente deseja desativar esse curso?",
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
							window.location.href ='<?= base_url('index.php/Curso/deletar/')?>'+id
					}
				});
			}
			
			function able(id){
				bootbox.confirm({
					message: "Realmente deseja ativar esse curso?",
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
							window.location.href = '<?= base_url("index.php/Curso/ativar/")?>'+id
					}
				});
			}
		</script>
    </body>
</html>
