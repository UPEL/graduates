/*
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012, Romel Gomez. (phpyalgomas.blogspot.com)
 * @link          phpyalgomas.blogspot.com
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

var Forms = { CommonTasks : { View: { }, Add : { }, Edit : { }, Delete : { } } };

Forms.CommonTasks.View = Class.create({

	// class	view-this-namespace
	// id		view-this-namespace-
	
	initialize: function(config_obj,callbacks,namespace){
		this.config_obj = config_obj;
		this.callbacks = callbacks;
		this.namespace = namespace;
		this.view_this();		
	},
	view_this:function(){
		
		var config_obj = this.config_obj; 
		var namespace = this.namespace; 
		
		$$('.view-this-'+namespace).each(function(element){
			$(element.id).observe('click',function(event){	
				event.preventDefault();	
					
				var element = event.element();
					
				//console.log(element);
					
				str_replace = function(cadena, cambia_esto, por_esto){
					return cadena.split(cambia_esto).join(por_esto);
				}		
					
				var elementId = str_replace(element.id,'view-this-'+namespace+'-','');
					
				window.location= config_obj[namespace].view.action+'/'+elementId;
					
			})
		})
		
	}
})


Forms.CommonTasks.Add = Class.create({
	
	initialize: function(config_obj,callbacks,namespace){
		this.config_obj			= config_obj; 
		this.callbacks			= callbacks; 
		this.namespace			= namespace; 
		this.add_new();		
	},
	add_new: function(){		
		var config_obj			= this.config_obj;
		var add_request 		= this.add_request;
		var callbacks			= this.callbacks;
		var namespace			= this.namespace;
		
		//callbacks[namespace].add.add_new.before();
		
		$$('.add-this-'+namespace).each(function(element){
			$(element.id).observe('click',function(event){	
								
				str_replace = function(cadena, cambia_esto, por_esto){
					return cadena.split(cambia_esto).join(por_esto);
				}
								
				var element = event.element();
					
				//console.log(element);	
								
				var elementId = str_replace(element.id,'add-this-'+namespace+'-','');
								
				$('insert-this-'+namespace+'-in').update('logs-'+namespace+'-'+elementId);
				
				if(config_obj[namespace].add.obj.parent_id){
					$(config_obj[namespace].add.obj.parent_id).value = elementId;	
				}
																		
			})
		})
		
		
		if($(config_obj[namespace].add.id)){
			$(config_obj[namespace].add.id).observe('submit',function(event){
				event.preventDefault();
			
				add_request(config_obj,callbacks,namespace);
			});
		}
		
		//callbacks[namespace].add.add_new.after(config_obj,namespace);
	},
	add_request:function(config_obj,callbacks,namespace){			
		
		var new_obj = {}
		var f = Object.keys(config_obj[namespace].add.obj)
		f.each(function(elementId){
			new_obj[elementId] = $(config_obj[namespace].add.obj[elementId]).value;
		})	
			
		var config = { 
			method:'get',
			parameters:new_obj,
				
			// START onSuccess
			onSuccess: function(response){
				var c = response.responseText
				var d = c.replace(/^\s+/g,'').replace(/\s+$/g,'')
				var obj = d.evalJSON()
			
				callbacks[namespace].add.add_request.onSuccess(obj);	
			}
			// END  onSuccess
		}
				
		if(config_obj[namespace].add.console_log){
			new Ajax.Updater('debug',config_obj[namespace].add.action,config);
		}else{
				new Ajax.Request(config_obj[namespace].add.action,config);
		}
	}	
});


Forms.CommonTasks.Edit = Class.create({

	// class	edit-this-namespace
	// id		edit-this-namespace-

	initialize: function(config_obj,callbacks,namespace){
		
		this.config_obj				=  config_obj;
		this.callbacks				=  callbacks;
		this.namespace				=  namespace;
		this.edit_config();
	
	},
	edit_config: function(){
		
		var config_obj				= this.config_obj;
		var callbacks				= this.callbacks;
		var namespace				= this.namespace;
		var edit_request			= this.edit_request;
		var edit_get_current_data	= this.edit_get_current_data;
		
		$$('.edit-this-'+namespace).each(function(element){
			$(element.id).observe('click',function(event){	
					
				var element = event.element();
					
				//console.log(element);
				//console.log('ohla');
					
				str_replace = function(cadena, cambia_esto, por_esto){
					return cadena.split(cambia_esto).join(por_esto);
				}		
					
				var elementId = str_replace(element.id,'edit-this-'+namespace+'-','');
					
				$(config_obj[namespace].edit.obj.id).value = elementId;
															
				edit_get_current_data(elementId,config_obj,callbacks,namespace);
				edit_request(config_obj,callbacks,namespace);
					
			})
		})
		
	},
	edit_get_current_data: function(elementId,config_obj,callbacks,namespace){
		
		var new_obj ={
			"id":elementId	
		}
		
		var config = { 
				method:'get',
				parameters:new_obj,
				// START onSuccess
				onSuccess: function(response){
					
					var c = response.responseText
					var d = c.replace(/^\s+/g,'').replace(/\s+$/g,'')
					var obj = d.evalJSON()
						
					callbacks[namespace].edit.edit_get_current_data.onSuccess(obj);
				}
				// END  onSuccess
		}
		
		if(config_obj[namespace].edit.console_log){
			new Ajax.Updater('debug',config_obj[namespace].edit.get_current_data_action,config);
		}else{
			new Ajax.Request(config_obj[namespace].edit.get_current_data_action,config);
		}
		
	},
	edit_request: function(config_obj,callbacks,namespace){
		$(config_obj[namespace].edit.id).observe('submit',function(event){
			event.preventDefault();
			
			var new_obj = {};
			var f = Object.keys(config_obj[namespace].edit.obj)
			f.each(function(elementId){
				new_obj[elementId] = $(config_obj[namespace].edit.obj[elementId]).value;
			})
			
			var config = { 
				method:'get',
				parameters:new_obj,
				// START onSuccess
				onSuccess: function(response){
					
					var c = response.responseText
					var d = c.replace(/^\s+/g,'').replace(/\s+$/g,'')
					var obj = d.evalJSON()
					callbacks[namespace].edit.edit_request.onSuccess(obj);				
					
				}
				// END  onSuccess
			}
				
			if(config_obj[namespace].edit.console_log){
				new Ajax.Updater('debug',config_obj[namespace].edit.action,config);
			}else{
				new Ajax.Request(config_obj[namespace].edit.action,config);
			}
			
		})
	}
})


Forms.CommonTasks.Delete = Class.create({
	
	// class	delete-this-namespace
	// id		delete-this-namespace-
	
	initialize: function(config_obj,callbacks,namespace){
		
		this.config_obj 		= config_obj;
		this.callbacks 			= callbacks;
		this.namespace			= namespace;
		this.delete_config();
		
	},
	delete_config: function(){
		var config_obj 			= this.config_obj;
		var callbacks 			= this.callbacks;
		var namespace 			= this.namespace;
		var delete_request 		= this.delete_request;
		
		$$('.delete-this-'+namespace).each(function(element){
			
			$(element.id).observe('click',function(event){
				event.preventDefault();
				element = event.element();
							
				str_replace = function(cadena, cambia_esto, por_esto){
					return cadena.split(cambia_esto).join(por_esto);
				}
					
				var elementId = str_replace(element.id,'delete-this-'+namespace+'-','')
					
				if(confirm('¿Reamente quiere eliminar este registro?')){
					delete_request(elementId,config_obj,namespace)	
				}
					
			})
		})
	},
	delete_request: function(elementId,config_obj,namespace){
		
		var obj = {"id":elementId}
													
		var config = {
			method:'get',
			parameters:obj,
			onSuccess: function(response){
				
				var c = response.responseText
				var d = c.replace(/^\s+/g,'').replace(/\s+$/g,'')
				var e = d.evalJSON()
				
				if(e.result == 'successful'){
					$('log-'+namespace+'-'+elementId).fade();
				}
				
			}
		}
		
		if(config_obj[namespace]._delete.console_log){
			new Ajax.Updater('debug',config_obj[namespace]._delete.action,config);
		}else{
			new Ajax.Request(config_obj[namespace]._delete.action,config);
		}					
			
	}
})






