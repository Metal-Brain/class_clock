<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
  <!-- Alertas de sucesso / erro -->
	<div class="row" style="margin-top: 5px;">
		<div class="col-md-12">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="alert alert-danger">
					<p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>

  <!-- Início do conteúdo da view-->
  <div style="padding: 0 0 15px 0">
    <div class="row">
      <div class="col-md-12">
        <h2 class="page-header">FPA
          <a class="btn btn-success" href="<?= base_url('index.php/Fpa/cadastrarDisponibilidade')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
        </h2>
      </div>
    </div>
  </div>

  <table id="fpaTable" class="table table-striped">
		<thead>
			<tr>
				<th>FPA</th>
			</tr>
		</thead>
		<!-- Aqui é onde popula a tabela com os dados que vem do backend, onde cada view vai configurar de acordo.-->
		<tbody>
			<tr>
        <td></td>
      </tr>
		</tbody>
	</table>
</div>
