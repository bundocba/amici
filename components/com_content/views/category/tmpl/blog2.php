<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

?>
<div class="blog <?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading')) : ?>
	<h1 class='page_heading'>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>

	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
	<h1 class='page_heading'>
		<?php echo $this->escape($this->params->get('page_subheading')); ?>
		<?php if ($this->params->get('show_category_title')) : ?>
			<span class="subheading-category"><?php echo $this->category->title;?></span>
		<?php endif; ?>
	</h1>
	<?php endif; ?>


	<div class='bound_content'>
		<div class='bound_center_min'>
			<div id='slider_content'>
				<ul>
					<?php
						$introcount=(count($this->intro_items));
						$counter=0;
					?>
					<?php if (!empty($this->intro_items)) : ?>

						<?php foreach ($this->intro_items as $key => &$item) : ?>
						<?php
							$key= ($key-$leadingcount)+1;
							$rowcount=( ((int)$key-1) %	(int) $this->columns) +1;
							$row = $counter / $this->columns ;

						 ?>
						<li class="item column-<?php echo $rowcount;?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>" style="height:250px">
							<?php
								$this->item = &$item;
								echo '<div class="item-intro">'.$this->loadTemplate('item').'</div>';
							?>
						</li>
					
						<?php endforeach; ?>
					<?php endif; ?>
				</ul>
				<?php if(count($this->intro_items) > 1): ?>
				<div class='control'>
					<button class="prev button"></button>
					<button class="next button"></button>
				</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
<script type='text/javascript'>
jQuery("#slider_content").jCarouselLite({		
        btnNext: ".next",
        btnPrev: ".prev",		
		visible: 1
});
</script>
