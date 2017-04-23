<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      html, body {
        margin: 0;
        padding: 0;
      }
	  
	  h3{
	  
	  color:rgb(112,112,112);
	  text-align:left;
	  }
      .page {
        width: 100%;
        min-width: 300px;
        margin: 10px 25px;
        height: auto;
        border-radius: 3%;
      }
   
      .table {
        border-collapse: collapse;
        margin: 0 auto;
      }
      .table td {
        padding: 2px 3px;
      }
	  .footer{
	  width:100%;
	
	    color:rgb(112,112,112);
		margin: 30px 25px;
	  }
	  
	  
	  span{
	  font-size:41px;
	  color: rgb(38,114,236);
	  
	  }
	  
	  p span {
	  	  font-size:21px;
	  color: green;
	  
	  }
	  
	  
	  .agradecimento{
	  text-align:left;
	  margin:5px 0px;
	  
	  }
	  
	  
	  
    </style>
  </head>
  <body>

    <div class="page">
	
			<h3>Conta Class Clock</h3>
			
		<span>Sua senha foi redefinida</span>
			<p>Olá <?= $professor['nome'] ?> </p>
			<p>A senha da sua conta Class Clock foi redefinida com sucesso!</p>
			<p>Para acessar sua conta utilize a matricula <?= $professor['matricula'] ?> e a sua nova senha de acesso é <span> <?= $professor['senhaLimpa'] ?> </span> .</p>
			

     <p>Para acessar o sistema <?= anchor('/', 'clique aqui',array('target'=>'_blank')); ?></p>
   <p class="agradecimento">Obrigado,</p>
   <p class="agradecimento">Equipe Class Clock.</p>


   </div>
	<div class="footer">
	
		<p>Desenvolvido por Metal Code</p>
	</div>
  </body>
</html>