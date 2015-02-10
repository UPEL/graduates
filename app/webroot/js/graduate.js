document.observe("dom:loaded", function(){

	var config_obj = {
		"graduate":{
			"add":{
				"id":"add-form-graduate",
				"action":"/addNewGraduate",
				"obj":{"name":"GraduateName","graduate_type_id":"GraduateGraduateTypeId"},
				"console_log":false,
			},
			"edit":{
				"id":"edit-form-graduate",
				"action":"/editGraduate",
				"get_current_data_action":"/editGraduateGetCurrentData",
				"obj":{"id":"EditGraduateId","name":"EditGraduateName","graduate_type_id":"EditGraduateGraduateTypeId"},
				"console_log": false,
			},
			"_delete":{
				"action":	'/deleteGraduate',
				"console_log": false,
			}
		}
	}

	var obj = obj || null;

	var callbacks = {
		"graduate":{
			"add":{
				"add_request":{
					"onSuccess":function(obj){
						// start onSuccess
						if(!obj.result){						
							
							var f = Object.keys(obj)
							f.each(function(elementId){				
								$(elementId).addClassName('requiredInput');
								$(elementId).observe('click',function(){
									this.removeClassName('requiredInput'); 
								});
								$(elementId).observe('focus',function(){
									this.removeClassName('requiredInput'); 
								});
							})	
												
						}else{	
							var namespace = 'graduate';		
											
							if($('no-records')){
								$('no-records').setStyle({"display":"none"});	
							}
									
							$('save-successful-'+namespace).setStyle({"display":"block"}); 
						
							setTimeout(function(){
								$('save-successful-'+namespace).setStyle({"display":"none"})	
								/*
								$('ligtbox-white-a','ligtbox-black-a').each(function(element){
									element.fade();
								})
								*/ 
								
							}, 1000); 
									
							$(config_obj[namespace].add.id).reset();
	
							var v0 = new Template(
								'<div id="logs-#{namespace}">'+
									'<div id="log-#{namespace}-#{id}">'+
										'<div style="overflow: hidden; color: black; background: white; padding: 7px 14px; margin-bottom: 18px; border-radius: 3px;  border: 1px solid;">'+
											
												'<div style="overflow: hidden; float: left;">'+										
													'<span id="log-content-#{namespace}-#{id}">'+
														'<b>Tipo:</b> #{graduate_type_name}.<br>'+ 
														'<b>En:</b> #{name}.'+
													'</span>'+
												'</div>'+

												'<div style="float: right;">'+
													'<a class="edit-this-#{namespace} start-b-lightbox" id="edit-this-#{id}" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+
													'<a class="delete-this-#{namespace}" id="delete-this-#{namespace}-#{id}" href="#">Borrar <img src="/img/deleted.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+
												'</div>'+
													
											'</div>'+
										'</div>'+
									'<div>'+
								'<div>'
							);
							
							var v1 = new Template(
								'<div id="log-#{namespace}-#{id}">'+
									'<div style="overflow: hidden; color: black; background: white; padding: 7px 14px; margin-bottom: 18px; border-radius: 3px;  border: 1px solid;">'+
										
											'<div style="overflow: hidden; float: left;">'+										
												'<span id="log-content-#{namespace}-#{id}">'+
													'<b>Tipo:</b> #{graduate_type_name}.<br>'+
													'<b>En:</b> #{name}.'+
												'</span>'+
											'</div>'+

											'<div style="float: right;">'+
												'<a class="edit-this-#{namespace} start-b-lightbox" id="edit-this-#{namespace}-#{id}" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+
												'<a class="delete-this-#{namespace}" id="delete-this-#{namespace}-#{id}" href="#">Borrar <img src="/img/deleted.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+
											'</div>'+
												
										'</div>'+
									'</div>'+
								'</div>'
							);
							
							var a0 = {
								"namespace":namespace,
								"name":obj.name,
								"graduate_type_name":obj.graduate_type_name						
							}
						
							if(!$($('insert-this-'+namespace+'-in').innerHTML)){
								$('logs').insert({top: v0.evaluate(a0)})
							}else{
								$($('insert-this-'+namespace+'-in').innerHTML).insert({top: v1.evaluate(a0)})
							}
							
							// start mejorar
							$('edit-this-'+namespace+'-'+obj.id).observe('click',function(event){				
								event.preventDefault();
								$('ligtbox-white-b','ligtbox-black-b').each(function(element){
									element.appear();
								})
							})
							
							form_a_delete.delete_config()
							edit_a_form.edit_config();
							// end mejorar
							
						}
						// end	onSuccess	
					}
				}
			},	
			"edit":{
				"edit_request":{
					"onSuccess":function(obj){
						
						if(!obj.result){
							// send errors
							var f = Object.keys(obj)
							f.each(function(elementId){				
								//debug($(elementId))
								$(elementId).addClassName('requiredInput');
								$(elementId).observe('click',function(){
									this.removeClassName('requiredInput'); 
								});
								$(elementId).observe('focus',function(){
									this.removeClassName('requiredInput'); 
								});
							})
							// end send errors
							return false;
						}else{
						
							var namespace = 'graduate';
								
							// successful mensage 						
							$('edit-successful-'+namespace).setStyle({"display":"block"}); 
						
							setTimeout(function(){
								$('edit-successful-'+namespace).setStyle({"display":"none"})	
								
								/*
								$('ligtbox-white-b','ligtbox-black-b').each(function(element){
									element.fade();
								})
								*/
								
							}, 1000);
							// end successful mensage
							
							var v0 = new Template(
								'<b>Tipo:</b> #{graduate_type_name}.<br>'+
								'<b>En:</b> #{name}.'
							);
							
							var a0 = {
								"graduate_type_name":obj.graduate_type_name,							
								"name":obj.name
							}
							
							$('log-content-'+namespace+'-'+obj.id).update(v0.evaluate(a0));
							
						}
					}	
				},
				"edit_get_current_data":{
					"onSuccess":function(obj){				
						
						$('EditGraduateName').value = obj.name;
						$('EditGraduateGraduateTypeId').value = obj.graduate_type_id;
						
					}
				}
			},	
			"_delete":{
				
			}
		}
	}

	var form_a_add		= new Forms.CommonTasks.Add(config_obj,callbacks,'graduate');

	var edit_a_form		= new Forms.CommonTasks.Edit(config_obj,callbacks,'graduate');

	var form_a_delete	= new Forms.CommonTasks.Delete(config_obj,callbacks,'graduate');
	

})
