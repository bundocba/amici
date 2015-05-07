<?php
	$view = JRequest::getVar('view');
?>
<jdoc:include type="modules" name="order_now" />
<div id="slide_content" class='static<?php echo $pageclass; ?>'>
	<?php if ($this->countModules('static_banner')): ?>
		<jdoc:include type="modules" name="static_banner" />
	<?php endif; ?>
	<div class='wrap_content bound_bg' id='bound_banner_static'>
		<div class='navigation'>
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
				<tr>
					<td class='menu-left'><jdoc:include type="modules" name="navigation-left" /></td>
					<td class='logo'>
						<a href='<?php echo JURI::root(); ?>'>
							<img src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png' />
						</a>
					</td>
					<td class='menu-right'><jdoc:include type="modules" name="navigation-right" /></td>
				</tr>
			</table>
		</div>
		
		<div class="main_content<?php echo $pageclass.' '.$view; ?>"> 
			<jdoc:include type="message" />
			
			<table class='tbl_menus' border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td class='menu_items'>
						<jdoc:include type="modules" name="pos-left" style="xhtml"/>
					</td>
			
					<td class='menu_contents'>
						<div class='wrap_component'>
							<jdoc:include type="component" />
						</div>
					</td>
				</tr>
			</table>
		</div>
		
		<?php if ($this->countModules('pos_bottom')): ?>
		<div class="bottom">
			<jdoc:include type="modules" name="pos_bottom" style="xhtml"/>
		</div>
		<?php endif; ?>
	</div>
</div> 