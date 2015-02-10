<?php echo $this->Html->script('graduate',false); ?>

<div class="contenedor-b" style="padding: 10px;width: 1140px; margin: 0 auto;">
	<div class="b-menu"> 

		<?php echo $this->element('menu'); ?>
	
	</div>
	<div class="b-sobre"> 

		<div id="debug"></div>

		<div class="preguntas">
			 
			<div style="overflow: hidden;">
				<div style="float: left; overflow: hidden;">
					<h2 style="background: whitesmoke; margin-top: 0.5em;">Graduado de:</h2>
				</div>
				<div style="float: right; overflow: hidden;">
					<div style="margin-top: 16px; overflow: hidden;">
						
						<?php if($logs){ ?>
							<a href="#" class="add-this-graduate start-lightbox-a" id="add-this-graduate-0" >Agrega una</a>
						<?php } ?>
						
						<div style="display:none" id="insert-this-graduate-in"></div>
					</div>
				</div>
			</div>
		
			<div id="logs">
				<?php if($logs){  //	debug($logs); ?>
				

					
					<script> // Start graduate </script>
					<div id="logs-graduate-0" >
						<?php foreach($logs as  $v){ ?>
							
							<div id="log-graduate-<?php echo $v['Graduate']['id']; ?>" style="overflow: hidden; color: black; background: white; padding: 7px 14px; margin-bottom: 18px; border-radius: 3px;  border: 1px solid;">
								<div style="overflow: hidden;">
									<div style="overflow: hidden; float: left;"> 
										<span  id="log-content-graduate-<?php echo $v['Graduate']['id'] ?>" >
											<b>Tipo:</b> <?php echo $v['GraduateType']['name']; ?> <br>
											<b>En:</b> <?php echo $v['Graduate']['name']; ?>.
										</span>
									</div>
									<div style="float: right;">
										<a class="edit-this-graduate start-lightbox-b" id="edit-this-graduate-<?php echo $v['Graduate']['id'] ?>" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>  
										<a class="delete-this-graduate" id="delete-this-graduate-<?php echo $v['Graduate']['id'] ?>" href="#">Borrar <img src="/img/deleted.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>
									</div>
								</div>
							</div>
								
						<?php } ?>					
					</div>
					<script> // End graduate </script>
						
				<?php }else{ ?>
							
					<div id="no-records" class="admonition note">
						<p class="last">
							No hay registros cargados. <a href="#" class="add-this-graduate start-lightbox-a" id="add-this-graduate-0" >Agrega uno</a>
						</p>
					</div>	
											
				<?php } ?>
			</div>
		
		
			<!--
			######################################################################
			##																	##
			##	graduate add 													##
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
						
					<?php echo $this->Form->create(null,  array('url' => "/",'id'=>'add-form-graduate')); ?>
						
						<?php
							echo $this->Form->input(
								'Graduate.graduate_type_id',
									array(
										'options' => $graduateTypes,
										'type' => 'select',
										'empty' => '-- Seleciona un tipo.  --',
										'label' => 'Tipo: '
									)
							); 
						?>

						<?php echo $this->Form->input('Graduate.name',array('label'=>'En: ','class'=>'input-basic')); ?>
						


						<div style="overflow: hidden;">			
							<div style="float: left; overflow: hidden;"><?php echo $this->Form->submit('Guardar'); ?></div>			
							<div style="overflow: hidden;"><div id="save-successful-graduate" style="display:none; overflow: hidden; margin-top: 5px; margin-left: 5px;"><span>Se Guardo</span></div></div>			
						</div>		
					
					<?php echo $this->Form->end(); ?>
				
				</div>
				<!-- END AÑADIR -->
			
			<?php echo $this->Lightbox->end('a'); ?>

			<!--
			######################################################################
			##																	##
			##	graduate edit 													##
			##																	##
			######################################################################
			-->	

			<?php echo $this->Lightbox->start('b'); ?>
			
				<!-- EDITAR -->
				<div style="border:1px solid #CCC; padding: 10px; background: #DBDBDB; margin-bottom: 10px;">
				
					<?php echo $this->Form->create(null,  array('url' => "/",'id'=>'edit-form-graduate')); ?>
					
						<div>
							<div style="float: right;">
								<img class="end-lightbox-b" src="/img/cancel.png" alt="CakePHP" style="width: 14px; cursor: pointer;">
							</div>
						</div>
						
						<?php echo $this->Form->hidden('Graduate.id',array('id'=>'EditGraduateId','class'=>'input-basic')); ?>

						<?php
							echo $this->Form->input(
								'Graduate.graduate_type_id',
									array(
										'options' => $graduateTypes,
										'type' => 'select',
										'empty' => '-- Seleciona un tipo.  --',
										'label' => 'Tipo: ',
										'id'=>'EditGraduateGraduateTypeId'
									)
							); 
						?>

						<?php echo $this->Form->input('Graduate.name',array('id'=>'EditGraduateName','label'=>'En: ','class'=>'input-basic')); ?>

						<div style="overflow: hidden;">			
							<div style="float: left; overflow: hidden;"><?php echo $this->Form->submit('Actualizar'); ?></div>
							<div style="overflow: hidden;"><div id="edit-successful-graduate" style="display:none; overflow: hidden; margin-top: 5px; margin-left: 5px;"><span>Se Guardo</span></div></div>
						</div>
						
					<?php echo $this->Form->end(); ?>
				
				</div>	
				<!-- END EDITAR -->	
			
			<?php echo $this->Lightbox->end('b'); ?>
		
		
		
		</div>

	</div>
</div>
