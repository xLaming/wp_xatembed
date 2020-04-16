<?php
/**
 * Plugin Name: xat chat plugin
 * Plugin URI: http://xat.com
 * Description: This plugin is used to add a xat group to your Wordpress blog.
 * Version: 1.0
 * Author: xLaming
 * Author URI: https://xat.me/PAULO
 */
 
function xatchat_plugin($atts, $content) {
	$xatEmbed = ''; // emptie buddy
	
	if (!array_key_exists('name', $atts) || !array_key_exists('id', $atts)) {
		$xatEmbed = 'Missing chat name/ID.';
	}

	$id = intval($atts['id']);
	$name = $atts['name'];
	$type = array_key_exists('type', $atts) ? strtolower($atts['type']) : 'html5';
	$width = array_key_exists('width', $atts) ? intval($atts['width']) : 540;
	$height = array_key_exists('height', $atts) ? intval($atts['height']) : 405;
	
	if ($type == 'html5') {
		$xatEmbed = sprintf('<iframe src="https://xat.com/embed/chat.php#id=%s&gn=%s" width="%s" height="%s" frameborder="0" scrolling="no"></iframe>', $id, $name, $width, $height);
	} else if ($type == 'flash') {
		$xatEmbed = sprintf('<embed src="https://www.xatech.com/web_gear/chat/chat.swf" quality="high" width="%s" height="%s" FlashVars="id=%s&gn=%s" />', $width, $height, $id, $name);
	}
	
	return ($content . $xatEmbed);
}

/*
 * [xatembed name="xat_test2" id="2" type="FLASH/HTML5" width="468" height="500"]
 */
add_shortcode('xatembed', 'xatchat_plugin');
