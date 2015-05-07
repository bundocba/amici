<?php
defined('_JEXEC') or die;
?>
<div class='fw_acticles <?php echo $moduleclass_sfx; ?>'>

	<div class='bound_slide'>
		<div id='slide_testimonial'>
			<ul class="slide_items">
				<?php foreach ($items as $item) :
						$images = json_decode($item->images); 
						$item->slug = $item->id.':'.$item->alias;
						$item->catslug = $item->catid ? $item->catid .':'.$item->category_alias : $item->catid;
						$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
						$logo = JURI::root().$images->image_intro;
				?>
					<li class='item'>
						<div class='bound'>
							<a class="fwart-title" href="javascript:;"><?php echo $item->title; ?></a>
							<div class='content'><?php echo $item->introtext; ?></div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	
	<div class='clear'></div>
	<h3 class='sub_title'>Testimonials</h3>
	<div class='control'>
		<button class="prev button"></button>
		<button class="next button"></button>
	</div>
	
</div>
<script>
	jQuery("#slide_testimonial").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
		visible: 1
	});
</script>