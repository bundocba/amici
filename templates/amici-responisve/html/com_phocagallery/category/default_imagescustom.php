<?php 
defined('_JEXEC') or die('Restricted access');

if (empty($this->items)) return;
?>
<div id="phocagallery-category">		<div id='span_height' style="height:430px;"></div>
	<h1 class='page_heading'><?php echo $this->category->title; ?></h1>
	<div class='wrap_slider'>
		<div class='bound_center'>
			<button class="prev button"></button> 
			<div class='slider_cate_gallery'>
				<ul>
			<?php	
			unset($this->items[0]);
			foreach($this->items as $key => $value) { 
				
				?>
				<li>
					<div class='bound'>
						<img class='slide_image' src='<?php echo JURI::root().$value->linkthumbnailpath; ?>' placeholder='<?php echo $value->linkorig; ?>' onclick='onChangeBg(this);' />
					</div>
				</li>
				<?php
			
			}
			?>
				</ul>
			</div>
			<button class="next button"></button>
			<div class='clear'></div>
		</div>
	</div>
</div>

<script type='text/javascript'>
if(jQuery("img.slide_image").length > 0)
{	
	jQuery('#bound_banner_static').css('background','url('+jQuery("img.slide_image").first().attr('placeholder')+') center center fixed');
}

 jQuery(".slider_cate_gallery").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
		visible: 8
 });
 function onChangeBg(obj){
	var path_bg = jQuery(obj).attr('placeholder');
	var bg = jQuery('#bound_banner_static');
	bg.css('background','url('+path_bg+') center center fixed');
 }
 

//preload img
jQuery("img.slide_image").each(function(index)
{
	jQuery(this).attr('src',jQuery(this).attr('placeholder'));
});
jQuery(document).ready(function(){
	/* var a =jQuery(window).height();

	var height = jQuery(window).height() - jQuery("#wrap_all").height();

	if(height > 0)
		jQuery("#span_height").height(height); */
});
</script>