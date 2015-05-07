<?php
defined('_JEXEC') or die;
$background_size = $params->get('background_size','100%');
$path_img = $params->get('path_img', 0);
$path_class = $params->get('moduleclass_sfx');
$doc = JFactory::getDocument();
$style="#slide_content .bound_bg{
	background:url('".JURI::base().$path_img."') no-repeat;
	background-size:{$background_size} !important
}";
$doc->addStyleDeclaration($style);
?>

