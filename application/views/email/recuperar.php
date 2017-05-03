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

			p span{
				font-weight: bold;
				font-size: 15px;
			}

			.logo{
				height: 140px;
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
			<img src="http://i1043.photobucket.com/albums/b437/Yasmin_Sayad_Yoshizumi/class_clock_zps0cgfuxqm.jpg" class="logo">

			<p class="ola">Olá <?= $usuario['nome'] ?>, </p>
			<p>A senha da sua conta Class Clock foi redefinida com sucesso!</p>
			<p>Para fazer login utilize a matrícula <?= $usuario['matricula'] ?> e a nova senha de acesso <span> <?= $usuario['senha'] ?> </span></p>


			<p>Para acessar o sistema <?= anchor('/', 'clique aqui',array('target'=>'_blank')); ?>.</p>
			<p class="agradecimento">Obrigado,</p>
			<p class="agradecimento">Equipe Class Clock.</p>
		</div>
		<div class="footer">
			<p>Desenvolvido por Metal Code</p>
		</div>
	</body>
</html>
