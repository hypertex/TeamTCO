<?php
/**
* @package   Template Overrides YOOtheme
* @version   1.5.0 2009-01-21 17:54:02
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

defined('_JEXEC') or die('Restricted access');

if (count($list) == 1) {
	$item = $list[0];
	modNewsFlashHelper::renderItem($item, $params, $access);
} elseif (count($list) > 1) { ?>
	<ul class="vert <?php echo $params->get('moduleclass_sfx'); ?>">
		<?php foreach ($list as $item) : ?>
		<li>
			<?php modNewsFlashHelper::renderItem($item, $params, $access); ?>
		</li>
		<?php endforeach; ?>
	</ul> <?php 
} ?>
