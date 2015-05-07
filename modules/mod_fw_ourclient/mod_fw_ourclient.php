<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_whosonline
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;


$limit = $params->get('limit', 0);


require JModuleHelper::getLayoutPath('mod_fw_ourclient', $params->get('layout', 'default'));

