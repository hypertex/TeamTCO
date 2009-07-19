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

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="user">

		<h1 class="pagetitle">
			<?php echo JText::_('Confirm your Account'); ?>
		</h1>

		<p>
			<?php echo JText::_('RESET_PASSWORD_CONFIRM_DESCRIPTION'); ?>
		</p>

		<form action="index.php?option=com_user&amp;task=confirmreset" method="post" class="josForm form-validate">
		<fieldset>
			<legend><?php echo JText::_('Confirm your Account'); ?></legend>
			
			<div>
				<label for="token" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_TOKEN_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_TOKEN_TIP_TEXT'); ?>"><?php echo JText::_('Token'); ?>:</label>
				<input id="token" name="token" type="text" class="required" size="36" />
			</div>
			<div>
				<button type="submit"><?php echo JText::_('Submit'); ?></button>
			</div>
			
		</fieldset>
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>
	
	</div>
</div>