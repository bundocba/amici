<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_whosonline
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

	
$com_path = JPATH_SITE.'/components/com_content/';
require_once $com_path.'router.php';
require_once $com_path.'helpers/route.php';
JModelLegacy::addIncludePath($com_path . '/models', 'ContentModel');

$moduleclass_sfx = $params->get('moduleclass_sfx',0);
$limit = $params->get('limit', 0);
$category = $params->get('catid', 0);


$DB = &JFactory::getDBO();
$query = "SELECT c.*,cat.alias as category_alias 
FROM #__content c 
left join #__categories cat on c.catid = cat.id 
where c.state =1 AND c.catid = $category order by c.created desc Limit 0,".$limit;

$DB->setQuery($query);
$items = $DB->loadObjectList();
if($items ==null)
	return;
	
require JModuleHelper::getLayoutPath('mod_fw_articles', $params->get('layout', 'default'));

