<?php
/**
 * @version		$Id: index.php WaseemSadiq $
 * @package		Joomla
 * @subpackage	Templates / basic skeleton template
 * @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

include_once("includes/template_config.php");
$url = clone(JURI::getInstance());
$user =& JFactory::getUser();

?>
<?php echo '<?xml version="1.0" encoding="utf-8"?' .'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >

<head>
	<jdoc:include type="head" />


		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" rel="stylesheet" type="text/css" media="screen" />	
    	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" rel="stylesheet" type="text/css" media="screen" />

    
         <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/modules.css" rel="stylesheet" type="text/css" media="screen" />
         <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/menus.css" rel="stylesheet" type="text/css" media="screen" />
         
<?php if ($this->params->get('styleSwitch') == 1): ?>
   		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/javascript/styleswitch.js"></script>
	<?php endif; ?>
         
          <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/<?php echo $this->params->get('colorStyle'); ?>.css" rel="stylesheet" type="text/css" media="screen" title="<?php echo $this->params->get('colorStyle'); ?>" />
          
    	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/joomla.css" type="text/css" /> 
    

   <link href="http://www.techcorpsohio.org/unified_theme/css/headers.css" rel="stylesheet" type="text/css" media="screen" />
   <link href="http://www.techcorpsohio.org/unified_theme/css/typography.css" rel="stylesheet" type="text/css" media="screen" />


	<script type="text/javascript">
    	window.onDomReady(function(){ new SmoothScroll({duration: 1200}); });
	</script>
	
</head>

<body id="<?php echo $style ;?>" class="joomla">
  <?php require("http://" . $_SERVER['HTTP_HOST'] . "/unified_theme/cross_site_nav.php?site=techcorpsohio.org"); ?>
  <div class="clearfix"></div>

<div id="page">
   
        <div id="header" class="clr clearfix heading techcorpsohio_header">
        
        <?php if ($this->params->get('sitename') == 1): ?>
       	<div id="displaysitename">
          <h1><a><?php echo $mainframe->getCfg('sitename') ?></a></h1>
        </div>  
        <div id="sitetagline">
          <h2>Enhancing K-12 education through<br />
          the effective use of technology.</h2>
        </div>
       
   <?php endif; ?>
   
<!--         <?php if ($this->params->get('logo') == 1): ?>
         <div id="branding"></div>    
   <?php endif; ?> -->
            
        <?php if ($this->countModules('user4')) : ?>
            <div id="search-module">
            	<jdoc:include type="modules" name="user4" style="xhtml" />
      </div><!-- end top-module -->
<?php endif; ?>
       

            
        </div><!-- end header -->
            
        
<?php if ($this->countModules('user3')) : ?>
       
<div id="nav" class="clr">
            <jdoc:include type="modules" name="user3" style="raw" /> 
        </div><!-- end nav -->
        <?php endif; ?>
        
         <div class="clear"></div>
        
        <?php if ($this->countModules('top')) : ?>
        <div id="top-module-top"></div>
            <div id="top-module">
            	<jdoc:include type="modules" name="top" style="xhtml" />
            </div>
            <div id="top-module-bottom"></div>
            <!-- end top-module -->
            <?php endif; ?>
 
<div id="padweg" class="clr clearfix">
 <div id="breadcrumbs">
        	<jdoc:include type="module" name="breadcrumbs" />
        </div><!-- end breadcrumbs -->
<!--                    <?php if ($this->params->get('styleSwitch') == 1): ?>
                    <div id="colorchooser"><ul id="access">
			
            <li class="green"><a href="#" onclick="styleswitch('set', 'green'); return false;"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/greencolor.gif" alt="green layout" /></a></li>
            <li class="blue"><a href="#" onclick="styleswitch('set', 'blue'); return false;"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/bluecolor.gif" alt="blue layout" /></a></li>
			</ul></div>
			<?php endif; ?> -->
       </div>
 
        <div id="BodyContent" class="clr clearfix">
			<div id="LoadFirst" class="clearfix">
				
				<div id="MiddleCol">
					<div class="inside">
						<?php if ($this->countModules('user1 or user2')) : ?>
            			<div id="top-user-modules" class="clearfix">
            		
            				<?php if ($this->countModules('user1')) : ?>
            				<div id="user1" class="count<?php echo $top_total ;?>">
								<div class="inside">
                					<jdoc:include type="modules" name="user1" style="xhtml" />
            					</div><!-- end inside -->
            				</div><!-- end user1 -->
            				<?php endif; ?>
            		
            				<?php if ($this->countModules('user2')) : ?>
            				<div id="user2" class="count<?php echo $top_total ;?>">
								<div class="inside">
                					<jdoc:include type="modules" name="user2" style="xhtml" />
            					</div><!-- end inside -->
            				</div><!-- end user2 -->
            				<?php endif; ?>
            		
            			</div><!-- end top-user-modules -->
            			<?php endif; ?>
            	
						<a id="content" name="content"></a>
            			<div id="mainbody">
            				<?php if ($this->getBuffer('message')) : ?>
							<div class="error">
								<h2> Message </h2>
									<jdoc:include type="message" />
							</div>
							<?php endif; ?>
                			<jdoc:include type="component" />
            			</div><!-- end mainbody -->
            	
            			<?php if ($this->countModules('user6 or user7')) : ?>
						
            			<div id="bottom-user-modules" class="clearfix">
            		
            				<?php if ($this->countModules('user6')) : ?>
            				<div id="user6" class="count<?php echo $bottom_total ;?>">
								<div class="inside">
                					<jdoc:include type="modules" name="user6" style="xhtml" />
            					</div><!-- end inside -->
            				</div><!-- end user6 -->
            				<?php endif; ?>
            		
            				<?php if ($this->countModules('user7')) : ?>
            				<div id="user7" class="count<?php echo $bottom_total ;?>">
								<div class="inside">
                					<jdoc:include type="modules" name="user7" style="xhtml" />
            					</div><!-- end inside -->
            				</div><!-- end user7 -->
            				<?php endif; ?>
            		
            		
   			      </div><!-- end bottom-user-modules -->
            			<?php endif; ?>
            		</div><!-- end inside -->
				</div><!-- end MiddleCol -->
	
				<?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
				<div id="left">
					<div class="inside">
					
							<jdoc:include type="modules" name="left" style="xhtml" />
            	
           		  </div><!-- end inside -->
				</div><!-- end leftCol -->
            	<?php endif; ?>
				
			</div><!-- end LoadFirst -->
					
			<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
			<div id="right">
				<div class="inside">
					<jdoc:include type="modules" name="right" style="xhtml" />
            	</div><!-- end inside -->
			</div><!-- end RightCol -->
            <?php endif; ?> 
 <?php include("includes/cp.php"); ?> 
</div><!-- end BodyContent -->
        
        <div id="footermax">
        <div id="footer" class="clearfix">
<!--        	<?php if ($this->countModules('footer')) : ?>
			<div class="inside">
            	<jdoc:include type="modules" name="footer" style="xhtml" />
            </div><!-- end inside -->
            <?php endif; ?>    -->
            
<!-- Back to top link -->
		<div id="backtotoplink">
			<a href="<?php $url->setFragment('top'); echo $url->toString();?>" class="to-additional"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/up.gif" alt="go to top" /></a>
		</div>
        </div><!-- end footer -->

		
        </div>
</div><!-- end page -->

    
    <!-- 	It is not allowed to remove or modify the copyright link!
    		Het is niet toegestaan om onderstaand copyright te verwijderen of aan te passen!  -->
    
    <div id="jtpcopyright">Design by: <a href="http://www.joomlathemepro.com" title="JoomlaTheme Pro - Professional Joomla Templates" target="_blank">JoomlaTheme Pro</a></div>
    
<?php if ($this->countModules('debug')) : ?>
    <div id="debug"><jdoc:include type="modules" name="debug" /></div>
    <?php endif; ?>
    
</body>
</html>
