<?php
defined('_JEXEC') or die;

$categories = $params->get('categories');
$db = &JFactory::getDbo();


$query = "Select c.id, c.title, c.alias, (Select filename From #__phocagallery p where p.catid = c.id order by ordering asc Limit 1) as image From #__phocagallery_categories c where parent_id = 0 AND published = 1 order by ordering asc";
$db->setQuery($query);
$items  = $db->loadAssocList();


$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_cate_photogallery', $layout);