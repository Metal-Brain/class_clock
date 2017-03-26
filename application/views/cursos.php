<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro dos Cursos</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
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
                        <li class="active" ><a href="cursos.html">Cursos</a></li>
                        <li><a href="disciplinas.html">Disciplinas</a></li>
                        <li><a href="professores.html">Professores</a></li>
                        <li><a href="salas.html">Salas</a></li>
                        <hr>
                        <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
                    </ul>
                </div>

                <div id="content" class="col-md-10">
                    <?php if ($this->session->flashdata('success')) : ?>
                      <div class="alert alert-success text-center">
                        <?= $this->session->flashdata('success') ?>
                      </div>
                    <?php elseif ($this->session->flashdata('danger')) : ?>
                      <div class="alert alert-danger text-center">
                        <?= $this->session->flashdata('danger') ?>
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sigla</th>
                                        <th>Nome</th>
                                        <th>Qtd. Semestres</th>
                                        <th>Período</th>
                                        <th>Grau</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($cursos as $curso) : ?>
                                    <tr>
                                        <td><?= $curso['sigla'] ?></td>
                                        <td><?= $curso['nome'] ?></td>
                                        <td><?= $curso['qtdSemestres'] ?></td>
                                        <td><?= $curso['periodo'] ?></td>
                                        <td><?= $curso['grauNome'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" title="Editar" data-toggle="modal" data-target="#exampleModal" data-whateversigla="LOP1" data-whatevernome="Lógica de Programação 1" data-whatevercurso="ADS"><span class="glyphicon glyphicon-pencil"></span></button>
                                            <button onClick="exclude('.$curso['id'].');" type="button" class="btn btn-danger" title="Excluir"><span class="glyphicon glyphicon-remove"></span></button>
                                        </td>
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Aqui é o formulário de registro do novo item-->
                        <div id="new" class="tab-pane fade">
                            <h3>Cadastrar Curso</h3>
                            <?= form_open('Curso/cadastrar') ?>
                                <div class="form-group percent-40 inline">
                                    <?= form_label('Nome','nome') ?>
                                    <?= form_input('nome',set_value('nome'),array('class'=>'form-control','placeholder'=>'ex: Análise e Desenvolvimento de Sistemas')) ?>
                                    <?= form_error('nome') ?>
                                </div>
                                <div class="form-group percent-10 inline">
                                    <?= form_label('Sigla','sigla') ?>
                                    <?= form_input('sigla',set_value('sigla'),array('class'=>'form-control','placeholder'=>'ex: ADS')) ?>
                                    <?= form_error('sigla') ?>
                                </div>
                                <div class="form-group">
                                  <?= form_label('Quantidade de semestres','qtdSemestres') ?>
                                  <?= form_input(array('name'=>'qtdSemestres','value'=>set_value('qtdSemestres'),'type'=>'number'',maxlength'=>'2','pattern'=>'[0-9]+$','class'=>'form-control percent-10','placeholder'=>'ex: 6')) ?>
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
                                    <button onClick="addSelect()" type="button" class="btn btn-success glyphicon glyphicon-plus"></button>

                                    <br>
                                    <div id="selects">
                                        <div id="select-disciplina" class="form-group s-disciplina">
                                          <?= form_dropdown('disciplinas[]',$disciplinas,null,array('class'=>'form-control')) ?>
                                        </div>
                                    </div>
                                    <button id="btn-remover" onClick="remSelect()" type="button" class="btn btn-danger" style="display: none;">Remover</button>
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
                            <!-- Alert de erro -->
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                Erro ao alterar!
                            </div>
                            <!-- Alert de sucesso -->
                            <div class="alert alert-success" role="alert">
                                <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
                                <span class="sr-only">Succes:</span>
                                Alterado com sucesso!
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="sigla-name" class="control-label">Sigla:</label>
                                    <input type="text" class="form-control" id="recipient-sigla">
                                </div>
                                <div class="form-group">
                                    <label for="nome-name" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" id="recipient-nome">
                                </div>
                                <div class="form-group">
                                    <label for="curso-name" class="control-label">Quantidade de Semestres:</label>
                                    <input type="text" maxlength="2" pattern="[0-9]+$" class="form-control"  name="recipient-curso" id="recipient-curso">
                                </div>
                                <!-- DropListPeriodo (Droplist) -->
                                <div class="form-group percent-40 inline">
                                    <label for="curso-name" class="control-label">Período:</label>
                                    <select id="u0_input" class="form-control">
                                        <option value="Matutino">Matutino</option>
										<option value="Vespertino">Vespertino</option>
                                        <option value="Noturno">Noturno</option>
                                    </select>
                                </div>
                                <br/>
                                <!-- DropListGrau (Droplist) -->
                                <div class="form-group percent-40 inline">
                                    <label for="curso-name" class="control-label">Grau:</label>
                                    <select id="u1_input" class="form-control">
                                        <option selected="" value="Técnico">Técnico</option>
										<option value="Tecnólogo">Tecnólogo</option>
										<option value="Bacharel">Bacharel</option>
										<option value="Licenciatura">Licenciatura</option>
										<option value="Pós-Graduação">Pós-Graduação</option>
                                        
                                        
                                    </select>
                                </div>
                                <div class="form-group disc">
                                    <label>Disciplinas</label>
                                    <button onClick="addSelect()" type="button" class="btn btn-success glyphicon glyphicon-plus"></button>

                                    <br>
                                    <div id="selects">
                                        <div id="select-disciplina" class="form-group s-disciplina">
                                            <select class="form-control">
                                                <option value="Lógica de Programação">Lógica de Programação</option>
                                                <option value="Estrutura de Dados">Estrutura de Dados</option>
                                                <option value="Linguagem de Programação">Linguagem de Programação</option>
                                                <option value="Banco de Dados">Banco de Dados</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button id="btn-remover" onClick="remSelect()" type="button" class="btn btn-danger" style="display: none;">Remover</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger">Alterar</button>
                                </div>
                            </form>
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

        <script>
            //faz a contagens de divs com uma determinada classe
            function contaClasse(classe) {
                return document.getElementsByClassName(classe).length
            }

            // adiciona um select dentro da div 'selects'
            function addSelect() {
                //pega o elemento/div que possui o id 'select-disciplina'
                var select = document.getElementById('select-disciplina')
                //pega o elemento/div que possui o id 'selects'
                var area = document.getElementById('selects')
                //faz a copia do elemento capturado na var select ( o 'select-disciplina')
                var clone = select.cloneNode(true)
                //insere o clone dentro da elemento da variavel area (o 'selects')
                area.appendChild(clone)

                //se quantidade de classes 's-disciplina' > 1 ele exibe o botao remover
                if (contaClasse('s-disciplina') > 1)
                    document.getElementById('btn-remover').style.display = 'inline'

            }
            function remSelect() {
                //remove o ultimo elemento com id 'select-disciplina'
                document.querySelector('#select-disciplina:last-child').remove()

                //se quantidade de classes 's-disciplina' === 1 esconde o botao remover
                if (contaClasse('s-disciplina') === 1)
                    document.getElementById('btn-remover').style.display = 'none'
            }
        </script>

        <script type="text/javascript">
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientsigla = button.data('whateversigla')
                var recipientnome = button.data('whatevernome')
                var recipientcurso = button.data('whatevercurso')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Alterar Curso')
                modal.find('#recipient-sigla').val(recipientsigla)
                modal.find('#recipient-nome').val(recipientnome)
                modal.find('#recipient-curso').val(recipientcurso)
            })
        </script>
		<script>
			function exclude(id){
				bootbox.confirm({
					message: "Realmente deseja excluir esse curso?",
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
							window.location.href ='Curso/deletar/'+id
					}
				});
			}
		</script>
    </body>
</html>
