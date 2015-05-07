<?php

$view = JRequest::getVar('view');

if($view == category): ?>
	<style>
		#wrap_all #slide_content .bound_bg{
			background-position-x: 50% !important;
		}
	</style>
<?php
endif;

$Itemid=JRequest::getVar('Itemid');

if($Itemid == 114 || $Itemid == 110  ): ?>
	<style>
		#slide_content .bound_bg{
			background-size:cover !important;
		}
	</style>
<?php
endif;

if($Itemid == 111): ?>
	<style>
		#slide_content .bound_bg{
			background-position-x: 24% !important;
		}
	</style>
<?php
endif;

if($Itemid == 115): ?>
	<style>
		#slide_content .bound_bg{
			background-position-x: 72% !important;
			background-size:cover !important;
		}
	</style>
<?php
endif;

?>

<div id="slide_content" class='static<?php echo $pageclass; ?>'>
	<?php if ($this->countModules('static_banner')): ?>
		<jdoc:include type="modules" name="static_banner" />
	<?php endif; ?>
	<div class='wrap_content bound_bg' id='bound_banner_static'>
		<div class='navigation'>
			<table style="" border='0' cellspacing='0' cellpadding='0'>
				<tr>
					<td class='menu-left' style="width:73.5px;"><jdoc:include type="modules" name="navigation" /></td>
					<td class='logo' style="width:333px;">
						<a href='<?php echo JURI::root(); ?>'>
							<img src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png' />
						</a>
					</td>
					<td class='menu-right' style="width:83.5px;"><jdoc:include type="modules" name="slide_intro" /></td>
				</tr>
			</table>
		</div>
		
		<div class="main_content<?php echo $pageclass; ?>"> 
			<jdoc:include type="message" />
			
			<?php if ($this->countModules('pos-content') && $view != 'article'): ?>
				<div class='pos_content bound_center_min'>
					<jdoc:include type="modules" name="pos-content" style="xhtml"/>
				</div>
			<?php endif; ?>
			
			<jdoc:include type="component" />
			
			<?php if ($this->countModules('pos-content-bottom')): ?>
				<div class='pos_content_bottom'>
					<jdoc:include type="modules" name="pos-content-bottom" style="xhtml"/>
				</div>
			<?php endif; ?>
		</div>
		
		<?php if ($this->countModules('pos_bottom')): ?>
		<div class="bottom">
			<jdoc:include type="modules" name="pos_bottom" style="xhtml"/>
		</div>
		<?php endif; ?>
	</div>
</div> 