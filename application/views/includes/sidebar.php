<div class="row">
<<<<<<< HEAD
    <div id="sidebar" class="col-xs-12 col-sm-2 col-md-2" role="navigation">
        <h2>Menu</h2>
        <ul class="metismenu nav nav-pills nav-stacked" id="menu">
            <?php if ($this->session->nivel == 1 || $this->session->nivel == 3) : ?>
                <li><?= anchor('Curso', 'Cursos') ?></li>
                <li><?= anchor('Disciplina', 'Disciplinas') ?></li>
                <li><?= anchor('Professor/index', 'Professores') ?></li>
                <li><?= anchor('Sala', 'Salas') ?></li>
                <li><?= anchor('Turma', 'Turmas') ?></li>
            <?php elseif ($this->session->nivel == 2) : ?>
                <li><?= anchor('Professor/disponibilidade', 'Disponibilidade') ?></li>
                <li><?= anchor('Professor/preferencia', 'Preferências') ?></li>
                <?php if ($this->session->isCoordenador) : ?>
                    <li><?= anchor('Professor/cadastrar', 'Visualizar Professores') ?></li>
                    <li><?= anchor('Professor/coordenadorde', 'Professores Coordenados') ?></li>
                <?php endif; ?>
                <?php if (!($this->session->isCoordenador)) : ?>
                    <li><?= anchor('Professor/verCadastro', 'Visualizar Cadastro') ?></li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if ($this->session->nivel == 2) : ?>
                <li><?= anchor('Professor/Grade', 'Grade') ?></li>
            <?php endif; ?>
            <hr>
            <?php if ($this->session->nivel == 2) : ?>
                <li><?= anchor('Usuario/editar', '<span class="glyphicon glyphicon-cog"></span> Configurações', array('aria-expanded' => 'true')) ?></li>
            <?php endif; ?>
            <li><?= anchor('Login/logout', '<span class="glyphicon glyphicon-log-out"></span> Sair do Sistema') ?></li>
        </ul>
=======
	<div id="sidebar" class="col-xs-12 col-sm-2 col-md-2" role="navigation">
		<h2>Menu</h2>
		<ul class="metismenu nav nav-pills nav-stacked" id="menu">
			<?php if ($this->session->nivel == 1 || $this->session->nivel == 3) : ?>
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
					<li><?= anchor('Professor/coordenadorde','Professores Coordenados') ?></li>
				<?php endif; ?>
				<?php if (!($this->session->isCoordenador)) : ?>
					<li><?= anchor('Professor/verCadastro','Visualizar Cadastro') ?></li>
				<?php endif; ?>
			<?php endif; ?>
            <?php if ($this->session->nivel == 2) : ?>
			<li><?= anchor('Professor/Grade','Grade') ?></li>
                        <?php endif; ?>
			<hr>
			<?php if ($this->session->nivel == 2) : ?>
				<li><?= anchor('Usuario/editar','<span class="glyphicon glyphicon-cog"></span> Configurações',array('aria-expanded'=>'true')) ?></li>
			<?php endif; ?>
			<li><?= anchor('Login/logout', '<span class="glyphicon glyphicon-log-out"></span> Sair do Sistema') ?></li>
		</ul>
>>>>>>> a7a5d4c581e076ddfbadad8cf958204e18c60b46

        <script>
            if(document.URL.split('/')[5]=='gerarGrade'){
                document.links[4].className = 'active';
            }
            for (var i = 0; i < document.links.length; i++) {
                switch (document.links[i].href) {
                    case document.URL:
                        console.log(document.links[i].href);
                        document.links[i].className = 'active';
                        break;
                }
                
            }
        </script>

<<<<<<< HEAD
    </div>
=======
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
					case 3:
					if (a[5] === b[5]) {
						active = i;
						break;
					}
					break;
				}
			}
			document.links[active].className = 'active';
		</script>
	</div>
>>>>>>> a7a5d4c581e076ddfbadad8cf958204e18c60b46
