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

      .page {
        width: 100%;
        min-width: 300px;
        margin: 10px auto;
        height: auto;
        border-radius: 3%;
      }

      .text-center {
        text-align: center;
      }

      .table {
        border-collapse: collapse;
        margin: 0 auto;
      }

      .table td {
        padding: 2px 3px;
      }

    </style>
  </head>
  <body>

    <div class="page">
        <table class="table" border="1px">
          <tr>
            <th colspan="2">Novo Usuário</th>
          </tr>
          <tr>
            <td>Nome</td>
            <td class="text-center"><?= $professor['nome'] ?></td>
          </tr>
          <tr>
            <td>Matricula</td>
            <td class="text-center"><?= $professor['matricula'] ?></td>
          </tr>
          <tr>
            <td>Senha</td>
            <td class="text-center"><?= $professor['senhaLimpa'] ?></td>
          </tr>
        </table>

        <p class="text-center">Para acessar o sistema <?= anchor('/', 'clique aqui',array('target'=>'_blank')); ?></p>
    </div>

  </body>
</html>
