<?php
/**
* @version 1.4.0
* @package RSform!Pro 1.4.0
* @copyright (C) 2007-2013 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die('Restricted access');$Itemid = JRequest::getVar('Itemid');
?>
<div id='rsform'>
	<?php if ($this->params->get('show_page_heading', 0)) { ?>
		<h1 class='page_heading'><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php } ?>
	<?php echo RSFormProHelper::displayForm($this->formId); ?>
</div>
<style>
	iframe{
		display:none;
	}
	#rsform iframe{
		display:block;
	}
</style>