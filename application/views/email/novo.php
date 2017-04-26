<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
			<style>
			html, body{
				margin: 0;
				padding: 0;
			}
		  
			h3{
				color:rgb(112,112,112);
				text-align:left;
			}
			
			p span{
				font-weight: bold;
				font-size: 15px;
			}
		  
			.page{
				width: 100%;
				min-width: 300px;
				margin: 10px 25px;
				height: auto;
				color: black;
			}
			
			.ola{
				font-size: 22px;
			}
			
			.agradecimento{
				text-align:left;
				margin:5px 0px;
			}
		  
			.footer{
				width:100%;
				height: 40px;
				background: #CCC;
				color:rgb(112,112,112);
				margin: 15px 25px;
				padding: 1px 0;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div class="page">
			<h3>Class Clock</h3>
			
			<p class="ola">Olá <?= $professor['nome'] ?>, </p>
			<p>Sua conta Class Clock foi criada com sucesso!</p>
			<p>Para fazer login utilize a matrícula <?= $professor['matricula'] ?> e a senha de acesso <span> <?= $professor['senhaLimpa'] ?> </span></p>
				

			<p>Para acessar o sistema <?= anchor('/', 'clique aqui',array('target'=>'_blank')); ?>.</p>
			<p class="agradecimento">Obrigado,</p>
			<p class="agradecimento">Equipe Class Clock.</p>
		</div>
		<div class="footer">
			<p>Desenvolvido por Metal Code</p>
		</div>
	</body>
</html>