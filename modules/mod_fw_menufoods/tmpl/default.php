<?php
defined('_JEXEC') or die;
$view = JRequest::getVar('view');
$artId = 0;
if($view=='category')
	$curCate = JRequest::getVar('id');
else{
	$curCate = explode(":",JRequest::getVar('catid'));
	$curCate = $curCate[0];
	
	$artId = explode(":",JRequest::getVar('id'));
	$artId = $artId[0];
}

?>
<div class='menu_foods <?php echo $moduleclass_sfx; ?>' id='menu_food'>

	<ul class='menu'>
	<?php foreach ($cates as $key => &$cate) : ?>
		<li class='category item <?php echo (($curCate==$cate->id) ? 'active' : '');?>'>
			<a class='anchor' data="<?php echo $cate->id;?>" href='<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($cate->id));?>'><?php echo $cate->title; ?></a>
			
			<?php
				$artiles = getFWMenuArticles($db, $cate->id);
				if(count($artiles)){
				echo '<ul class="level2">';
					$pro_link ='';
					foreach($artiles as $article){
					
						$article->slug = $article->id.':'.$article->alias;
						$article->catslug = $cate->id ? $cate->id .':'.$cate->alias : $cate->id;
						$article->link = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catslug));
						if($article->id=='76'){
							$pro_link = $article->link;
						}
					?>
						<li class='<?php echo ($article->id=='76')?'promtion':''; ?> article <?php echo (($artId==$article->id) ? 'active' : '');?>'>
							<a href='<?php echo $article->link; ?>'><?php echo $article->title; ?></a>
						</li>
					<?}
				echo '</ul>';
				}
			?>
		</li>
	<?php endforeach; ?>
	</ul>
</div>
<script type='text/javascript'>
	var $j = jQuery;
	var menu_food = null;
	var top_menu_food=0;
	jQuery(document).ready(function(){
		menu_food = jQuery(".moduletable.menu_food");
		top_menu_food = menu_food.offset().top;
	});
	
	$j('li.category a.anchor').click(function(event){
		var data = jQuery(this).attr('data');
		//if(data!='24'){
			var ul = $j(this).next();
			var hasActive = ul.is(':visible');
			$j('ul.level2').slideUp();
			if(!hasActive)
			{	
				ul.slideDown();
			}
			event.preventDefault();
		/*}else{
			jQuery(this).attr('href','<?php echo $pro_link;?>');
			return true;
		}*/
	});
	
	$j( window ).scroll(function() {

		if($j(window).scrollTop() >= top_menu_food)
		{	
			menu_food.addClass('pos_fixed');
		}
		else
		{	
			menu_food.removeClass('pos_fixed');
		}
	});
</script>