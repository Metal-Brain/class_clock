<div class="row">
	<div id="sidebar" class="col-xs-12 col-sm-2 col-md-2" role="navigation">
		<h2>Menu</h2>
		<ul class="metismenu nav nav-pills nav-stacked" id="menu">
			<?php if ($this->session->nivel == 1) : ?>
				<li><?= anchor('Curso','Cursos') ?></li>
				<li><?= anchor('Disciplina','Disciplinas') ?></li>
				<li><?= anchor('Professor/index', 'Professores') ?></li>
				<li><?= anchor('Sala','Salas') ?></li>
				<li><?= anchor('Turma','Turmas') ?></li>
			<?php elseif ($this->session->nivel == 2) : ?>
				<li><?= anchor('Professor/disponibilidade','Disponibilidade') ?></li>
				<li><?= anchor('Professor/preferencia','Preferências') ?></li>
				<?php if ($this->session->isCoordenador) : ?>
					<li><?= anchor('Professor/cadastrar','Visualizar Professores') ?></li>
				<?php endif; ?>
			<?php endif; ?>
			<li><?= anchor('Grade','Grade') ?></li>
			<hr>
			<?php if ($this->session->nivel == 2) : ?>
				<li><?= anchor('Usuario/editar','<span class="glyphicon glyphicon-cog"></span> Configurações',array('aria-expanded'=>'true')) ?></li>
			<?php endif; ?>
			<li><?= anchor('Login/logout', '<span class="glyphicon glyphicon-log-out"></span> Sair do Sistema') ?></li>
		</ul>

		<script>
			var active = 0;
			var nivelUsuario = <?= $this->session->nivel?>;
			for (var i = 0; i < document.links.length; i++) {
				var a  = document.links[i].href.split('/');
				var b = document.URL.split('/');

				switch (nivelUsuario) {
					case 1:
						if (a[5] === b[5]) {
							active = i;
							break;
						}
						break;
					case 2:
						if (a[6] === b[6]) {
							active = i;
							break;
						}
						break;
				}
			}
			document.links[active].className = 'active';
		</script>
	</div>
