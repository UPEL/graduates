/*
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012, Romel Gomez. (phpyalgomas.blogspot.com)
 * @link          phpyalgomas.blogspot.com
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


document.observe("dom:loaded", function(){

/*
	Parte 2
		se realiza un request json al server pricipal y se carga la data disponible.
*/
	
	//config_obj,callbacks,'basic-profile'
					
	var config_obj = {
		"basic-profile":{
			"add":{
				"id":"add-form-basic-profile",
				"action":"/addNewBasicProfile",
				"obj":{"document":"BasicProfileDocument","first_name":"BasicProfileFirstName","second_name":"BasicProfileSecondName","first_last_name":"BasicProfileFirstLastName","second_last_name":"BasicProfileSecondLastName"},
				"console_log":false,
			},
			"edit":{
				"id":"edit-form-basic-profile",
				"action":"/editBasicProfile",
				"get_current_data_action":"/editBasicProfileGetCurrentData",
				"obj":{"id":"EditBasicProfileId","document":"EditBasicProfileDocument","first_name":"EditBasicProfileFirstName","second_name":"EditBasicProfileSecondName","first_last_name":"EditBasicProfileFirstLastName","second_last_name":"EditBasicProfileSecondLastName"},
				"console_log": false,
			},
			"_delete":{
				"action":	'/deleteBasicProfile',
				"console_log":false
			}
		},	
		"academic-profile":{
			"add":{
				"id":"add-form-academic-profile",
				"action":"/addNewAcademicProfile",
				"obj":{"parent_id":"AcademicProfileBasicProfileId","basic_profile_id":"AcademicProfileBasicProfileId","academic_index":"AcademicProfileAcademicIndex","promotion_id":"AcademicProfilePromotionId","specialty_id":"AcademicProfileSpecialtyId","graduate_id":"AcademicProfileGraduateId"},
				"console_log":true,
			},
			"edit":{
				"id":"edit-form-academic-profile",
				"action":"/editAcademicProfile",
				"get_current_data_action":"/editAcademicProfileGetCurrentData",
				"obj":{"id":"EditAcademicProfileId","academic_index":"EditAcademicProfileAcademicIndex","promotion_id":"EditAcademicProfilePromotionId","specialty_id":"EditAcademicProfileSpecialtyId","graduate_id":"EditAcademicProfileGraduateId"},
				"console_log":true,
			},
			"_delete":{
				"action":	'/deleteAcademicProfile',
				"console_log":true
			}
		}
	}

	var obj = obj || null;

	var callbacks = {
		"basic-profile":{
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
									
							$('save-successful-basic-profile').setStyle({"display":"block"}); 
						
							setTimeout(function(){
								$('save-successful-basic-profile').setStyle({"display":"none"})	
								
								/*
								$('ligtbox-white-a','ligtbox-black-a').each(function(element){
									element.fade();
								})
								*/ 
								
							}, 1000); 
									
							$(config_obj['basic-profile'].add.id).reset();
							
							var v0 = new Template(
								'<div id="logs-#{namespace}">'+
								
									'<div id="log-#{namespace}-#{id}">'+
								
										'<div style="overflow: hidden; color: black; background: white; padding: 7px 14px; margin-bottom: 18px; border-radius: 3px;  border: 1px solid;">'+
											
											'<div style="overflow: hidden;">'+	
												'<div style="overflow: hidden; float: left;">'+										
													'<span id="log-content-#{namespace}-#{id}">'+
														'<b>Cedula:</b> #{document}<br>'+
														'<b>Nombre:</b> #{first_name}.'+ 
														'<b> Seg. Nombre: </b> #{second_name}.<br>'+
														'<b>Apellido:</b> #{first_last_name}.'+ 
														'<b> Seg. Apellido:</b> #{second_last_name}. <br>'+
													'</span>'+
												'</div>'+

												'<div style="float: right;">'+
													'<a class="edit-this-#{namespace} start-lightbox-b" id="edit-this-#{id}" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+
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
										
										
										'<div style="overflow: hidden;">'+
											'<div style="overflow: hidden; float: left;">'+										
												'<span id="log-content-#{namespace}-#{id}">'+
													'<b>Cedula:</b> #{document}<br>'+
													'<b>Nombre:</b> #{first_name}.'+ 
													'<b> Seg. Nombre: </b> #{second_name}.<br>'+
													'<b>Apellido:</b> #{first_last_name}.'+ 
													'<b> Seg. Apellido:</b> #{second_last_name}. <br>'+
												'</span>'+
											'</div>'+

											'<div style="float: right;">'+
												'<a class="edit-this-#{namespace} start-lightbox-b" id="edit-this-#{namespace}-#{id}" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+
												'<a class="delete-this-#{namespace}" id="delete-this-#{namespace}-#{id}" href="#">Borrar <img src="/img/deleted.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+
											'</div>'+
										'</div>'+
										
										
												
										
									'</div>'+
								
								'</div>'
							);
							
							
							var a0 = {
								"namespace":'basic-profile',
								"id":obj.id,
								"document":obj.document,
								"first_name":obj.first_name,
								"second_name":obj.second_name,						
								"first_last_name":obj.first_last_name,						
								"second_last_name":obj.second_last_name						
							}

							var namespace = 'basic-profile';
						
							if(!$($('insert-this-'+namespace+'-in').innerHTML)){
								$('logs').insert({top: v0.evaluate(a0)})
							}else{
								$($('insert-this-'+namespace+'-in').innerHTML).insert({top: v1.evaluate(a0)})
							}
						
							// start mejorar 	
							//console.log(obj);
							
							$('edit-this-basic-profile-'+obj.id).observe('click',function(event){				
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
							$('edit-successful-basic-profile').setStyle({"display":"block"}); 
						
							setTimeout(function(){
								$('edit-successful-basic-profile').setStyle({"display":"none"})	
								
								/*
								$('ligtbox-white-b','ligtbox-black-b').each(function(element){
									element.fade();
								})
								*/
								
							}, 1000);
							// end successful mensage

							// reset form 
							// $(config_obj.edit.id).reset();
							// end reset form
													
							var v0 = new Template(
								'<b>Cedula:</b> #{document}<br>'+
								'<b>Nombre:</b> #{first_name}.'+ 
								'<b>Seg. Nombre: </b> #{second_name}.<br>'+
								'<b>Apellido:</b> #{first_last_name}.'+ 
								'<b>Seg. Apellido:</b> #{second_last_name}. <br>'
							);
							
							//console.log(obj);
							
							var a0 = {
								"document":obj.document,
								"first_name":obj.first_name,
								"second_name":obj.second_name,						
								"first_last_name":obj.first_last_name,						
								"second_last_name":obj.second_last_name
							}
							var namespace = 'basic-profile';
							
							$('log-content-'+namespace+'-'+obj.id).update(v0.evaluate(a0));
							
						}
					}	
				},
				"edit_get_current_data":{
					"onSuccess":function(obj){				
						$('EditBasicProfileDocument').value 		= obj.document;
						$('EditBasicProfileFirstName').value 		= obj.first_name;
						$('EditBasicProfileSecondName').value 		= obj.first_last_name;
						$('EditBasicProfileFirstLastName').value 	= obj.second_name;
						$('EditBasicProfileSecondLastName').value	= obj.second_last_name;
						
						//console.log(obj);
					
					}
				}
			},	
			"_delete":{
				
			}
		},	
		"academic-profile":{
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
								
							$('save-successful-academic-profile').setStyle({"display":"block"}); 
						
							setTimeout(function(){
								
								$('save-successful-academic-profile').setStyle({"display":"none"})	
								
								/*
								$('ligtbox-white-c','ligtbox-black-c').each(function(element){
									element.fade();
								})
								*/
								
							}, 1000); 
							
							$(config_obj['academic-profile'].add.obj.academic_index).value = null;
							
							
							var v0 = new Template(
								'<div id="log-academic-profile-#{id}" style="overflow: hidden;border: 1px solid;padding: 10px;border-radius: 3px 3px; margin-top: 7px;">'+
									'<div id="log-content-academic-profile-#{id}" style="overflow: hidden; float: left;">'+
										'<li>Graduado de: #{graduate_type_name} - #{graduate_name}.</li>'+	
										'<li>Promoción:  #{promotion}</li>'+	
										'<li>Specialidad:  #{specialty}</li>'+	
										'<li>Indice Academico:  #{academic_index}</li>'+
									'</div>'+
									'<div style="float: right;">'+
										'<a class="edit-this-academic-profile start-lightbox-d" id="edit-this-academic-profile-#{id}" href="#">Editar <img src="/img/edit.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+  
										'<a class="delete-this-academic-profile" id="delete-this-academic-profile-#{id}" href="#">Borrar <img src="/img/deleted.png" alt="CakePHP" style="width: 14px; cursor: pointer;"></a>'+
									'</div>'+
								'</div>'
							);
							
							var a0 = {
								"id":obj.id,
								"basic_profile_id":obj.basic_profile_id,
								"academic_index":obj.academic_index,						
								"promotion":obj.promotion,						
								"specialty":obj.specialty,						
								"graduate_name":obj.graduate_name,						
								"graduate_type_name":obj.graduate_type_name,						
							}
						
						
							var namespace = 'academic-profile';
							
							$($('insert-this-'+namespace+'-in').innerHTML).insert({bottom: v0.evaluate(a0)});
														
							
							$('edit-this-academic-profile-'+obj.id).observe('click',function(event){				
								event.preventDefault();
								$('ligtbox-white-d','ligtbox-black-d').each(function(element){
									element.appear();
								})
							})
							
							form_b_delete.delete_config()
							edit_b_form.edit_config();
								
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
							$('edit-successful-academic-profile').setStyle({"display":"block"}); 
						
							setTimeout(function(){
								$('edit-successful-academic-profile').setStyle({"display":"none"})	
							}, 3000);
							// end successful mensage
							
							var v0 = new Template(
								'<li>Graduado de: #{graduate_type_name} en #{graduate_name}.</li>'+	
								'<li>Promoción: #{promotion}</li>'+	
								'<li>Specialidad: #{specialty}</li>'+	
								'<li>Indice Academico: #{academic_index}</li>'
							);
							
							var a0 = {
								"promotion":obj.promotion,
								"specialty":obj.specialty,
								"academic_index":obj.academic_index,
								"graduate_name":obj.graduate_name,						
								"graduate_type_name":obj.graduate_type_name
							}
							
							$('log-content-academic-profile-'+obj.id).update(v0.evaluate(a0));
							
						}
					}	
				},
				"edit_get_current_data":{
					"onSuccess":function(obj){				
						
						$('EditAcademicProfilePromotionId').value 		= obj.promotion_id;
						$('EditAcademicProfileSpecialtyId').value 		= obj.specialty_id;
						$('EditAcademicProfileAcademicIndex').value 	= obj.academic_index;
						$('EditAcademicProfileGraduateId').value 		= obj.graduate_id;
						
						//console.log(obj);
					}
				}
			},	
			"_delete":{
				
			}	
		}
	}
	
	// config_obj,callbacks,namespace
	
	var form_a_add		= new Forms.CommonTasks.Add(config_obj,callbacks,'basic-profile');

	var edit_a_form		= new Forms.CommonTasks.Edit(config_obj,callbacks,'basic-profile');

	var form_a_delete	= new Forms.CommonTasks.Delete(config_obj,callbacks,'basic-profile');
	
	var form_b_add		= new Forms.CommonTasks.Add(config_obj,callbacks,'academic-profile');
	
	var edit_b_form		= new Forms.CommonTasks.Edit(config_obj,callbacks,'academic-profile');
	
	var form_b_delete	= new Forms.CommonTasks.Delete(config_obj,callbacks,'academic-profile');

	
	// end

})
