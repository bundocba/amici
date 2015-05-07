<?php
defined('_JEXEC') or die;
?>

<div class='food_gallery <?php echo $moduleclass_sfx; ?>'>

	<button class="prev button"></button>
	<div class='slider_gallery'>
		<ul>
		<?php 
			$i = 0;
			foreach ($items as $item):
			
			$col = $i++%2;
			$xpath = pathinfo($item['image']); 
			$thumn = 'thumbs/phoca_thumb_m_'.$xpath['basename'];
			$pattern = '/('.$xpath['basename'].')$/';
			$item['image'] = preg_replace($pattern,$thumn,$item['image']);
		
			$link = JRoute::_('index.php?option=com_phocagallery&view=category&Itemid=111&id='.$item['id'].':'.$item['alias']);
		
			?>
				<li>
					<div class='bound'>
						<a href='<?php echo $link; ?>'>
							<img src='<?php echo JURI::base().'images/phocagallery/'.$item['image']; ?>' />
						</a>
						<div class='separate'><span></span></div>
						<a href='<?php echo $link; ?>'>
							<?php echo $item['title']; ?>
						</a>
					</div>
					<div class='bg_shadow'></div>
				</li>
		<?php 
			endforeach;
		?>
		</ul>
	</div>
	<button class="next button"></button>
</div>

<script type='text/javascript'>
 jQuery(".slider_gallery").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
		visible: 4
 });
</script>