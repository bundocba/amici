<?php
/**
 * Element: Version
 * Displays the version check
 *
 * @package         NoNumber Framework
 * @version         13.10.5
 *
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            http://www.nonumber.nl
 * @copyright       Copyright © 2013 NoNumber All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

class JFormFieldNN_Version extends JFormField
{
	public $type = 'Version';
	private $params = null;

	protected function getLabel()
	{
		return '';
	}

	protected function getInput()
	{
		$this->params = $this->element->attributes();

		$extension = $this->def('extension');
		$xml = $this->def('xml');
		if (!strlen($extension) || !strlen($xml))
		{
			return '';
		}

		$authorise = JFactory::getUser()->authorise('core.manage', 'com_installer');
		if (!$authorise)
		{
			return '';
		}

		// Import library dependencies
		require_once JPATH_PLUGINS . '/system/nnframework/helpers/versions.php';
		$versions = NNVersions::getInstance();

		return $versions->getMessage($extension, $xml);
	}

	private function def($val, $default = '')
	{
		return (isset($this->params[$val]) && (string) $this->params[$val] != '') ? (string) $this->params[$val] : $default;
	}
}
