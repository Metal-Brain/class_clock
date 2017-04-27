		<div id="content" class="col-md-10">

			<?php if($this->session->flashdata('success')) : ?>
				<div class="alert alert-success">
					<p class="text-center"><?= $this->session->flashdata('success') ?></p>
				</div>
			<?php endif; ?>

			<!-- Cadastro das preferências do professor -->
			<?= form_open('Professor/preferencia') ?>
				<div class="col-md-12">
					<h1>Disponibilidade</h1>
                                    <div class="container">
                                        <div class="row">
                                            <div class='col-sm-8'>
                                                <div class="table-responsive">
                                                    <input type="button" id="add_field" class="btn btn-default" value="Adicionar" style="margin-bottom: 12px;">
                                                
                                                <table id="listas" class="table">
                                                        <tr>
                                                                <th>Periodo</th>
                                                                <th>Dia</th>
                                                                <th>Inicio</th>
                                                                <th>Fim</th>
                                                                <th></th>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                <select class="form-control selectpicker" name="periodo[]">
                                                                    <option>Diurno</option>
                                                                    <option>Matutino</option>
                                                                    <option>Noturno</option>
                                                                  </select>
                                                                </td>
                                                                
                                                                <td>
                                                                <select class="form-control selectpicker" name="dia[]">
                                                                    <option>Segunda</option>
                                                                    <option>Terça</option>
                                                                    <option>Quarta</option>
                                                                    <option>Quinta</option>
                                                                    <option>Sexta</option>
                                                                    <option>Sábado</option>
                                                                  </select>
                                                                </td>
                                                                
                                                                <td><input type="time" class="form-control" step="1800" name="inicio[]" id="dta_nasc" maxlength="10"></td>
                                                                <td><input type="time" class="form-control" step="1800" name="fim[]" id="dta_nasc" maxlength="10"></td>
                                                        </tr>
                                                </table>

                                            </div>

                                        </div>
                                    </div>
				</div>
			<?= form_close() ?>
		</div><!--Fecha content-->
</div><!--Fecha container-fluid-->