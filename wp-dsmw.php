<?php
/*
Plugin Name: Live Daily Stock Market Image Sidebar Widget
Version: 1.0.1
Description: Take a look at the Live Market Trend Graphs in your website. need to ask David what 
he needs here!
Author: David Johnston - MoneyBlogNewz
Author URI: http://wordpress.org/support/profile/personalmoneystore/
Plugin URI: create a page in the PMS store to host this widget

*/
 /*
   Copyright 2010  Director of Personal Money Store: David Johnston  (email : webmaster@personalmoneystore.com)

   The image is compiled by Google and this gadget author has no control over what is displayed or the accuracy of it.

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
   */

 global $wp_version;
 
	$exit_msg = 'WP Daily Stock Market Sidebar Widget requires WordPress 2.6 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';

	if (version_compare($wp_version, "2.6", "<")) {

      exit($exit_msg);
	}
            $wp_dsmw_plugin_url =  trailingslashit( WP_PLUGIN_URL.'/'. dirname( plugin_basename(__FILE__) ));

function WPdsmw_WidgetControl()
{
	// get saved options
	$options = get_option('wp-dsmw');
	// handle user input
	if ($_POST["dsmw_submit"]) {
	// retireve ppw title from the request

		$options['dsmw_title'] = strip_tags(stripslashes($_POST["dsmw_title"]));
        $options['dsmw_first_name'] = strip_tags(stripslashes($_POST["dsmw_first_name"]));
		$options['dsmw_second_name'] = strip_tags(stripslashes($_POST["dsmw_second_name"]));
		$options['dsmw_enable_checkbox'] = strip_tags(stripslashes($_POST["dsmw_enable_checkbox"]));
 		// update the options to database
        update_option('wp-dsmw', $options);
	}
	$dsmw_title = $options['dsmw_title'];
	$dsmw_first_name = $options['dsmw_first_name'];
	$dsmw_second_name = $options['dsmw_second_name'];
	$dsmw_enable_checkbox = $options['dsmw_enable_checkbox'];
	// print out the widget control, links to widget control    
	include('wp-dsmw-widgetControl.php');

}  
function WPdsmw_Widget($args = array())
{      
	// extract the parameters

	extract($args);
	// get our options
	$options = get_option('wp-dsmw');
	$dsmw_title = $options['dsmw_title'];
	$dsmw_first_name = $options['dsmw_first_name'];
	$dsmw_second_name = $options['dsmw_second_name'];
	$dsmw_enable_checkbox = $options['dsmw_enable_checkbox'];
	// print the theme compatibility code
	echo $before_widget;
	echo $before_title . $dsmw_title. $after_title;
	// include our widget
	include('wp-dsmw-widget.php');
	echo $after_widget;
}
//loads from the start
function WPdsmw_Init(){
	// register widget
	register_sidebar_widget('  Daily Stock Market Sidebar Widget', 'WPdsmw_Widget');
	// register widget control
	register_widget_control('  Daily Stock Market Sidebar Widget', 'WPdsmw_WidgetControl');

}
add_action('init', 'WPdsmw_Init');
//links to css
add_action('wp_head', 'WPdsmw_HeadAction');
function WPdsmw_HeadAction()
{
	global $wp_dsmw_plugin_url;
    echo '<link rel="stylesheet" href="' . $wp_dsmw_plugin_url . '/wp-dsmw.css" type="text/css" />';

}
//links to javascript

add_action('wp_print_scripts', 'WPdsmw_ScriptsAction');

function WPdsmw_ScriptsAction()
{
	if (!is_admin()) {

	global $wp_dsmw_plugin_url;
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-form');
	wp_enqueue_script('wp_dsmw_script', $wp_dsmw_plugin_url . '/wp-dsmw.js', array('jquery', 'jquery-form'));
	}
}?>