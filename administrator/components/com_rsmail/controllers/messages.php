<?php
/**
* @version 1.0.0
* @package RSMail! 1.0.0
* @copyright (C) 2009 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
*/

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

class rsmailControllerMessages extends JControllerAdmin
{
	protected $text_prefix = 'COM_RSMAIL_MESSAGES';
	
	/**
	 * Constructor.
	 *
	 * @param	array	$config	An optional associative array of configuration settings.

	 * @return	rseventsproControllerGroups
	 * @see		JController
	 * @since	1.6
	 */
	public function __construct($config = array()) {
		parent::__construct($config);
	}
	
	/**
	 * Proxy for getModel.
	 *
	 * @param	string	$name	The name of the model.
	 * @param	string	$prefix	The prefix for the PHP class name.
	 *
	 * @return	JModel
	 * @since	1.6
	 */
	public function getModel($name = 'Message', $prefix = 'rsmailModel', $config = array('ignore_request' => true)) {
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
	
	/**
	 *	Embed image
	 */
	public function embed() {
		$model = $this->getModel();
		
		$id = $model->embed();
		
		$this->setRedirect('index.php?option=com_rsmail&task=message.edit&IdMessage='.$id);
	}
	
	/**
	 *	Delete file
	 */
	public function deletefile() {
		$model = $this->getModel();
		
		$id = $model->deletefile();
		
		$this->setRedirect('index.php?option=com_rsmail&task=message.edit&IdMessage='.$id, JText::_('RSM_FILE_DELETED'));
	}
	
	
}