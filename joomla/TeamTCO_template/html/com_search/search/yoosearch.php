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

class YOOsearchHelper {

	function getCategories($params) {
	 	// expression to search for
		$regex = "#{cat\s*(.*?)}(.*?){/cat}#s";

		// parse categories
		preg_match_all($regex, $params, $matches);
	 	$count = count($matches[0]);
	 	if ($count) {
	 		return YOOsearchHelper::parseCategories($matches, $count);
		}
	}
	
	function parseCategories(&$matches, $count) {
		$categories = array();

		for ($i = 0; $i < $count; $i++) {
			$cat             = array();
			$param_line      = $matches[1][$i];
			$cat['title']    = YOOsearchHelper::getParam($param_line, 'title', 'Unknown title');
			$cat['text']     = YOOsearchHelper::stripText($matches[2][$i]);
			$cat['url']      = JRoute::_(YOOsearchHelper::getParam($param_line, 'url', '#'), false);
			$cat['image']    = YOOsearchHelper::getParam($param_line, 'image', '');
			$cat['keywords'] = YOOsearchHelper::getParam($param_line, 'keywords', '');
			if ($cat['image'] != '') $cat['image'] = JURI::base() . 'images/' . $cat['image'];
			$categories[]    = $cat;
	 	}
	
		return $categories;
	}

	function getParam($param_line, $attribute, $default = null) {
	    $matches = array();
	    preg_match_all('/(\w+)(\s*=\s*\[.*?\])/s', $param_line, $matches);

	    for ($i = 0; $i < count($matches[1]); $i++) {
			if (strtolower($matches[1][$i]) == strtolower($attribute)) {
	        	$result = ltrim($matches[2][$i], " \n\r\t=");
				$result = trim($result, '[]');        
	        	return $result;
	      	}
	    }

	    return $default;
	}

	function stripText($text) {
		$text = str_replace(array("\r\n", "\n", "\r", "\t"), "", $text);
		$text = html_entity_decode($text, ENT_COMPAT, 'UTF-8');
		$text =	JFilterOutput::cleanText($text);
		$text = trim($text);
		return $text;
	}	
	
	function encodeJson($a = false) {
		if (is_null($a)) return 'null';
		if ($a === false) return 'false';
		if ($a === true) return 'true';
		if (is_scalar($a)) {
			if (is_float($a)) {
				$a = str_replace(",", ".", strval($a));
			}
			static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
			return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
		}
		$isList = true;
		for ($i = 0, reset($a); $i < count($a); $i++, next($a)) {
			if (key($a) !== $i) {
				$isList = false;
				break;
			}
		}
		$result = array();
		if ($isList) {
			foreach ($a as $v) $result[] = YOOsearchHelper::encodeJson($v);
			return '[ ' . join(', ', $result) . ' ]';
		} else {
			foreach ($a as $k => $v) $result[] = YOOsearchHelper::encodeJson($k) . ': '. YOOsearchHelper::encodeJson($v);
			return '{ ' . join(', ', $result) . ' }';
		}
	}
	
}