<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$doc = &JFactory::getDocument();
return;
$doc->addScript(JURI::root().'templates/amici/js/jquery-ui-1.8.23.custom.min.js');
$doc->addScript(JURI::root().'templates/amici/js/jquery.mousewheel.min.js');
$doc->addStyleSheet(JURI::root().'templates/amici/css/jquery.mCustomScrollbar.css');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
$cateId = JRequest::getVar('id',0);
$db = JFactory::getDBO();

$query = "Select * From #__categories where published = 1 and parent_id=".$cateId;
$db->setQuery($query);
$cates = $db->loadObjectList();

function getArticles(&$db, $cateId){

	$query = "Select a.id, a.title, a.alias From #__content AS a where a.state = 1 and a.catid=".$cateId." ORDER BY a.ordering ASC";
	$db->setQuery($query);
	return $db->loadObjectList();
}
?>
<div class="blog_menu<?php echo $this->pageclass_sfx;?>">
<?php if (!empty($this->intro_items)) : ?>
	
	<table class='tbl_menus' border='0' cellpadding='0' cellspacing='0' width='100%'><tr>
		<td class='menu_items'>
			<h2 class='title_menu'>Menu</h2>
			<ul class='menu'>
			<?php foreach ($cates as $key => &$cate) : ?>
				<li class='item _<?php echo $cate->id; ?>'>
					<a class='anchor' href='<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($cate->id));?>'><?php echo $cate->title; ?></a>
					
					<?php
						$artiles = getArticles($db, $cate->id);
						if(count($artiles)){
						echo '<ul>';
							foreach($artiles as $article){
							$article->slug = $article->id.':'.$article->alias;
							$article->catslug = $cate->id ? $cate->id .':'.$cate->alias : $cate->id;
							$article->link = JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catslug));
							?>
								<li><a href='<?php echo $article->link; ?>'><?php echo $article->title; ?></a></li>
							<?}
						echo '</ul>';
						}
					?>
				</li>
			<?php endforeach; ?>
			</ul>
		</td>
		
		<td class='menu_contents'>
		<?php /*
			<div id='wrap_scroll'>
				<?php foreach ($this->intro_items as $key => &$item) : 
					$row = $key + 1;
				?>
				<div class="items-row <?php echo 'row-'.$row ; ?>">

					<?php
						$this->item = &$item;
						echo $this->loadTemplate('item');
					?>

				</div>
				<?php endforeach; ?>
			</div>
			<div class='control_scroll'>
				<img src='<?php echo JURI::root().'images/btn_scroll_menu.png';?>' />
			</div>
		*/?>
		</td>
	</tr></table>
<?php endif; ?>

</div>
<script type='text/javascript'>
	jQuery(document).ready(function(){
		var height = jQuery( window ).height()-100-120;	
		jQuery('#wrap_scroll').height(height);	
	
		var wrap_scroll = document.getElementById('wrap_scroll');
		jQuery("body").mousewheel(function(event, delta) {
			wrap_scroll.scrollTop -= (delta * 30);
		});  

		//add active class
		jQuery('a[href='+window.location.hash+']').addClass('active')
		var divfirst = jQuery('div.row-1');
		jQuery('a.anchor').click(function() {
			jQuery('a.anchor').removeClass('active');
			jQuery(this).addClass('active');	
			
			var target = jQuery('[name='+this.hash.slice(1)+']');
			if (target.length) {
			jQuery(wrap_scroll).animate({
			  scrollTop: (target.position().top-divfirst.position().top)
			}, 500,function() {
				// Animation complete.
				window.location.hash = target.attr('name');
			});
		
			return false;
			}
			
		});	
	});
</script>