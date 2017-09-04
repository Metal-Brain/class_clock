<div class="container col-md-10 col-lg-10">
  <!-- Alertas de sucesso / erro -->
	  <div class="row">
	    <div class="col-lg-offset-3 col-lg-6">
	      <?php if ($this->session->flashdata('success')) : ?>
	        <div class="alert alert-success">
	          <p class="text-center"><?= $this->session->flashdata('success') ?></p>
	        </div>
	      <?php elseif ($this->session->flashdata('danger')) : ?>
	        <div class="alert alert-danger">
	          <p class="text-center"><?= $this->session->flashdata('danger') ?></p>
	        </div>
	      <?php endif; ?>
	    </div>
	  </div>

	  <!-- Início do conteúdo da view-->
	  <div class="top-bar" style="padding: 0 0 15px 0">
	    <div class="row">
	      <div class="col-md-5">
	        <div class="input-group">
	          <input type="text"
	           class="form-control input-filter"
	            placeholder="Pesquisar"
	            />
	          <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
	        </div>
	      </div>
	      <div class="col-md-2">
	        <a class="btn btn-success" href="<?= base_url('index.php/Disciplina/cadastrar')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
	      </div>
	    </div>
	  </div>
       		    
        <!-- Aqui é a Listagem dos Itens -->
      
                <table id="disciplinaTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th><center>Nome</th>
                            <th><center>Sigla</th>
                            <th><center>Curso</th>
                            <th><center>Qtd. Professores</th>
                            <th><center>Modulo</th>
                            <th><center>Qtd. Aulas Semanais</th>
                            <th><center>Tipo de sala</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($disciplinas as $disciplina): ?>
                            <?= ($disciplina['status'] ? '<tr>' : '<tr class="danger">') ?>
							<td><center><?= $disciplina['nome_disciplina']; ?></td>
							<td><center><?= $disicplina['sigla_disciplina']; ?></td>
							<td><center><?= $disciplina['qtd_Professor']; ?></td>
							<td><center><?= $disciplina['modulo']; ?></td>
							<td><center><?= $disciplina['carga_semanal'] ?></td>
							<td class="text-center"><?= ( empty($turno->deletado_em) ) ? 'Ativado' : 'Desativado'?></td>
							<td class="text-center">
								<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('disciplinas/diciplinaEditar/'.$turno->id)?>"></a>
								<?php if ( empty($disciplina->deletado_em) ) : ?>
									<a class="btn btn-danger glyphicon glyphicon-remove" title="Remover" href="<?= site_url('Disciplina/deletar/'.$disciplina->id)?>"></a>
								<?php else : ?>
								<a class="btn btn-success glyphicon glyphicon-check" title="Ativar" href="<?= site_url('Disciplina/ativar/'.$disciplina->id)?>"></a>
								<?php endif; ?>
						    </td>
							</tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
            
        
</div>

