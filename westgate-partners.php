<?php
/*
Plugin Name: Westgate Partners
Plugin URI: 
Description: Allows easy integration of Westgate Partners and your WordPress website.
Version: 0.3
Author: Mike McLin
Author URI: http://westgatespace.com
*/

/*  Copyright 2010 Westgate Rewards (twitter : http://twitter.com/westgaterewards)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/




$wgp_plugin_url = trailingslashit( WP_PLUGIN_URL.'/'.str_replace(basename(__FILE__),"",plugin_basename(__FILE__)) );




// Banner Shortcode
function wgp_banner_shortcode($atts) {
	
	extract(shortcode_atts(array(
		'config' => 'lid=141&mktsrc=9999999'
	), $atts));
	
	$wgp_html = '<div><a href="http://partners.westgatespace.com/go/?'.$config.'" target="_blank"><img src="http://partners.westgatespace.com/image/?'.$config.'" /></a></div>';
	
	return $wgp_html;
}
add_shortcode('wgp_banner', 'wgp_banner_shortcode');




// Widget Shortcode
function wgp_widget_shortcode($atts) {
	
	extract(shortcode_atts(array(
		'config' => 'lid=148&size=l&a=1&c=black&d=o,lv,g,w,mb,b&mktsrc=9999999'
	), $atts));
	
	$mktsrc = explode('mktsrc=', $config);
	$mktsrc = explode('&',$mktsrc[1]);
	$mktsrc = $mktsrc[0];
	
	$wgp_html = '<div><script charset="utf-8" type="text/javascript" src="http://partners.westgatespace.com/iframe/?'.$config.'"></script><noscript><a target="_blank" href="http://www.westgatereservations.com?mrksrc='.$mktsrc.'">Westgate Resorts</a></noscript></div>';
	
	return $wgp_html;
}
add_shortcode('wgp_widget', 'wgp_widget_shortcode');


