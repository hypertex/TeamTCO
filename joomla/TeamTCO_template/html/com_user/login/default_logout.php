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

<?php /** @todo Should this be routed */ ?>

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="user">
	
		<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<?php if ( $this->params->get( 'show_logout_title' ) ) : ?>
		<h1>
			<?php echo $this->params->get( 'header_logout' ); ?>
		</h1>
		<?php endif; ?>

		<?php if ($this->params->get('description_logout') || $this->image) : ?>
		<div class="description">
			<?php echo $this->image; ?>
			<?php if ($this->params->get('description_logout')) : ?>
				<?php echo $this->params->get('description_logout_text'); ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<form action="index.php" method="post" name="login" id="login">
		<fieldset>
			<legend><?php echo JText::_( 'Logout' ) ?></legend>
			<div>
				<input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'Logout' ); ?>" />
			</div>
		</fieldset>

		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="logout" />
		<input type="hidden" name="return" value="<?php echo $this->return; ?>" />
		</form>
		
	</div>
</div>