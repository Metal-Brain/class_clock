<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Professor</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
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
						<li>Disponibilidade</a></li>
						<li class="active"><?= anchor('Preferencia','Preferências') ?>Preferência</a></li>
						<li>Visualizar Grade</a></li>
						<hr>
						<li><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
					</ul>
				</div>

				<div id="content" class="col-md-10">
					<h1>Preferência</h1>
						<form>
								<div class="modal-content col-md-offset-3 col-md-5">
								 <div class="form-group disc">
										<label>Disciplinas </label><button onClick="addSelect()" type="button" class="btn btn-success glyphicon glyphicon-plus"></button> 
										
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
										<button id="btn-Limpar" onClick="pt()" type="button" class="btn btn-danger" style="display: none;">Limpar</button>
									</div>

									<div class="form-group">
										<button type='button' class='btn bt-lg btn-primary'>Cadastrar</button>
									</div>
								</div>
						</form>	

			

				</div>
				<div id="footer" class="col">
					<p>Desenvolvido por Metal Code</p>
				</div>
			</div>
			
		</div><!--Fecha container-fluid-->
		<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
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
                if (contaClasse('s-disciplina') > 1) {
				
                    document.getElementById('btn-remover').style.display = 'inline'
					document.getElementById('btn-Limpar').style.display = 'inline'
					}
					
            }
            function remSelect() {
                //remove o ultimo elemento com id 'select-disciplina'
              document.querySelector('#select-disciplina:last-child').remove()
				
			

                //se quantidade de classes 's-disciplina' === 1 esconde o botao remover
                if (contaClasse('s-disciplina') === 1) {
					document.getElementById('btn-remover').style.display = 'none'
					document.getElementById('btn-Limpar').style.display = 'none'
				}
                 
            }
			
			//Remove tudo e só deixa o minimo para sobreviver
			function pt() {
				do {
						document.querySelector('#select-disciplina:last-child').remove()
					} while(contaClasse('s-disciplina') > 1)
					
					document.getElementById('btn-remover').style.display = 'none'
					document.getElementById('btn-Limpar').style.display = 'none'
					
			}
        </script>
		
	</body>
</html>
