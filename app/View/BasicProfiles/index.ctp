<?php 
	echo $this->Html->script('basic-profile',false);
?>

<div class="contenedor-b" style="padding: 10px;width: 1140px; margin: 0 auto;">
	<div class="b-menu">
		<?php echo $this->element('menu'); ?>
	</div>
	<div class="b-sobre"> 

		<div id="debug"></div>

		<div class="preguntas">
			 
			<div style="overflow: hidden;">
				<div style="float: left; overflow: hidden;">
					<h2 style="background: whitesmoke; margin-top: 0.5em;">Egresados:</h2>
				</div>
				<div style="float: right; overflow: hidden;">
					<div style="margin-top: 16px; overflow: hidden;">
						
						<?php if($logs){ ?>
							<a href="#" class="add-this-basic-profile start-lightbox-a" id="add-this-basic-profile-0" >Agrega una</a>
						<?php } ?>
						
						<div style="display:none" id="insert-this-basic-profile-in"></div>
					</div>
				</div>
			</div>
		
			<div id="logs">
				<?php if($logs){ ?>
					
					<script> // Start BasicProfile </script>
					<div id="logs-basic-profile-0" >
					<?php foreach($logs as  $v){ ?>
						
						<div id="log-basic-profile-<?php echo $v['BasicProfile']['id']; ?>" style="overflow: hidden; color: black; background: white; padding: 7px 14px; margin-bottom: 18px; border-radius: 3px;  border: 1px solid;">
							
							<div style="overflow: hidden;">
								<div style="overflow: hidden; float: left;"> 
									<span  id="log-content-basic-profile-<?php echo $v['BasicProfile']['id'] ?>" >
										<b>Cedula:</b> <?php echo $v['BasicProfile']['document']; ?> <br>
										<b>Nombre:</b> <?php echo $v['BasicProfile']['first_name']; ?>. 
										<b>Seg. Nombre: </b> <?php echo $v['BasicProfile']['second_name']; ?>. <br>
										<b>Apellido:</b> <?php echo $v['BasicProfile']['first_last_name']; ?>. 
										<b>Seg. Apellido:</b> <?php echo $v['BasicProfile']['second_last_name']; ?>. <br>
									</span>
								</div>
								<div style="float: right;">
									<a class="edit-this-basic-profile start-lightbox-b" id="edit-this-basic-profile-<?php echo $v['BasicProfile']['id'] ?>" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>  
									<a class="delete-this-basic-profile" id="delete-this-basic-profile-<?php echo $v['BasicProfile']['id'] ?>" href="#">Borrar <img src="/img/deleted.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>
								</div>
							</div>
													
							<script>// *** Start AcademicProfileBasic   </script>


							<div  style="overflow: hidden;" >
								
								<div style="overflow: hidden;">
									<div style="overflow: hidden; float: left;">
										<div style="padding-top: 4px;">
											<a class="start-lightbox-c add-this-academic-profile" id="add-this-academic-profile-<?php echo $v['BasicProfile']['id'] ?>" href="#">Añadir un logro academico</a>
										</div>
										<div style="display:none" id="insert-this-academic-profile-in"></div>
									</div>
									<div style="overflow: hidden;">
										<div style="padding-left: 5px;"><img src="/img/hat.png" alt="CakePHP" style="width: 24px; cursor: pointer;"></div>
									</div>
								</div>
					
								<div id="logs-academic-profile-<?php echo $v['BasicProfile']['id'] ?>">				
									<?php if($v['AcademicProfile']){ ?>
										<?php foreach($v['AcademicProfile'] as $v2){ ?>
											<div id="log-academic-profile-<?php echo $v2['id'] ?>" style="overflow: hidden;border: 1px solid;padding: 10px;border-radius: 3px 3px; margin-top: 7px;">
												<div id="log-content-academic-profile-<?php echo $v2['id'] ?>" style="overflow: hidden; float: left;">
													<li>Graduado de: <?php echo $v2['Graduate']['GraduateType']['name']; ?> en <?php echo $v2['Graduate']['name']; ?></li>	
													<li>Promoción: <?php echo $v2['Promotion']['name']; ?></li>	
													<li>Specialidad: <?php  echo $v2['Specialty']['name']; ?></li>	
													<li>Indice Academico: <?php echo $v2['academic_index'] ?></li>
												</div>
												<div style="float: right;">
													<a class="edit-this-academic-profile start-lightbox-d" id="edit-this-academic-profile-<?php echo $v2['id'] ?>" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>  
													<a class="delete-this-academic-profile" id="delete-this-academic-profile-<?php echo $v2['id'] ?>" href="#">Borrar <img src="/img/deleted.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>
												</div>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
								
							</div>


							<script>// End AcademicProfileBasic  </script> 	
							
						</div>
						
							
					<?php } ?>					
					</div>
					<script> // End BasicProfile </script>
						
				<?php }else{ ?>
							
					<div id="no-records" class="admonition note">
						<p class="last">
							No hay egresados cargados. <a  class="start-a-lightbox" href="#">Agrega uno</a>										
						</p>
					</div>	
											
				<?php } ?>
			</div>	
				
			<!--
			######################################################################
			##																	##
			##	BasicProfile add 												##
			##																	##
			######################################################################
			-->	


			<?php echo $this->Lightbox->start('a'); ?>

			<!-- AÑADIR -->
			<div style="border:1px solid #CCC; padding: 10px; background: #DBDBDB; margin-bottom: 10px;">	
					
					<div>
						<div style="float: right;">
							<img class="end-lightbox-a" src="/img/cancel.png" alt="CakePHP" style="width: 14px; cursor: pointer;">
						</div>	
					</div>	
					
				<?php echo $this->Form->create(null,  array('url' => "/",'id'=>'add-form-basic-profile')); ?>
					
					<?php echo $this->Form->input('BasicProfile.document',array('label'=>'Cedula:','class'=>'input-basic')); ?>
					<?php echo $this->Form->input('BasicProfile.first_name',array('label'=>'Primer Nombre:','class'=>'input-basic')); ?>
					<?php echo $this->Form->input('BasicProfile.second_name',array('label'=>'Segundo Nombre:','class'=>'input-basic')); ?>
					<?php echo $this->Form->input('BasicProfile.first_last_name',array('label'=>'Primer Apellido:','class'=>'input-basic')); ?>
					<?php echo $this->Form->input('BasicProfile.second_last_name',array('label'=>'Segundo Apellido:','class'=>'input-basic')); ?>
					
					<div style="overflow: hidden;">			
						<div style="float: left; overflow: hidden;"><?php echo $this->Form->submit('Guardar'); ?></div>			
						<div style="overflow: hidden;"><div id="save-successful-basic-profile" style="display:none; overflow: hidden; margin-top: 5px; margin-left: 5px;"><span>Se Guardo</span></div></div>			
					</div>		
				
				<?php echo $this->Form->end(); ?>
			
			</div>
			<!-- END AÑADIR -->				
			
			<?php echo $this->Lightbox->end('a'); ?>	
			
			<!--
			######################################################################
			##																	##
			##	BasicProfile Edit 												##
			##																	##
			######################################################################
			-->
			
				
			<?php echo $this->Lightbox->start('b'); ?>
			
				<!-- EDITAR -->
				<div style="border:1px solid #CCC; padding: 10px; background: #DBDBDB; margin-bottom: 10px;">
				
					<?php echo $this->Form->create(null,  array('url' => "/",'id'=>'edit-form-basic-profile')); ?>
					
						<div>
							<div style="float: right;">
								<img class="end-lightbox-b" src="/img/cancel.png" alt="CakePHP" style="width: 14px; cursor: pointer;">
							</div>
						</div>
						
						<?php echo $this->Form->hidden('BasicProfile.id',array('id'=>'EditBasicProfileId','class'=>'input-basic')); ?>
						<?php echo $this->Form->input('BasicProfile.document',array('id'=>'EditBasicProfileDocument','label'=>'Cedula:','class'=>'input-basic')); ?>
						<?php echo $this->Form->input('BasicProfile.first_name',array('id'=>'EditBasicProfileFirstName','label'=>'Primer Nombre:','class'=>'input-basic')); ?>
						<?php echo $this->Form->input('BasicProfile.second_name',array('id'=>'EditBasicProfileSecondName','label'=>'Segundo Nombre:','class'=>'input-basic')); ?>
						<?php echo $this->Form->input('BasicProfile.first_last_name',array('id'=>'EditBasicProfileFirstLastName','label'=>'Primer Apellido:','class'=>'input-basic')); ?>
						<?php echo $this->Form->input('BasicProfile.second_last_name',array('id'=>'EditBasicProfileSecondLastName','label'=>'Segundo Apellido:','class'=>'input-basic')); ?>
					

						<div style="overflow: hidden;">			
							<div style="float: left; overflow: hidden;"><?php echo $this->Form->submit('Actualizar'); ?></div>
							<div style="overflow: hidden;"><div id="edit-successful-basic-profile" style="display:none; overflow: hidden; margin-top: 5px; margin-left: 5px;"><span>Se Guardo</span></div></div>
						</div>
						
					<?php echo $this->Form->end(); ?>
				
				</div>	
				<!-- END EDITAR -->	
			
			<?php echo $this->Lightbox->end('b'); ?>
		

			<!--
			######################################################################
			##																	##
			##	AcademicProfiles add 											##
			##																	##
			######################################################################
			-->
		
			<?php echo $this->Lightbox->start('c'); ?>

				<!-- AÑADIR  academic_profiles AcademicProfiles AcademicProfile -->
				<div style="border:1px solid #CCC; padding: 10px; background: #DBDBDB; margin-bottom: 10px;">	
				
						<div>
							<div style="float: right;">
								<script>// end-lightbox-c </script> 
								<img class="end-lightbox-c" src="/img/cancel.png" alt="CakePHP" style="width: 14px; cursor: pointer;">
							</div>	
						</div>	
		
					<?php echo $this->Form->create(null,  array('url' => "/",'id'=>'add-form-academic-profile')); ?>
					
						<?php echo $this->Form->hidden('AcademicProfile.basic_profile_id',array('id'=>'AcademicProfileBasicProfileId','class'=>'input-basic')); ?>

						<?php
							echo $this->Form->input(
								'AcademicProfile.graduate_id',
									array(
										'options' => $logsGraduates,
										'type' => 'select',
										'empty' => '-- Graduado de:  --',
										'label' => 'Graduado de: ',
										'id'=>'AcademicProfileGraduateId'
									)
							); 
						?>
						
						<?php
							echo $this->Form->input(
								'AcademicProfile.promotion_id',
									array(
										'options' => $logsPromotions,
										'type' => 'select',
										'empty' => '-- Seleciona una promoción.  --',
										'label' => 'Promoción: ',
										'id'=>'AcademicProfilePromotionId'
									)
							); 
						?>
						<?php
							echo $this->Form->input(
								'AcademicProfile.specialty_id',
									array(
										'options' => $logsSpecialties,
										'type' => 'select',
										'empty' => '-- Seleciona una Especialidad. --',
										'label' => 'Especialidad: ',
										'id'=>'AcademicProfileSpecialtyId'
									)
							); 
						?>
						
						<?php echo $this->Form->input('AcademicProfile.academic_index',array('id'=>'AcademicProfileAcademicIndex','label'=>'Indice Academico:','class'=>'input-basic')); ?>
						
						<div style="overflow: hidden;">			
							<div style="float: left; overflow: hidden;"><?php echo $this->Form->submit('Guardar'); ?></div>			
							<div style="overflow: hidden;"><div id="save-successful-academic-profile" style="display:none; overflow: hidden; margin-top: 5px; margin-left: 5px;"><span>Se Guardo</span></div></div>			
						</div>				
					
					<?php echo $this->Form->end(); ?>
				
				</div>
				<!-- END AÑADIR -->
			
			<?php echo $this->Lightbox->end('c'); ?>
			
			
			<!--
			######################################################################
			##																	##
			##	AcademicProfiles Edit 											##
			##																	##
			######################################################################
			-->
			
			<?php echo $this->Lightbox->start('d'); ?>

				<!-- Editar  academic_profiles AcademicProfiles AcademicProfile -->
				<div style="border:1px solid #CCC; padding: 10px; background: #DBDBDB; margin-bottom: 10px;">	
				
						<div>
							<div style="float: right;">
								<script>// end-lightbox-c </script> 
								<img class="end-lightbox-d" src="/img/cancel.png" alt="CakePHP" style="width: 14px; cursor: pointer;">
							</div>	
						</div>	
		
					<?php echo $this->Form->create(null,  array('url' => "/",'id'=>'edit-form-academic-profile')); ?>
					
						<?php echo $this->Form->hidden('AcademicProfile.id',array('id'=>'EditAcademicProfileId','class'=>'input-basic')); ?>
					
						<?php
							echo $this->Form->input(
								'AcademicProfile.graduate_id',
									array(
										'options' => $logsGraduates,
										'type' => 'select',
										'empty' => '-- Graduado de:  --',
										'label' => 'Graduado de: ',
										'id'=>'EditAcademicProfileGraduateId'
									)
							); 
						?>
					
						<?php
							echo $this->Form->input(
								'AcademicProfile.promotion_id',
									array(
										'options' => $logsPromotions,
										'type' => 'select',
										'empty' => '-- Seleciona una promoción.  --',
										'label' => 'Promoción: ',
										'id'=>'EditAcademicProfilePromotionId'
									)
							); 
						?>
						<?php
							echo $this->Form->input(
								'AcademicProfile.specialty_id',
									array(
										'options' => $logsSpecialties,
										'type' => 'select',
										'empty' => '-- Seleciona una Especialidad. --',
										'label' => 'Especialidad: ',
										'id'=>'EditAcademicProfileSpecialtyId'
									)
							); 
						?>

						<?php echo $this->Form->input('AcademicProfile.academic_index',array('id'=>'EditAcademicProfileAcademicIndex','label'=>'Indice Academico:','class'=>'input-basic')); ?>
						
						<div style="overflow: hidden;">			
							<div style="float: left; overflow: hidden;"><?php echo $this->Form->submit('Guardar'); ?></div>			
							<div style="overflow: hidden;"><div id="edit-successful-academic-profile" style="display:none; overflow: hidden; margin-top: 5px; margin-left: 5px;"><span>Se Actualizo</span></div></div>			
						</div>				
					
					<?php echo $this->Form->end(); ?>
				
				</div>
				<!-- END AÑADIR -->
			
			<?php echo $this->Lightbox->end('d'); ?>
		
	
				
					
		</div>

	</div>
</div>
