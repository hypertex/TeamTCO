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

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="article">
	
		<?php if ($this->params->get('show_page_title', 1) && $this->params->get('page_title') != $this->article->title) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>
		
		<?php if ($canEdit || $this->params->get('show_title') || $this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) : ?>
		<div class="headline">
		
			<?php if ($this->params->get('show_title')) : ?>
			<h1 class="title">
				<?php if ($this->params->get('link_titles') && $this->article->readmore_link != '') : ?>
					<a href="<?php echo $this->article->readmore_link; ?>"><?php echo $this->escape($this->article->title); ?></a>
				<?php else : ?>
					<?php echo $this->escape($this->article->title); ?>
				<?php endif; ?>
			</h1>
			<?php endif; ?>
			
			<?php if (!$this->print) : ?>
			
				<?php if ($canEdit) : ?>
				<span class="icon edit">
					<?php echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
				</span>
				<?php endif; ?>
			
				<?php if ($this->params->get('show_email_icon')) : ?>
				<span class="icon email">
					<?php echo JHTML::_('icon.email',  $this->article, $this->params, $this->access); ?>
				</span>
				<?php endif; ?>
			
				<?php if ( $this->params->get( 'show_print_icon' )) : ?>
				<span class="icon print">
					<?php echo JHTML::_('icon.print_popup',  $this->article, $this->params, $this->access); ?>
				</span>
				<?php endif; ?>
			
				<?php if ($this->params->get('show_pdf_icon')) : ?>
				<span class="icon pdf">
					<?php echo JHTML::_('icon.pdf',  $this->article, $this->params, $this->access); ?>
				</span>
				<?php endif; ?>
	
			<?php else : ?>
			
				<span class="icon printscreen">
					<?php echo JHTML::_('icon.print_screen',  $this->article, $this->params, $this->access); ?>
				</span>
				
			<?php endif; ?>
			
		</div>
		<?php endif; ?>
	
		<?php  if (!$this->params->get('show_intro')) :
			echo $this->article->event->afterDisplayTitle;
		endif; ?>
		
		<?php echo $this->article->event->beforeDisplayContent; ?>
	
		<?php if (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid)) : ?>
		<p class="iteminfo">
			<?php if ($this->params->get('show_section') && $this->article->sectionid && isset($this->article->section)) : ?>
			<span>
				<?php if ($this->params->get('link_section')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->article->section; ?>
				<?php if ($this->params->get('link_section')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_category')) : ?>
					<?php echo ' - '; ?>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<?php if ($this->params->get('show_category') && $this->article->catid) : ?>
			<span>
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->article->category; ?>
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
			</span>
			<?php endif; ?>
		</p>
		<?php endif; ?>
	
		<?php if ($this->params->get('show_create_date') ||
		(intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) ||
		($this->params->get('show_author') && ($this->article->author != "")) ||
		($this->params->get('show_url') && $this->article->urls)) : ?>
		<p class="articleinfo">
		
			<?php if ($this->params->get('show_create_date')) : ?>
			<span class="created">
				<?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC2')) ?>
			</span>
			<?php endif; ?>
		
			<?php if (intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
			<span class="modified">
				<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2'))); ?>
			</span>
			<?php endif; ?>
		
			<?php if ($this->params->get('show_author') && ($this->article->author != "")) : ?>
			<span class="author">
				<?php JText::printf( 'Written by', ($this->article->created_by_alias ? $this->article->created_by_alias : $this->article->author) ); ?>
			</span>
			<?php endif; ?>
			
			<?php if ($this->params->get('show_url') && $this->article->urls) : ?>
			<span class="url">
				<a href="http://<?php echo $this->article->urls ; ?>" target="_blank"><?php echo $this->article->urls; ?></a>
			</span>
			<?php endif; ?>
		
		</p>
		<?php endif; ?>
		
		<?php if (isset ($this->article->toc)) : ?>
			<?php echo $this->article->toc; ?>
		<?php endif; ?>
		
		<?php echo $this->article->text; ?>
		
		<?php echo $this->article->event->afterDisplayContent; ?>

	</div>
	
</div>