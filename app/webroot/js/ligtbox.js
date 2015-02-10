	var UserInterface = { Ligtbox : { } };

	UserInterface.Ligtbox = Class.create({
		
		initialize: function(ligtbox_white_content_id,ligtbox_black_overlay_id,ligtbox_start_class,ligtbox_end_class){
			
			this.ligtbox_white_content_id = ligtbox_white_content_id;
			this.ligtbox_black_overlay_id = ligtbox_black_overlay_id;
			this.ligtbox_start_class = ligtbox_start_class;
			this.ligtbox_end_class = ligtbox_end_class;			
			
			this.start();
			this.end();
		
		},
		start: function(){			
			
			var ligtbox_white_content_id = this.ligtbox_white_content_id;
			var ligtbox_black_overlay_id = this.ligtbox_black_overlay_id;
			var ligtbox_start_class = this.ligtbox_start_class;
			
			$$('.'+ligtbox_start_class).each(function(element){
				element.observe('click',function(event){				
					event.preventDefault();
					$(ligtbox_white_content_id,ligtbox_black_overlay_id).each(function(element){
						element.appear();
					})
				})
			})
			
		},
		end: function(){
			
			var ligtbox_white_content_id = this.ligtbox_white_content_id;
			var ligtbox_black_overlay_id = this.ligtbox_black_overlay_id;			
			var ligtbox_end_class = this.ligtbox_end_class;
			
			$$('.'+ligtbox_end_class,'#'+ligtbox_black_overlay_id).each(function(element){
				
				element.observe('click',function(event){				
					event.preventDefault();
					
					$(ligtbox_white_content_id,ligtbox_black_overlay_id).each(function(element){
						element.fade();
					})
					
				})
			});
		}
		
	});	

	document.observe("dom:loaded", function(){
		
		if($('ligtbox-container-a')){
			ligtbox_a_white_content_id = 'ligtbox-white-a';
			ligtbox_a_black_overlay_id = 'ligtbox-black-a';
			ligtbox_a_start_class = 'start-lightbox-a';
			ligtbox_a_end_class = 'end-lightbox-a';
			
			ligtbox_a = new UserInterface.Ligtbox(ligtbox_a_white_content_id,ligtbox_a_black_overlay_id,ligtbox_a_start_class,ligtbox_a_end_class);
		}
		if($('ligtbox-container-b')){
			ligtbox_b_white_content_id = 'ligtbox-white-b';
			ligtbox_b_black_overlay_id = 'ligtbox-black-b';
			ligtbox_b_start_class = 'start-lightbox-b';
			ligtbox_b_end_class = 'end-lightbox-b';
			
			ligtbox_b = new UserInterface.Ligtbox(ligtbox_b_white_content_id,ligtbox_b_black_overlay_id,ligtbox_b_start_class,ligtbox_b_end_class);
		}
		if($('ligtbox-container-c')){
			ligtbox_b_white_content_id = 'ligtbox-white-c';
			ligtbox_b_black_overlay_id = 'ligtbox-black-c';
			ligtbox_b_start_class = 'start-lightbox-c';
			ligtbox_b_end_class = 'end-lightbox-c';
			
			ligtbox_b = new UserInterface.Ligtbox(ligtbox_b_white_content_id,ligtbox_b_black_overlay_id,ligtbox_b_start_class,ligtbox_b_end_class);
		}
		if($('ligtbox-container-d')){
			ligtbox_b_white_content_id = 'ligtbox-white-d';
			ligtbox_b_black_overlay_id = 'ligtbox-black-d';
			ligtbox_b_start_class = 'start-lightbox-d';
			ligtbox_b_end_class = 'end-lightbox-d';
			
			ligtbox_b = new UserInterface.Ligtbox(ligtbox_b_white_content_id,ligtbox_b_black_overlay_id,ligtbox_b_start_class,ligtbox_b_end_class);
		}
		
	});
