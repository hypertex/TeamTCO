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

<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="user">
	
		<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<form action="index.php" method="post" name="userform" autocomplete="off" class="form-validate">
		<fieldset>
			<legend><?php echo JText::_('EDIT YOUR DETAILS'); ?></legend>

			<div>
				<span class="label-left">
					<?php echo JText::_( 'User Name' ); ?>:
				</span>
				<?php echo $this->user->get('username');?>
			</div>
			<div>
				<label class="label-left" for="name">
					<?php echo JText::_( 'Your Name' ); ?>:
				</label>
				<input class="inputbox required" type="text" id="name" name="name" value="<?php echo $this->user->get('name');?>" />
			</div>
			<div>
				<label class="label-left" for="email">
					<?php echo JText::_( 'email' ); ?>:
				</label>
				<input class="inputbox required validate-email" type="text" id="email" name="email" value="<?php echo $this->user->get('email');?>" />
			</div>
			
			<?php if($this->user->get('password')) : ?>
			<div>
				<label class="label-left" for="password">
					<?php echo JText::_( 'Password' ); ?>:
				</label>
				<input class="inputbox validate-password" type="password" id="password" name="password" value="" />
			</div>
			<div>
				<label class="label-left" for="password2">
					<?php echo JText::_( 'Verify Password' ); ?>:
				</label>
				<input class="inputbox validate-passverify" type="password" id="password2" name="password2" />
			</div>
			<?php endif; ?>

			<?php if(isset($this->params)) :  echo $this->params->render( 'params' ); endif; ?>
			
			<div>
				<button type="submit" onclick="submitbutton( this.form );return false;"><?php echo JText::_('Save'); ?></button>
			</div>
			
		</fieldset>
		<input type="hidden" name="username" value="<?php echo $this->user->get('username');?>" />
		<input type="hidden" name="id" value="<?php echo $this->user->get('id');?>" />
		<input type="hidden" name="gid" value="<?php echo $this->user->get('gid');?>" />
		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="save" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>

	</div>
</div>