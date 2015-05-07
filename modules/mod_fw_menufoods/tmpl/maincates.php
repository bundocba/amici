<?php
defined('_JEXEC') or die; 

?>
<div class='menu_foods <?php echo $moduleclass_sfx; ?>'>
	<ul class='menu'>
	<?php foreach ($cates as $key => &$cate) : ?>
		<li class='item _<?php echo $cate->id; ?>'>
			<a class='anchor' href='<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($cate->id));?>'><?php echo $cate->title; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>
