<?php
/**
 * @version		$Id: template_config.php WaseemSadiq $
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

/* check if left or right modules are published */
// Set $right to "0"

	$right = "0";
	
// if $this->countModules function returns a number we set $right to "1"

	if ($this->countModules('right') and JRequest::getCmd('layout') != 'form') $right = "1";
	
// Set $left to "0" 
	$left = "0";

// if $this->countModules function returns a number we set $left to "1"

	if ($this->countModules('left') and JRequest::getCmd('layout') != 'form') $left = "1";

/* Set style type based on column layout */
/* if there ARE modules published in the left module position AND there are NO modules published in the right module position
	then we want to return "-left-only" as our $style
*/
if (($left == "1") && ($right == "0")) $style = "left-only";

/* if there are NO modules published in the left module position AND there ARE modules published in the right module position
	then we want to return "-right-only" as our $style
*/
if (($left == "0") && ($right == "1")) $style = "right-only";

/* if there are NO modules published in the left module position AND there are NO modules published in the right module position
	then we want to return "-wide" as our $style
*/
if (($left == "0") && ($right == "0")) $style = "wide";

/* if there ARE modules published in the left module position AND there ARE modules published in the right module position
	then we want to return "-both" as our $style
*/
if (($left == "1") && ($right == "1")) $style = "both";

#--------------------------------------------------------------------------#
	
/* 
	Count the number of top teaser modules
	edit these lines to indicate which modules are in the top teaser block 
*/
$firsttopmodule = $this->countModules('user1');
$secondtopmodule = $this->countModules('user2');


#--------------------------------------------------------------------------#

$topmodule1 = ($firsttopmodule ? 1 : 0);
$topmodule2 = ($secondtopmodule ? 1 : 0);

$top_total = ($topmodule1 + $topmodule2);

// If we needed the width of each div rather than a number then we get that width like this: $width = (100 / $top_total).'%';
#--------------------------------------------------------------------------#

/* 
	Count the number of bottom teaser modules
	edit these lines to indicate which modules are in the bottom teaser block
*/
$firstbottommodule = $this->countModules('user6');
$secondbottommodule = $this->countModules('user7');

#--------------------------------------------------------------------------#

$bottommodule1 = ($firstbottommodule ? 1 : 0);
$bottommodule2 = ($secondbottommodule ? 1 : 0);


$bottom_total = ($bottommodule1 + $bottommodule2);

// If we needed the width of each div rather than a number then we get that width like this: $width = (100 / $bottom_total).'%';
#--------------------------------------------------------------------------#	

?>
