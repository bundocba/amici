<?php
/**
 * @package    Joomla.Site
 * @copyright  Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

function whatPage($arrMenuPage,$itemId){
  foreach($arrMenuPage as $key=>$val){
    if($key == $itemId)
      return $val;
  }
  return '';
}

/* The following line loads the MooTools JavaScript Library */
JHtml::_('behavior.framework', true);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
$arrMenuPage = array(110=>'_full service',114=>'_full testimonial',111=>'_full gallery',109=>'_full page_menu',108=>'_aboutus');

$itemId = JRequest::getVar('Itemid',101);
$ishome = ($itemId == 101);

$view = JRequest::getVar('view');

$page = whatPage($arrMenuPage,$itemId);
$pageclass = (($page != '' ) ? $page : '');

$bottomClass = ($itemId == '108') ? 'none' : '';

  

?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
  <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    
    <?php if($ishome){ ?>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/home.js?v=1.0"></script>
    
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.localscroll-1.2.7-min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.scrollTo-1.4.2-min.js"></script>
    
    <?php } ?>
    
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jcarousellite_1.0.1.min.js"></script>
    
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css?v=1.5" type="text/css" />
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51634793-1', 'auto');
  ga('send', 'pageview');

</script>
  </head>
  <body>
  
    <div id='wrap_all'>
      
      <?php if($ishome)
        require_once('layout/home.php');
      else if($itemId == '109') 
        require_once('layout/menu.php');
      else
        require_once('layout/default.php');
       ?>
    </div>
    
    <jdoc:include type="modules" name="debug" />
    
    
    <script type='text/javascript'>
      if(typeof document.getElementById('slide_outclient') != 'undefined'){
        jQuery("#slide_outclient").jCarouselLite({
            btnNext: ".next",
            btnPrev: ".prev",
            visible: 1
        });
      }

    </script>
  </body>
</html>