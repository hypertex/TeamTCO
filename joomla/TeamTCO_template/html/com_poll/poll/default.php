<?php
/**
* @package   Template Overrides YOOtheme
* @version   1.5.0 2009-01-21 17:54:02
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<?php JHTML::_('stylesheet', 'poll_bars.css', 'components/com_poll/assets/'); ?>

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="poll">

		<?php if ($this->params->get('show_page_title', 1)) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<form action="index.php" method="post" name="poll" id="poll">
		
		<div>
			<label class="label-left" for="id">
				<?php echo JText::_('Select Poll'); ?>
			</label>
			<?php echo $this->lists['polls']; ?>
		</div>
		
		<div>
			<?php echo $this->loadTemplate('graph'); ?>
		</div>
		
		</form>
		
	</div>
</div>