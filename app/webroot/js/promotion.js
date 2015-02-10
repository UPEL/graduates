document.observe("dom:loaded", function(){

	var config_obj = {
		"promotion":{
			"add":{
				"id":"add-form-promotion",
				"action":"/addNewPromotion",
				"obj":{"name":"PromotionName","date":"PromotionDate"},
				"console_log":false,
			},
			"edit":{
				"id":"edit-form-promotion",
				"action":"/editPromotion",
				"get_current_data_action":"/editPromotionGetCurrentData",
				"obj":{"id":"EditPromotionId","name":"EditPromotionName","date":"EditPromotionDate"},
				"console_log": false,
			},
			"_delete":{
				"action":	'/deletePromotion',
				"console_log": false,
			},
			"view":{
				"action": '/viewThisPromotion'
			}
		}
	}

	var obj = obj || null;

	var callbacks = {
		"promotion":{
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
							if($('no-records')){
								$('no-records').setStyle({"display":"none"});	
							}
									
							$('save-successful-promotion').setStyle({"display":"block"}); 
						
							setTimeout(function(){
								$('save-successful-promotion').setStyle({"display":"none"})	
								/*
								$('ligtbox-white-a','ligtbox-black-a').each(function(element){
									element.fade();
								})
								*/ 
								
							}, 1000); 
									
							$(config_obj['promotion'].add.id).reset();
	
							var v0 = new Template(
								'<div id="logs-#{namespace}">'+
									'<div id="log-#{namespace}-#{id}">'+
										'<div style="overflow: hidden; color: black; background: white; padding: 7px 14px; margin-bottom: 18px; border-radius: 3px;  border: 1px solid;">'+
											
												'<div style="overflow: hidden; float: left;">'+										
													'<span id="log-content-#{namespace}-#{id}">'+
														'<b>Nombre:</b> #{name}<br>'+
														'<b>Fecha:</b> #{date}.'+ 
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
													'<b>Nombre:</b> #{name}<br>'+
													'<b>Fecha:</b> #{date}.'+
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
								"namespace":'promotion',
								"name":obj.name,
								"date":obj.date						
							}
							
							var namespace = 'promotion';
						
							if(!$($('insert-this-'+namespace+'-in').innerHTML)){
								$('logs').insert({top: v0.evaluate(a0)})
							}else{
								$($('insert-this-'+namespace+'-in').innerHTML).insert({top: v1.evaluate(a0)})
							}
						
							// start mejorar
							$('edit-this-promotion-'+obj.id).observe('click',function(event){				
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
								
							// successful mensage 						
							$('edit-successful-promotion').setStyle({"display":"block"}); 
						
							setTimeout(function(){
								$('edit-successful-promotion').setStyle({"display":"none"})	
								
								/*
								$('ligtbox-white-b','ligtbox-black-b').each(function(element){
									element.fade();
								})
								*/
								
							}, 1000);
							// end successful mensage
													
							
							var v0 = new Template(
								'<b>Nombre:</b> #{name}<br>'+
								'<b>Fecha:</b> #{date}.' 
							);
							
							var a0 = {
								"name":obj.name,
								"date":obj.date
							}
							
							
							var namespace = 'promotion';
							
							$('log-content-'+namespace+'-'+obj.id).update(v0.evaluate(a0));
							
						}
					}	
				},
				"edit_get_current_data":{
					"onSuccess":function(obj){				
						
						$('EditPromotionName').value 		= obj.name;
						$('EditPromotionDate').value 		= obj.date;
						//console.log(obj);
					
					}
				}
			},	
			"_delete":{
				
			}
		}
	}


	var form_a_add		= new Forms.CommonTasks.Add(config_obj,callbacks,'promotion');

	var edit_a_form		= new Forms.CommonTasks.Edit(config_obj,callbacks,'promotion');

	var form_a_delete	= new Forms.CommonTasks.Delete(config_obj,callbacks,'promotion');	
	
	var form_a_view		= new Forms.CommonTasks.View(config_obj,callbacks,'promotion');
	

})
