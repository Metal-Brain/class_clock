<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Preferências</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>">
		<!-- Multi-Select -->
        <link rel="stylesheet" href="<?= base_url('assets/multi-select/css/multi-select.css')?>">
	</head>
	<body>
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
						<li><?= anchor('Disponibilidade','Disponibilidade') ?></a></li>
						<li class="active"><?= anchor('Preferencia','Preferências') ?></a></li>
						<li><?= anchor('Grade','Grade') ?></a></li>
						<hr>
						<li><span class="glyphicon glyphicon-log-out"></span> Sair do Sistema</a></li>
					</ul>
				</div>

				<div id="content" class="col-md-10">
					<!-- Cadastro das preferências do professor -->
					<?= form_open('Professor/preferencia') ?>
						<div class="modal-content col-md-offset-3 col-md-5">
							<h1>Preferências</h1>
							<!-- Aqui entra o multi select -->
							<div class="form-group disc col-md-offset-1">
							  <label>Disciplinas que deseja lecionar</label>
							  <?= form_dropdown('disciplinas[]',$disciplinas,null,array('id'=>'disciplinas','multiple'=>'multiple')) ?>
							</div>
							<div class="form-group col-md-offset-5">
								<?= form_submit('submit','Cadastrar',array('class'=>'btn btn-primary')) ?>
							</div>
						</div>
					<?= form_close() ?>
				</div><!--Fecha content-->
				<div id="footer" class="col">
					<p>Desenvolvido por Metal Code</p>
				</div>
			</div><!--Fecha row-->
		</div><!--Fecha container-fluid-->

		<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
		<!-- multi-select -->
        <script type="text/javascript" src="<?= base_url('assets/multi-select/js/jquery.multi-select.js')?>"></script>
      	<script>
		    $("#disciplinas").multiSelect({
				selectableHeader: "<div class='multiselect'>Selecione as disciplinas</div>",
				selectionHeader: "<div class='multiselect'>Disciplinas selecionadas</div>"
			});
        </script>

			<!-- nao manjei mas acho que vai precisar desse trexo alterado... -->

        <script type="text/javascript">
			var recipientid = button.data('whateverid')
			var url = '<?= base_url('index.php/Professor/disciplinas/') ?>'+recipientid;
			$.getJSON(url,function (response) {
				var disciplinas = [];
				$.each(response,function (index,value) {
					disciplinas.push(value.id);
				});

				$("#professorDisciplinas").multiSelect('select',disciplinas);
			});
		</script>
	</body>
</html>
