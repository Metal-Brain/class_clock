<!--<pre>
		<?php print_r($grade) ?>
</pre> -->	
		<div id="content" class="col-md-10">

			<?php if($this->session->flashdata('success')) : ?>
				<div class="text-center alert alert-success">
					<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
					<?= $this->session->flashdata('success') ?>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="text-center alert alert-danger">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<?= $this->session->flashdata('danger') ?>
				</div>
			<?php endif; ?>

		
				<div class="col-md-12">
					<div class="container">
						<div class="row">
							<div class="row">
								<div class="col-sm-10">
									<h3 class="text-center">Grade</h3>

									<?php if (isset($grade)) : ?>
			<?php
				$grade = json_decode(json_encode($grade), True);
					
				foreach ($grade as $key => $semestre){	
					$periodo;
					$nomePeriodo;
					
					foreach($semestre as $semana){
						
						foreach($semana as $dia){
							$periodo = $dia['idPeriodo'];
						
						}
					}
					
					if($periodo==1){
						$nomePeriodo ="Matutino"; 
						
					}else if($periodo==2) {
						$nomePeriodo ="Vespertino"; 
					}else if($periodo==3){
						$nomePeriodo ="Noturno"; 
						
					}
				   
				
					echo '
						<table class="table table-bordered">
							<tr>
								<th class="text-center" style="background-color: #4CAF50; color: #fff;" colspan="6">'.$key.'º Semestre - '.$nomePeriodo.'</th>
							</tr> 
						';      
						
					foreach($semestre as $semana){
						$nomeDia;
						foreach($semana as $dia){
							$nomeDia = $dia['dia'];	
						}				
										
						
						echo'		
							<table class="table table-bordered">
								<tr> <td rowspan="6" class="thsemana" style="padding-top: 5%;"><b> <br /><span>'.$nomeDia.'</span></b></td>
									<th class="thaula"></th>
										<th class="thdisciplina">Disciplina</th>
										<th class="thprofessor">Professor</th>
								
								</tr>'
						;
						$control= 1;
						foreach($semana as $dia){
				
						
							if(($dia['idPeriodo']==3)&&($control==3)){
								echo'		
								   <tr>
										<td class="tdintervalo" colspan="4"><span>Intervalo</span></td>
										
									</tr>
															
								';		
				
					
							}else if(($dia['idPeriodo']==1)&&($control==4)){
								echo'		
								   <tr>
										<td class="tdintervalo" colspan="4"><span>Intervalo</span></td>
										
									</tr>
															
								';		
								
							}
							else if(($dia['idPeriodo']==2)&&($control==4)  && !(($nomeDia == "quarta")) ){
								echo'		
								   <tr>
										<td class="tdintervalo" colspan="4"><span>Intervalo</span></td>
										
									</tr>
															
								';		
								
							}
							else if(($dia['idPeriodo']==2)&&($control==3)  && (($nomeDia == "quarta")) ){
								echo'		
								   <tr>
										<td class="tdintervalo" colspan="4"><span>Intervalo</span></td>
										
									</tr>
															
								';		
								
							}
							
					
			
								echo'
									<tr>
										<td class="text-center">'.$control.'º</td>
											<td class="text-center">'.$dia['nomeDisciplina'].'</td>
											<td class="text-center">'.$dia['nome'].'</td>
									
									</tr>
																
								';									
			
							$control++;									
						}									
					
				echo '

				</table>';
		  
					}
				echo'	
				</table>
				';										
				}
								
								
			?>

									<?php elseif ($this->session->isCoordenador) : ?>
										<?= anchor('Professor/gerarGrade/'.$this->session->id,'Gerar Grade',array('class'=>'btn btn-success btn-block','style'=>'color: white;')) ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div><!--Fecha content-->
		
		</div><!--Fecha container-fluid-->
	</div>	