<div class="row">
	<div id="sidebar" class="col-xs-12 col-sm-2 col-md-2" role="navigation">
		<h2>Menu</h2>
		<ul class="nav nav-pills nav-stacked">
		  <li><?= anchor('Professor/disponibilidade','Disponibilidade') ?></li>
		  <li><?= anchor('Professor/preferencia','Preferências') ?></li>
		  <li><?= anchor('Grade','Grade') ?></li>
		  <hr>
		  <li><?= anchor('Login/logout', '<span class="glyphicon glyphicon-log-out"></span> Sair do Sistema') ?></li>
		</ul>

		<script>
			var active = 0;
			for (var i = 0; i < document.links.length; i++) {
				var a  = document.links[i].href.split('/');
				var b = document.URL.split('/');

				if (a[6] === b[6]) {
					active = i;
					console.log('entrou');
					break;
				}
			}
			document.links[active].className = 'active';
		</script>
	</div>
