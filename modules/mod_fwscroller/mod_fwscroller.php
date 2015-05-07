<?php
defined('_JEXEC') or die;
$path_imgs = JURI::base().'modules/mod_fwscroller/images/';
?>
<style type='text/css'>
	a#page_scroller{
		background: url(<?php echo $path_imgs;?>btn_next_desktop.png) no-repeat;
		display: block;
		position: fixed;
		right: 20px;
		z-index: 999999;
		width: 52px;
		height: 52px;
		bottom: 30px;
		font-size: 0;
		transition: all 0.5s;
	}
	a#page_scroller:hover{
		background: url(<?php echo $path_imgs;?>btn_next_desktop_hover.png) no-repeat;
	}
	a#page_scroller.end{
		 -ms-transform: rotate(180deg); /* IE 9 */
		-webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
		transform: rotate(180deg);
	}
</style>

<script type='text/javascript'>
var section_padding = 95;
var $j = jQuery;
var section;
var control_scroll;
$(document).ready(function(){
	section = $j('div.slider');
	control_scroll = $j("#page_scroller");
});
function onHandleScroll(){

	var curYOffset = window.pageYOffset+section_padding;
	var length = section.length;
	var step = 0;
	
	for(var i=0; i < length; i++){
	
		if($(section[i]).offset().top > curYOffset){
			var offsetTop = $j(section[i]).offset().top - section_padding;
			$j('html, body').animate({
				scrollTop: offsetTop
			});
			break;
		}
		step++;
	}
	
	if(control_scroll.hasClass('end')){
		$j('html, body').animate({
				scrollTop: 0
		});
	}
}

$j( window ).scroll(function() {

	var curY = window.pageYOffset;
	if(curY > $j(section[section.length-2]).offset().top){
		control_scroll.addClass('end');
	}
	else if(control_scroll.hasClass('end')){ 
		control_scroll.removeClass('end');
	}

});
</script>

<a id='page_scroller' href='javascript:;' onclick='onHandleScroll()'></a>