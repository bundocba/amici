/* var $j = jQuery;
var top_navigation = 0;
var navigation = null;
var order_now;
jQuery(document).ready(function(){
	//jQuery('#slide_intro').parallax("50%", 0.3);
	jQuery('#slide_second').parallax("50%", 0.3);
	jQuery('#slide_third').parallax("50%", 0.3);
	jQuery('#slide_fourth').parallax("50%", 0.3);
	jQuery('#slide_fifth').parallax("50%", 0.3);
	jQuery('#slide_sixth').parallax("50%", 0.1);
	jQuery('#slide_seventh').parallax("50%", 0.3);
	navigation = jQuery("#navigation");
	top_navigation = navigation.offset().top;
	order_now = $j('a#order_now');			
	
	var height = jQuery( window ).height();				
	if(height >= 650 && height <= 1080){	
		if(height >= 1080)
			height = 1070;
		jQuery('#slide_intro').height(height);				
	}
});

$j( window ).scroll(function() {

	if($j(window).scrollTop() >= top_navigation)
	{	
		navigation.addClass('fixed');
		order_now.show();
	}
	else
	{	
		navigation.removeClass('fixed');
		order_now.hide();
	}
}); */