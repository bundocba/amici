<?php
/**
 * @package		MobileDetector
 * @subpackage	plug_mobiledetector
 * @copyright	Copyright (C) 2012 Nguyen at http://code.google.com/p/joomla-mobile-detector. All rights reserved.
 * @license		GNU General Public License version 2 or later
 * This plugin also used mobileesp (http://www.mobileesp.com) (C) Anthony Hand
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class  plgSystemMobiledetector extends JPlugin {

	
	public function onAfterInitialise(){
		
	}
	
	public function onAfterRoute() {
    	$app = &JFactory::getApplication();

	    if ($app->isAdmin()) {
	      return;
	    }
		
	    $enabledJts = (int)$this->params->get('mobile_switch_enabled', 0);
	    
	    // check for change to desktop template request
	    // If request come from url via jtpl command?
	  	$changeTplRequest = JRequest::getInt('jtpl', 0);
	  	$doChangeReq = false;
		if($changeTplRequest < 1){
			// Check current user session
			$changeTplRequest = $app->getUserStateFromRequest('jtpl', 'jtpl', 0, 'int');
			if($changeTplRequest > 0){
				$doChangeReq = true;
			}else{
				// Check cookie?
				jimport('joomla.utilities.utility');
				$hash = JApplication::getHash('MOBILEDETECTOR_JTPL');
				$changeTplRequest = JRequest::getInt($hash, 0, 'cookie', JREQUEST_ALLOWRAW | JREQUEST_NOTRIM);
				if($changeTplRequest > 0){
					$doChangeReq = true;
				}
			}
		}else{
			$doChangeReq = true;
		}
		
		$tpl = false;
		if($doChangeReq){
			// Apply this change tpl request
			$forgeJtouch = JRequest::getInt('force', -1);
			if($forgeJtouch == 1){
				$tpl = $this->_getTplFromDataByName('jtouch25');
			}else if($forgeJtouch == 0){
				// oh, you want to switch to default template
				$tpl = false;
				// Remove cookie + session
				$config = JFactory::getConfig();
				$cookie_domain = $config->get('cookie_domain', '');
				$cookie_path = $config->get('cookie_path', '/');
				$lifetime = time() + 365 * 24 * 60 * 60;
				setcookie(
					JApplication::getHash('MOBILEDETECTOR_JTPL'), -1, $lifetime, $cookie_path, $cookie_domain
				);
				$app->setUserState('jtpl', -1);
			}else{
				$tpl = $this->_getTplFromDataById($changeTplRequest);
			}
			
		}else{
			// If we have enable mobile detect function? Detect if users are browsing from a mobile device!
		    if ($enabledJts == 1) {
		    	$isMobile = self::isMobileRequest();
		      	if ( $isMobile) {
		        	$mobileTpl = $this->params->get('mobile_template', '');
		        	$tpl = $this->_getTplFromDataByName($mobileTpl);
		      	}
		    }
		}
		
		// We have new template to apply
		if($tpl){
			// Apply this template
			$this->_setTemplate( $tpl->template );
			$app->getTemplate(true)->params = new JRegistry($tpl->params);
			$app->setUserState('jtpl', $tpl->id);
			
			// Save to cookie
			$config = JFactory::getConfig();
			$cookie_domain = $config->get('cookie_domain', '');
			$cookie_path = $config->get('cookie_path', '/');
			$lifetime = time() + 365 * 24 * 60 * 60;
			setcookie(
				JApplication::getHash('MOBILEDETECTOR_JTPL'), $tpl->id, $lifetime, $cookie_path, $cookie_domain
			);
		}
	}
	

	
	/**
	 * Check if users come from mobile devices or not
	 */
	public function isMobileRequest() {
    	$isMobile = false;
    	
    	if(!class_exists('uagent_info')){
    		require_once(JPATH_PLUGINS.DS."system".DS."mobiledetector".DS."mdetect.php");
    	}
    	$ua = new uagent_info();
    	
    	if($ua->DetectMobileQuick()){
    		define('MOBILEDECTOR_PLUGIN_ENVIRONMENT', 'MOBILE');
    		$isMobile = true;
    	}
    	if ($ua->DetectTierTablet() ){
    		define('MOBILEDECTOR_PLUGIN_ENVIRONMENT', 'TABLET');
    		$isMobile = true;
    	}
    	
    	if($isMobile == false){
    		define('MOBILEDECTOR_PLUGIN_ENVIRONMENT', 'DESKTOP');
    	}
    	
    	if((int)$this->params->get('mobile_include_tablets', 0) == 0){
    		if(MOBILEDECTOR_PLUGIN_ENVIRONMENT =='TABLET' ){
    			$isMobile = false;
    		}	
    	}
    	    	
    	return $isMobile;
	}
	
	
	
	/**
	 * Get default menu ItemID 
	 * @return number
	 */
	public static function getDefaultPageId(){
		$defaultID = 0;
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__menu');
		$query->where('home = 1');
		
		$db->setQuery( $query );
		$row = $db->loadObject();
		if($row){
			$defaultID = $row->id;
		}
		
		return $defaultID;
	}
	
	/**
	 * Cached function for getCachedDefaultPageId
	 */
	public function getCachedDefaultPageId() {
		$cache = & JFactory::getCache();
		$cache->setCaching( 1 );
	
		//$profiler = new JProfiler();
		return $cache->call( array( 'plgSystemJtouchmobile', 'getDefaultPageId' ) );
	}
	
	
	/**
	 * Get template info by provide its ID
	 * @param Integer $tplId
	 */
	private function _getTplFromDataById($tplId){
  		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id, template, params');
		$query->from('`#__template_styles`');
		$query->where('`client_id` = 0 AND `id`= '. (int)$tplId);
		$query->order('`id` ASC');
		$db->setQuery( $query );
		$row = $db->loadObject();
		if(!$row){
			return false;
		}else{
			return $row;
		}	
  	}
  	
  
  	/**
  	 * Get template info by provide its name
  	 * @param string $tplName
  	 */
	private function _getTplFromDataByName($tplName){
  		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id, template, params');
		$query->from('`#__template_styles`');
		$query->where('`client_id` = 0 AND `template` LIKE \''.$tplName.'\' ');
		$query->order('`id` ASC');
		$db->setQuery( $query );
		$row = $db->loadObject();
		if(!$row){
			return false;
		}else{
			return $row;
		}	
  	}

  	
  	/**
  	 * Set template that apply to the whole system
  	 * @param object $tpl
  	 */
	protected function _setTemplate( $tpl = null) {
    	if (empty($tpl)) {
      		return;
	    } else {
	    	$app = &JFactory::getApplication();
	      	$app->setTemplate( $tpl);
	
	     	// For sh404SEF
	      	if (!defined('SHMOBILE_MOBILE_TEMPLATE_SWITCHED')) {
	        	define( 'SHMOBILE_MOBILE_TEMPLATE_SWITCHED', 1);
	      	}
	    }
	}
	
}
