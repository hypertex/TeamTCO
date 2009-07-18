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
	<div class="sectionlist">

		<?php if ($this->params->get('show_page_title', 1)) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>
		
		<?php if (($this->params->get('show_description_image') && $this->section->image) || ($this->params->get('show_description') && $this->section->description)) : ?>
		<div class="description">
			<?php if ($this->params->get('show_description_image') && $this->section->image) : ?>
				<img class="<?php echo $this->section->image_position;?>" src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->section->image;?>" alt="" />
			<?php endif; ?>
			<?php if ($this->params->get('show_description') && $this->section->description) : ?>
				<?php echo $this->section->description; ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ($this->params->get('show_categories', 1)) : ?>
		<ul>
			<?php foreach ($this->categories as $category) : ?>
			<?php if (!$this->params->get('show_empty_categories') && !$category->numitems) continue; ?>
			<li>
				<a href="<?php echo $category->link; ?>" class="category"><?php echo $category->title;?></a>
				<?php if ($this->params->get('show_cat_num_articles')) : ?>
				&nbsp;
				<span class="number">
					( <?php if ($category->numitems==1) {
					echo $category->numitems ." ". JText::_( 'item' );}
					else {
					echo $category->numitems ." ". JText::_( 'items' );} ?> )
				</span>
				<?php endif; ?>
				<?php if ($this->params->def('show_category_description', 1) && $category->description) : ?>
				<br />
				<?php echo $category->description; ?>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>

	</div>
</div>