<?php echo $this->Html->script('promotion',false); ?>

<div class="contenedor-b" style="padding: 10px;width: 1140px; margin: 0 auto;">
	<div class="b-menu"> 

		<?php echo $this->element('menu'); ?>
	
	</div>
	<div class="b-sobre"> 

		<div id="debug"></div>

		<div class="preguntas">
			 
			<div style="overflow: hidden;">
				<div style="float: left; overflow: hidden;">
					<h2 style="background: whitesmoke; margin-top: 0.5em;">Promociones:</h2>
				</div>
				<div style="float: right; overflow: hidden;">
					<div style="margin-top: 16px; overflow: hidden;">
						
						<?php if($logs){ ?>
							<a href="#" class="add-this-promotion start-lightbox-a" id="add-this-promotion-0" >Agrega una</a>
						<?php } ?>
						
						<div style="display:none" id="insert-this-promotion-in"></div>
					</div>
				</div>
			</div>
		
		
			<div id="logs">
				<?php if($logs){ ?>
					
					<script> // Start Promotion </script>
					<div id="logs-promotion-0" >
						<?php foreach($logs as  $v){ ?>
							
							<div id="log-promotion-<?php echo $v['Promotion']['id']; ?>" style="overflow: hidden; color: black; background: white; padding: 7px 14px; margin-bottom: 18px; border-radius: 3px;  border: 1px solid;">
								<div style="overflow: hidden;">
									<div style="overflow: hidden; float: left;"> 
										<span  id="log-content-promotion-<?php echo $v['Promotion']['id'] ?>" >
											<b>Nombre:</b> <?php echo $v['Promotion']['name']; ?> <br>
											<b>Fecha:</b> <?php echo $v['Promotion']['date']; ?>.
										</span>
									</div>
									<div style="float: right;">
										<a class="view-this-promotion" id="view-this-promotion-<?php echo $v['Promotion']['id'] ?>" href="#">Ver <img src="/img/view.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>  
										<a class="edit-this-promotion start-lightbox-b" id="edit-this-promotion-<?php echo $v['Promotion']['id'] ?>" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>  
										<a class="delete-this-promotion" id="delete-this-promotion-<?php echo $v['Promotion']['id'] ?>" href="#">Borrar <img src="/img/deleted.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>
									</div>
								</div>
							</div>
								
						<?php } ?>					
					</div>
					<script> // End Promotion </script>
						
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
			##	Promotion add 													##
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
						
					<?php echo $this->Form->create(null,  array('url' => "/",'id'=>'add-form-promotion')); ?>
						
						<?php echo $this->Form->input('Promotion.name',array('label'=>'Nombre:','class'=>'input-basic')); ?>
						<?php echo $this->Form->input('Promotion.date',array('label'=>'Fecha:','type'=>'text','class'=>'input-basic')); ?>

						<div style="overflow: hidden;">			
							<div style="float: left; overflow: hidden;"><?php echo $this->Form->submit('Guardar'); ?></div>			
							<div style="overflow: hidden;"><div id="save-successful-promotion" style="display:none; overflow: hidden; margin-top: 5px; margin-left: 5px;"><span>Se Guardo</span></div></div>			
						</div>		
					
					<?php echo $this->Form->end(); ?>
				
				</div>
				<!-- END AÑADIR -->
			
			<?php echo $this->Lightbox->end('a'); ?>

			<!--
			######################################################################
			##																	##
			##	Promotion edit 													##
			##																	##
			######################################################################
			-->	

			<?php echo $this->Lightbox->start('b'); ?>
			
				<!-- EDITAR -->
				<div style="border:1px solid #CCC; padding: 10px; background: #DBDBDB; margin-bottom: 10px;">
				
					<?php echo $this->Form->create(null,  array('url' => "/",'id'=>'edit-form-promotion')); ?>
					
						<div>
							<div style="float: right;">
								<img class="end-lightbox-b" src="/img/cancel.png" alt="CakePHP" style="width: 14px; cursor: pointer;">
							</div>
						</div>
						
						<?php echo $this->Form->hidden('Promotion.id',array('id'=>'EditPromotionId','class'=>'input-basic')); ?>
						<?php echo $this->Form->input('Promotion.name',array('id'=>'EditPromotionName','label'=>'Nombre:','class'=>'input-basic')); ?>
						<?php echo $this->Form->input('Promotion.date',array('id'=>'EditPromotionDate','type'=>'text','label'=>'Fecha:','class'=>'input-basic')); ?>


						<div style="overflow: hidden;">			
							<div style="float: left; overflow: hidden;"><?php echo $this->Form->submit('Actualizar'); ?></div>
							<div style="overflow: hidden;"><div id="edit-successful-promotion" style="display:none; overflow: hidden; margin-top: 5px; margin-left: 5px;"><span>Se Guardo</span></div></div>
						</div>
						
					<?php echo $this->Form->end(); ?>
				
				</div>	
				<!-- END EDITAR -->	
			
			<?php echo $this->Lightbox->end('b'); ?>
		
		
		
		</div>

	</div>
</div>
