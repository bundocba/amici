<?php
// no direct access
defined('_JEXEC') or die;
	
$com_path = JPATH_SITE.'/components/com_content/';
require_once $com_path.'router.php';
require_once $com_path.'helpers/route.php';
JModelLegacy::addIncludePath($com_path . '/models', 'ContentModel');

$itemid = $params->get('itemid', 0);
$cateId = $params->get('catid', 0);
$moduleclass_sfx = $params->get('moduleclass_sfx','');

$db = JFactory::getDBO();

$query = "Select * From #__categories where published = 1 and parent_id=".$cateId;
$db->setQuery($query);
$cates = $db->loadObjectList();

function getFWMenuArticles(&$db, $cateId){

	$query = "Select id, title, alias From #__content where state = 1 and catid=".$cateId;

	$db->setQuery($query);
	return $db->loadObjectList();
}

require JModuleHelper::getLayoutPath('mod_fw_menufoods', $params->get('layout', 'default'));

