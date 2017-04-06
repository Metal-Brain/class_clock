<!DOCTYPE html>
<html lang ="pt-br">
	<head>
		<title>Class Clock</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		
	</head>
	<body>
		<!-- as classes container-fluid, row e col-md-xx são do GRID do bootstrap -->
		<!-- procure por 'bootstrap grid' e estude-as -->
		<div class="Absolute-Center is-Responsive">
	
	
			<div class="container">
			  <div class="row">
				

				  <div class="col-sm-12 col-md-10 col-md-offset-1">
					<h1 style="text-align:center">Class Clock</h1>
					<div class="tab-content">
							<!-- tela login -->
												<div id="principal" class="col-md-6 col-md-offset-3 tab-pane fade in active">
													<h2 style="text-align:center">Login</h2>
													<form action="" id="login" method="post"  align="center">
														<?php echo form_open('VerificaLogin'); ?>
													  <div class="form-group input-group" align="center">
														<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
														<input class="form-control" type="text" name='username' placeholder="ex: cg0000000"/>          
													  </div>
													  <div class="form-group input-group ">
														<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
														<input class="form-control" type="password" name='password' id="password" placeholder="password"/>     
													  </div>
													
													  <div class="form-group">
														<button type="submit" class="btn btn-def btn-block" style="background-color: #4CAF50">Entrar</button>
													  </div>
													  <div class="form-group" >
														<a  data-toggle="pill" href="#recupera">Clique aqui para recuperar a senha</a>
													  </div>
													</form> 
												</div>	
							<!-- fim tela login-->					
												
							<!-- modal da recuperação de senha -->					
												<div id="recupera" class="col-md-6 col-md-offset-3 tab-pane fade">
															
															 <h2 style="text-align:center">Recuperar Senha</h2>
																<div class="help">	
																	<p><strong>Ex: a1502794 </strong> Informe seu login, composto por "a + prontuário" para alunos e "cg + prontuário" para servidores. <br>Instruções serão enviadas para o e-mail cadastrado em nosso sistema.<br><strong>Aluno</strong>, caso tenha problemas, procure a secretaria do Câmpus para atualizar seu e-mail no sistema acadêmico.<br><strong>Servidor</strong>, se necessário, procure a CTI.</p>
																</div>
																	<div class="form-group input-group">
																		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
																		<input class="form-control" type="text" name='username' placeholder="ex: cg0000000"/>    
																	
																	 </div>
																	<div class="col-md-6 col-md-offset-3 inline">
																					<button type='submit' class='btn bt-lg btn-primary' style="background-color: #4CAF50">Redefinir</button>
																					<button type='button' class='btn bt-lg btn-default'  data-toggle="pill" href="#principal">Cancelar</button>
																	</div>
															
														   
												</div>
							<!-- Fim modal da recuperação de senha -->
		
						
					</div>
															<!-- img logo -->
												<div style="border-bottom: 1px #606060 solid;">
														<img class="logo" src="assets/img/ifsp.jpg" style="margin: 20px auto 40px; display: block;"/>		
												</div>
															<!-- Fim logo -->
					</div>  
				 
			  </div>
			</div>


				
			<div class="row">
				<div id="footer" class="col" style="text-align:center">
					<p>Desenvolvido por Metal Code</p>
				</div>
			</div><!--Fecha row-->

		</div><!--Fecha container-fluid-->
		<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</body>
</html>