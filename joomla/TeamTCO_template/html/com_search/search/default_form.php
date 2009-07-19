<?php
/**
* @package   Template Overrides YOOtheme
* @version   1.5.0 2009-01-21 17:54:02
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<form id="searchForm" action="<?php echo JRoute::_( 'index.php?option=com_search' );?>" method="post" name="searchForm">
<fieldset>
	<legend><?php echo JText::_('Search Parameters') ?></legend>

	<div>
		<label for="search_searchword">
			<?php echo JText::_( 'Search Keyword' ); ?>:
		</label>
		<input type="text" name="searchword" id="search_searchword" size="30" maxlength="20" value="<?php echo $this->escape($this->searchword); ?>" class="inputbox" />
		<button name="Search" onclick="this.form.submit()" class="button"><?php echo JText::_( 'Search' );?></button>
	</div>
	
	<div>
		<?php echo $this->lists['searchphrase']; ?>
	</div>
	
	<div>
		<label for="ordering">
			<?php echo JText::_( 'Ordering' );?>:
		</label>
		<?php echo $this->lists['ordering'];?>
	</div>
	
	<?php if ($this->params->get( 'search_areas', 1 )) : ?>
	<div>
		<?php echo JText::_( 'Search Only' );?>:
		<?php foreach ($this->searchareas['search'] as $val => $txt) : ?>
			<?php  $checked = is_array( $this->searchareas['active'] ) && in_array( $val, $this->searchareas['active'] ) ? 'checked="checked"' : ''; ?>
			<input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area_<?php echo $val;?>" <?php echo $checked;?> />
			<label for="area_<?php echo $val;?>">
				<?php echo JText::_($txt); ?>
			</label>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>

</fieldset>

<p>
	<?php echo $this->result; ?>
</p>

<?php if($this->total > 0) : ?>
<p>
	<label for="limit">
		<?php echo JText::_( 'Display Num' ); ?>
	</label>
	<?php echo $this->pagination->getLimitBox( ); ?>
</p>
<?php endif; ?>

<input type="hidden" name="task"   value="search" />
</form>
