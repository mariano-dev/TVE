// JavaScript Document
jQuery(document).ready(function($){
	var wphi_pro = (wphi_obj.wphi_pro=='yes');
	
	function parse_query_string(query) {
	  var vars = query.split("&");
	  var query_string = {};
	  for (var i = 0; i < vars.length; i++) {
		var pair = vars[i].split("=");
		// If first entry with this name
		if (typeof query_string[pair[0]] === "undefined") {
		  query_string[pair[0]] = decodeURIComponent(pair[1]);
		  // If second entry with this name
		} else if (typeof query_string[pair[0]] === "string") {
		  var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
		  query_string[pair[0]] = arr;
		  // If third or later entry with this name
		} else {
		  query_string[pair[0]].push(decodeURIComponent(pair[1]));
		}
	  }
	  return query_string;
	}		

	$('.wphi.wrap a.nav-tab').click(function(){
		$(this).siblings().removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active');
		$('.nav-tab-content').hide();
		$('.nav-tab-content').eq($(this).index()).show();
		window.history.replaceState('', '', wphi_obj.this_url+'&t='+$(this).index());
		$('form input[name="wphi_tab"]').val($(this).index());
		$('.wrap.wphi').attr('class', 'wrap wphi tab-'+$(this).index());
	});	
	var query = window.location.search.substring(1);
	var qs = parse_query_string(query);		
	
	if(typeof(qs.t)!='undefined'){
		$('.wrap.wphi a.nav-tab').eq(qs.t).click();
		
	}
	
	$('body').on('click', '.wphi .wphi-settings h3', function(){
		var target = '.wphi .wphi-settings ul.menu-class.pages_'+$(this).attr('data-id');		
		
		if($(this).data('premium')!=true || wphi_pro){
		
			if(!$(target).is(':visible')){	
				$('.wphi .wphi-settings ul.menu-class').hide();
				$(target).fadeToggle();
			}else{
				$('.wphi .wphi-settings ul.menu-class').hide();
			}
		}
	});
	
	if ($('.wphi div.banner_wrapper').length > 0) {

		if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
			$('.wphi').on('click', 'div.banner_wrapper:not(.gluri_banner_wrapper)', function(e) {
				e.preventDefault();
				var no_slider = $(this).find('.wphi_no_slider');
				if(no_slider.length > 0){
					no_slider.show();
					return ;
				}
				
				$('.wphi_submit_btn').hide();
				
				var parent_obj = $(this).parent();
				var wphi_uid = parent_obj.data('uid');
				var wphi_type = parent_obj.data('type');
				
				$('input[name="hi_fields_focus"]').val(wphi_uid);
				parent_obj.find('.wphi_submit_btn').show();
				
				var id = $(this).find('.hi_vals');
				//console.log(wphi_type);
				//console.log(id.length);
				
				var img_placeholder = $(this).find('.wphi_header_image_placeholder');
				
				wp.media.editor.send.attachment = function(props, attachment) {


					var file_obj = attachment.url;
					var file = file_obj.split('/');
					file = file[file.length-1];	
					
					
					var ext_obj = file;
					var ext = ext_obj.split('.');
					ext = ext[ext.length-1];
					
				
					
					var is_image = (!$(id).parents().eq(1).hasClass('gluri_video_wrapper') && wphi_obj.video_extensions.indexOf(ext)<0);
					var is_video = ($(id).parents().eq(1).hasClass('gluri_video_wrapper') && wphi_obj.video_extensions.indexOf(ext)>=0);
					
					//console.log($(id).parents().eq(1));
					//console.log(is_image);
					//console.log(is_video);
					//console.log(ext);
					
					id.val(attachment.id);
					
					if(is_image){	
											
						img_placeholder.prop('src', attachment.url);
						img_placeholder.show();
						$(id).parent().attr('style', "background:url('"+attachment.url+"'); background-repeat:no-repeat;");						
					}
					
					if(is_video){
						$(id).parents().eq(1).find('span').html(file);
						
						switch(wphi_type){
							case 'default':
								// id.attr('name', 'header_videos['+wphi_type+']');
							break;
							default:
							// id.attr('name', 'header_videos['+wphi_type+']');
							break;
						}
					}
					
				};
				
				wp.media.editor.open($(this));
				return false;
			});			
		}
		
		
		
	};
	
	if ($('.wphi').length > 0) {
			setInterval(function(){
				wphi_methods.update_hi();
				//console.clear();
				
				
					
				
			}, 1000);
			
			if(wphi_obj.hi_fields_focus!=''){
				setTimeout(function(){
					
					$('li[data-uid="'+wphi_obj.hi_fields_focus+'"]').closest('ul').show();
					
					$([document.documentElement, document.body]).animate({
						scrollTop: $('li[data-uid="'+wphi_obj.hi_fields_focus+'"]').offset().top					
					}, 3000);
					
					
				}, 1000);
			}
	}
	
	$('.wphi').on('click', '.head_area a.how', function(){
		$('.wphi .head_area .pre, .wphi .head_area a.templates').toggle();
	});
	$('.wphi').on('click', '.head_area a.templates', function(){
		
		$(this).toggleClass('clicked');
		$('.wphi .head_area .pre, .wphi .head_area a.how').toggle();
		$('.wphi .shortcode_area, .wphi .templates_area').toggle();
		
		
		$(this).find('span').html($(this).find('span').html()!=$(this).data('close')?$(this).data('close'):$(this).data('text'));
		
		
	});	

	$('.wphi li a.wphi_clear_btn').on('click', function(){
		//console.log($(this));
		var parent_obj = $(this).parent();
		parent_obj.find('.hi_vals').val('');
		parent_obj.find('.banner_wrapper').removeAttr('style');
		parent_obj.find('.banner_wrapper span').hide();
		$('.wphi_submit_btn').hide();
		parent_obj.find('.wphi_submit_btn').show();
		var wphi_uid = parent_obj.data('uid');
		$('input[name="hi_fields_focus"]').val(wphi_uid);
	});
	
	$('.wphi form.templates ul li').on('click', function(){

		$('.wphi form.templates input[name="wphi_template"]').val($(this).data('id'));
		var selected_item = $(this).parent().find('.selected').data('id');
		$(this).parent().find('.selected').removeClass('selected');
		$(this).addClass('selected');
		switch($(this).data('id')){
			case "reset":
				if(selected_item!=$(this).data('id'))
				alert(wphi_obj.wphi_tempalte_reset);
			break;
			case "custom":
				if(selected_item!=$(this).data('id'))
				alert(wphi_obj.wphi_html_styles);
				
				$('.wphi_template_custom').fadeIn();
			break;
		}
		
	});
	
	$('h3[data-premium="true"]').on('click', function(e){
		e.preventDefault();
		if(!wphi_pro)
		alert(wphi_obj.wphi_premium_alert);
	});
	
	$('.wphi_submit_btn').on('click', function(){
		$('form#wphi-headers-section').submit();
	});
});		
	
						
var wphi_methods = {

		update_hi: function(){
			jQuery.each(jQuery('.banner_wrapper .hi_vals'), function(){
				if(jQuery(this).val()>0){
					jQuery(this).parent().find('.dashicons').fadeIn();
				}else{
					jQuery(this).parent().find('.dashicons').fadeOut();
				}
			});
		}
}