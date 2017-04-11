<<<<<<< af699b7212813c1e902a892720cda53b6d0e00b2
<div class="row">
	<div id="sidebar" class="col-xs-12 col-sm-2 col-md-2" role="navigation">
		<h2>Menu</h2>
		<ul class="nav nav-pills nav-stacked">
		  <li><?= anchor('Curso','Cursos') ?></li>
		  <li><?= anchor('Disciplina','Disciplinas') ?></li>
		  <li><?= anchor('Professor', 'Professores') ?></li>
		  <li><?= anchor('Sala','Salas') ?></li>
		  <hr>
		  <li><?= anchor('Login/logout', '<span class="glyphicon glyphicon-log-out"></span> Sair do Sistema') ?></li>
		</ul>

		 <script>
			var active = 0;
			for (var i = 0; i < document.links.length; i++) {
				if (document.links[i].href === document.URL) {
					active = i;
				}
			}
			document.links[active].className = 'active';
		</script>
	</div>
<span class="glyphicon glyphicon-log-out"></span>
=======
<div class="row">
<div id="sidebar" class="col-md-2" role="navigation">
    <h2>Menu</h2>
    <ul class="nav nav-pills nav-stacked">
      <li><?= anchor('Curso','Cursos') ?></li>
      <li><?= anchor('Disciplina','Disciplinas') ?></li>
      <li><?= anchor('Professor', 'Professores') ?></li>
      <li><?= anchor('Sala','Salas') ?></li>
      <hr>
      <li><?= anchor('Login/logout','Sair do Sistema') ?></li>
    </ul>

     <script>
        var active = 0;
        for (var i = 0; i < document.links.length; i++) {
            if (document.links[i].href === document.URL) {
                active = i;
            }
        }
        document.links[active].className = 'active';
    </script>
</div>
>>>>>>> Criado helper auth_helper para controle de sessão
