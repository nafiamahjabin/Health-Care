jQuery(document).ready(function(){
	

		jQuery(".scrolltotop").click(function(){
		
			jQuery("html").animate({'scrollTop' : '0'}, 1000, "easeOutExpo");
			
			return false;
		});
	
	
	jQuery(window).scroll(function(){
		
		
		
		var headerTopHeight = jQuery(".header-top").outerHeight();
		var headerbottomHeight = jQuery(".header-bottom").outerHeight();
		
		var totalHeight = headerTopHeight + headerbottomHeight;
		
		
		var utd = jQuery(window).scrollTop();
		
		if(utd > totalHeight){
			jQuery(".main-menu").addClass("fixed");
		}
		else {
			jQuery(".main-menu").removeClass("fixed");
		}
		
		
		
		if(utd > 200){
			jQuery(".scrolltotop").show();
		}
		else {
			jQuery(".scrolltotop").hide();
		}
		
		
	});
	
	
	
	
	
	
	
	
});