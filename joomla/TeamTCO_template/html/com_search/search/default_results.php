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

<ol start="<?php echo $this->pagination->limitstart + 1; ?>">
<?php foreach( $this->results as $result ) : ?>
	<li>
		<?php if ( $result->href ) : ?>
			<a href="<?php echo JRoute::_($result->href); ?>" <?php if ($result->browsernav == 1 ) echo 'target="_blank"'; ?>><?php  echo $this->escape($result->title); ?></a>
		<?php endif; ?>
		
		<?php if ( $result->section ) : ?>
			<p class="info">
				(<?php echo $this->escape($result->section); ?>)
			</p>
		<?php endif; ?>
		
		<p>
			<?php echo $result->text; ?>
		</p>
		
		<?php if ( $this->params->get( 'show_date' )) : ?>
		<p>
			<?php echo $result->created; ?>
		</p>
		<?php endif; ?>
	
	</li>
<?php endforeach; ?>
</ol>

<div class="pagination">
	<p class="results">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
	<?php echo $this->pagination->getPagesLinks( ); ?>
</div>