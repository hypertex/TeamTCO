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
$cparams =& JComponentHelper::getParams('com_media');
?>

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	<div class="contact">

		<?php if ($this->params->get('show_page_title', 1)) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<?php if ($this->category->image || $this->category->description) : ?>
		<div class="description">
			<?php if ($this->params->get('image') != -1 && $this->params->get('image') != '') : ?>
				<img class="<?php echo $this->params->get('image_align'); ?>" src="<?php echo $this->baseurl .'/'. 'images/stories' . '/'. $this->params->get('image'); ?>"  alt="<?php echo JText::_( 'Contacts' ); ?>" />
			<?php elseif ($this->category->image) : ?>
				<img class="<?php echo $this->category->image_position; ?>" src="<?php echo $this->baseurl .'/'. 'images/stories' . '/'. $this->category->image; ?>" alt="<?php echo JText::_( 'Contacts' ); ?>" />
			<?php endif; ?>
			<?php if ($this->category->description) : ?>
				<?php echo $this->category->description; ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<script language="javascript" type="text/javascript">
			function tableOrdering( order, dir, task ) {
			var form = document.adminForm;
		
			form.filter_order.value 	= order;
			form.filter_order_Dir.value	= dir;
			document.adminForm.submit( task );
		}
		</script>
		
<form action="<?php echo $this->action; ?>" method="post" name="adminForm">




<?php if ($this->params->get('show_limit')) : ?>
<div class="filter">
	<?php echo JText::_('Display Num') .'&nbsp;'; ?>
	<?php echo $this->pagination->getLimitBox(); ?>
</div>
<?php endif; ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

	<?php if ($this->params->get( 'show_headings' )) : ?>
		<tr>
			<th width="5" align="right">
				<?php echo JText::_('Num'); ?>
			</th>
			<th align="left">
				<?php echo JHTML::_('grid.sort',  'Name', 'cd.name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php if ( $this->params->get( 'show_position' ) ) : ?>
			<th align="left">
				<?php echo JHTML::_('grid.sort',  'Position', 'cd.con_position', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<?php endif; ?>
			<?php if ( $this->params->get( 'show_email' ) ) : ?>
			<th width="20%" align="left">
				<?php echo JText::_( 'Email' ); ?>
			</th>
			<?php endif; ?>
			<?php if ( $this->params->get( 'show_telephone' ) ) : ?>
			<th width="15%" align="left">
				<?php echo JText::_( 'Phone' ); ?>
			</th>
			<?php endif; ?>
			<?php if ( $this->params->get( 'show_mobile' ) ) : ?>
			<th width="15%" align="left">
				<?php echo JText::_( 'Mobile' ); ?>
			</th>
			<?php endif; ?>
			<?php if ( $this->params->get( 'show_fax' ) ) : ?>
			<th width="15%" align="left">
				<?php echo JText::_( 'Fax' ); ?>
			</th>
			<?php endif; ?>
		</tr>
	<?php endif; ?>
	
	<?php echo $this->loadTemplate('items'); ?>
</table>

<div class="pagination">
	<p class="results">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>

<input type="hidden" name="option" value="com_contact" />
<input type="hidden" name="catid" value="<?php echo $this->category->id;?>" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>

	</div>
</div>
