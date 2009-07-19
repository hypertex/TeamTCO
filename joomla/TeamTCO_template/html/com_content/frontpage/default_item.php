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

$canEdit	= ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own'));
?>

<div class="item <?php if ($this->item->state == 0) echo 'unpublished' ?>">
	<div class="item-bg">
	
		<?php if ($canEdit || $this->item->params->get('show_title') || $this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) : ?>
		<div class="headline">
		
			<?php if ($this->item->params->get('show_title')) : ?>
			<h1 class="title">
				<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
					<a href="<?php echo $this->item->readmore_link; ?>"><?php echo $this->item->title; ?></a>
				<?php else : ?>
					<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			</h1>
			<?php endif; ?>
		
			<?php if ($canEdit) : ?>
			<span class="icon edit">
				<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
			</span>
			<?php endif; ?>
		
			<?php if ($this->item->params->get('show_email_icon')) : ?>
			<span class="icon email">
				<?php echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access); ?>
			</span>
			<?php endif; ?>
		
			<?php if ( $this->item->params->get( 'show_print_icon' )) : ?>
			<span class="icon print">
				<?php echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access); ?>
			</span>
			<?php endif; ?>
		
			<?php if ($this->item->params->get('show_pdf_icon')) : ?>
			<span class="icon pdf">
				<?php echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access); ?>
			</span>
			<?php endif; ?>
			
		</div>
		<?php endif; ?>
	
		<?php  if (!$this->item->params->get('show_intro')) :
			echo $this->item->event->afterDisplayTitle;
		endif; ?>
		
		<?php echo $this->item->event->beforeDisplayContent; ?>
	
		<?php if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>
		<p class="iteminfo">
			<?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
			<span>
				<?php if ($this->item->params->get('link_section')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->item->section; ?>
				<?php if ($this->item->params->get('link_section')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
					<?php if ($this->item->params->get('show_category')) : ?>
					<?php echo ' - '; ?>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
			<span>
				<?php if ($this->item->params->get('link_category')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->item->category; ?>
				<?php if ($this->item->params->get('link_category')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
			</span>
			<?php endif; ?>
		</p>
		<?php endif; ?>
	
		<p class="articleinfo">
	
			<?php if ($this->item->params->get('show_create_date')) : ?>
			<span class="created">
				<?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')); ?>
			</span>
			<?php endif; ?>
	
			<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>
			<span class="modified">
				<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
			</span>
			<?php endif; ?>
		
			<?php if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
			<span class="author">
				<?php JText::printf( 'Written by', ($this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author) ); ?>
			</span>
			<?php endif; ?>
	
			<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
			<span class="url">
				<a href="http://<?php echo $this->item->urls ; ?>" target="_blank"><?php echo $this->item->urls; ?></a>
			</span>
			<?php endif; ?>
	
		</p>
	
		<?php if (isset ($this->item->toc)) : ?>
			<?php echo $this->item->toc; ?>
		<?php endif; ?>
		
		<?php echo $this->item->text; ?>
	
		<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
		<p class="readmore">
			<a href="<?php echo $this->item->readmore_link; ?>" class="readmore">
				<?php if ($this->item->readmore_register) :
					echo JText::_('Register to read more...');
				elseif ($readmore = $this->item->params->get('readmore')) :
					echo $readmore;
				else :
					echo JText::sprintf('Read more...');
				endif; ?></a>
		</p>
		<?php endif; ?>
	
		<?php echo $this->item->event->afterDisplayContent; ?>

	</div>
</div>