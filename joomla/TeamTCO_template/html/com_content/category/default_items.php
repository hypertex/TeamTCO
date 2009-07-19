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

<script language="javascript" type="text/javascript">
<!--
function tableOrdering( order, dir, task ) {
	var form = document.adminForm;

	form.filter_order.value 	= order;
	form.filter_order_Dir.value	= dir;
	document.adminForm.submit( task );
}
// -->
</script>

<form action="<?php echo $this->action; ?>" method="post" name="adminForm">

<?php if ($this->params->get('filter') || $this->params->get('show_pagination_limit')) : ?>
<div class="filter">

	<?php if ($this->params->get('filter')) : ?>
		<?php echo JText::_($this->params->get('filter_type') . ' Filter'); ?>
		&nbsp;<input type="text" name="filter" value="<?php echo $this->lists['filter'];?>" onchange="document.adminForm.submit();" />
	<?php endif; ?>
	
	<?php if ($this->params->get('show_pagination_limit')) : ?>
		&nbsp;&nbsp;&nbsp;<?php	echo JText::_('Display Num'); ?>
		&nbsp;<?php echo $this->pagination->getLimitBox(); ?>
	<?php endif; ?>
	
</div>
<?php endif; ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

	<?php if ($this->params->get('show_headings')) : ?>
	<tr>
		<th align="right" width="5%">
			<?php echo JText::_('Num'); ?>
		</th>
		<?php if ($this->params->get('show_title')) : ?>
		<th align="left" width="45%">
			<?php echo JHTML::_('grid.sort',  'Item Title', 'a.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<?php endif; ?>
		<?php if ($this->params->get('show_date')) : ?>
		<th align="left" width="25%">
			<?php echo JHTML::_('grid.sort',  'Date', 'a.created', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<?php endif; ?>
		<?php if ($this->params->get('show_author')) : ?>
		<th align="left" width="20%">
			<?php echo JHTML::_('grid.sort',  'Author', 'author', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<?php endif; ?>
		<?php if ($this->params->get('show_hits')) : ?>
		<th align="center" width="5%" nowrap="nowrap">
			<?php echo JHTML::_('grid.sort',  'Hits', 'a.hits', $this->lists['order_Dir'], $this->lists['order'] ); ?>
		</th>
		<?php endif; ?>
	</tr>
	<?php endif; ?>
	
	<?php foreach ($this->items as $item) : ?>
	<tr class="<?php if ($item->odd) { echo 'even'; } else { echo 'odd'; } ?>">
		<td align="right">
			<?php echo $this->pagination->getRowOffset( $item->count ); ?>
		</td>
		<?php if ($this->params->get('show_title')) : ?>
			<?php if ($item->access <= $this->user->get('aid', 0)) : ?>
			<td>
				<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
				<?php $this->item = $item; echo JHTML::_('icon.edit', $item, $this->params, $this->access) ?>
			</td>
			<?php else : ?>
			<td>
				<?php
					echo $this->escape($item->title).' : ';
					$link = JRoute::_('index.php?option=com_user&view=login');
					$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug, $item->sectionid));
					$fullURL = new JURI($link);
					$fullURL->setVar('return', base64_encode($returnURL));
					$link = $fullURL->toString();
				?>
				<a href="<?php echo $link; ?>"><?php echo JText::_( 'Register to read more...' ); ?></a>
			</td>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ($this->params->get('show_date')) : ?>
		<td>
			<?php echo $item->created; ?>
		</td>
		<?php endif; ?>
		<?php if ($this->params->get('show_author')) : ?>
		<td >
			<?php echo $item->created_by_alias ? $item->created_by_alias : $item->author; ?>
		</td>
		<?php endif; ?>
		<?php if ($this->params->get('show_hits')) : ?>
		<td align="center">
			<?php echo $item->hits ? $item->hits : '-'; ?>
		</td>
		<?php endif; ?>
	</tr>
	<?php endforeach; ?>
	
</table>

<?php if ($this->params->get('show_pagination')) : ?>
<div class="pagination">
	<p class="results">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>
<?php endif; ?>

<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="sectionid" value="<?php echo $this->category->sectionid; ?>" />
<input type="hidden" name="task" value="<?php echo $this->lists['task']; ?>" />
<input type="hidden" name="filter_order" value="" />
<input type="hidden" name="filter_order_Dir" value="" />
<input type="hidden" name="limitstart" value="0" />
</form>
