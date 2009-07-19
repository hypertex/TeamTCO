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

<?php if(JPluginHelper::isEnabled('authentication', 'openid')) :
		$lang = &JFactory::getLanguage();
		$lang->load( 'plg_authentication_openid', JPATH_ADMINISTRATOR );
		$langScript = 	'var JLanguage = {};'.
						' JLanguage.WHAT_IS_OPENID = \''.JText::_( 'WHAT_IS_OPENID' ).'\';'.
						' JLanguage.LOGIN_WITH_OPENID = \''.JText::_( 'LOGIN_WITH_OPENID' ).'\';'.
						' JLanguage.NORMAL_LOGIN = \''.JText::_( 'NORMAL_LOGIN' ).'\';'.
						' var comlogin = 1;';
		$document = &JFactory::getDocument();
		$document->addScriptDeclaration( $langScript );
		JHTML::_('script', 'openid.js');
endif; ?>

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="user">
	
		<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<?php if ( $this->params->get( 'show_login_title' ) ) : ?>
		<h1>
			<?php echo $this->params->get( 'header_login' ); ?>
		</h1>
		<?php endif; ?>

		<?php if ($this->params->get('description_login') || $this->image) : ?>
		<div class="description">
			<?php echo $this->image; ?>
			<?php if ( $this->params->get( 'description_login' ) ) : ?>
				<?php echo $this->params->get( 'description_login_text' ); ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		
		<form action="<?php echo JRoute::_( 'index.php', true, $this->params->get('usesecure')); ?>" method="post" name="com-login" id="com-form-login">
		<fieldset>
			<legend><?php echo JText::_('LOGIN') ?></legend>
			
			<div>
				<label class="label-left" for="username"><?php echo JText::_('Username') ?></label>
				<input name="username" id="username" type="text" class="inputbox" alt="username" size="18" />
			</div>
			<div>
				<label class="label-left" for="passwd"><?php echo JText::_('Password') ?></label>
				<input type="password" id="passwd" name="passwd" class="inputbox" size="18" alt="password" />
			</div>
			<?php if(JPluginHelper::isEnabled('system', 'remember')) : ?>
			<div>
				<label for="remember"><?php echo JText::_('Remember me') ?></label>
				<input type="checkbox" id="remember" name="remember" class="inputbox" value="yes" alt="Remember Me" />
			</div>
			<?php endif; ?>
			<div>
				<input type="submit" name="Submit" class="button" value="<?php echo JText::_('LOGIN') ?>" />
			</div>
			
		</fieldset>
	
		<ul>
			<li>
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' ); ?>"><?php echo JText::_('FORGOT_YOUR_PASSWORD'); ?></a>
			</li>
			<li>
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind' ); ?>"><?php echo JText::_('FORGOT_YOUR_USERNAME'); ?></a>
			</li>
			<?php $usersConfig = &JComponentHelper::getParams( 'com_users' ); ?>
			<?php if ($usersConfig->get('allowUserRegistration')) : ?>
			<li>
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&task=register' ); ?>"><?php echo JText::_('REGISTER'); ?></a>
			</li>
			<?php endif; ?>
		</ul>

		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="login" />
		<input type="hidden" name="return" value="<?php echo $this->return; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>

	</div>
</div>