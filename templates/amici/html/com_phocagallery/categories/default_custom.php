<?php
defined('_JEXEC') or die('Restricted access');


?>
<div id="phocagallery-categories">
	<div id='span_height'></div>
	<h1 class='page_heading'>Gallery</h1>
	<div class='wrap_slider'>
		<div class='bound_center_min'>
			<button class="prev button"></button>
			<div class='slider_cate_gallery'>
				<ul>
			<?php	
			
			for ($i = 0; $i < $this->tmpl['countcategories']; $i++) {

				$this->categories[$i]->linkthumbnailpath = str_replace('phoca_thumb_s_','phoca_thumb_m_',$this->categories[$i]->linkthumbnailpath);
				?>
				<li>
					<div class='bound'>
						<a href="<?php echo $this->categories[$i]->link; ?>">
						<img src='<?php echo  JURI::root().$this->categories[$i]->linkthumbnailpath; ?>' /></a>
						<a class='title' href="<?php echo $this->categories[$i]->link; ?>"><?php echo $this->categories[$i]->title_self; ?></a>
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
 jQuery(".slider_cate_gallery").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
		visible: 4
 });
 jQuery(document).ready(function(){
	var height = jQuery(window).height() - jQuery("#wrap_all").height();
	if(height > 0)
		jQuery("#span_height").height(height);
});
</script>