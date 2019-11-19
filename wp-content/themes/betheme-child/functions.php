<?php
/**
 * Betheme Child Theme
 *
 * @package Betheme Child Theme
 * @author Muffin group
 * @link https://muffingroup.com
 */

/**
 * Child Theme constants
 * You can change below constants
 */

// white label

define('WHITE_LABEL', false);

/**
 * Enqueue Styles
 */

function mfnch_enqueue_styles()
{
	// enqueue the parent stylesheet
	// however we do not need this if it is empty
	// wp_enqueue_style('parent-style', get_template_directory_uri() .'/style.css');

	// enqueue the parent RTL stylesheet

	if (is_rtl()) {
		wp_enqueue_style('mfn-rtl', get_template_directory_uri() . '/rtl.css');
	}

	// enqueue the child stylesheet

	wp_dequeue_style('style');
	//wp_enqueue_style('style', get_stylesheet_directory_uri() .'/style.css');

	wp_enqueue_style('style1', get_stylesheet_directory_uri() .'/css/common-1.7.min.css');
	wp_enqueue_style('style2', get_stylesheet_directory_uri() .'/css/setup.min.css');
    wp_enqueue_style('style3', get_stylesheet_directory_uri() .'/css/bootstrap.min.css');
    wp_enqueue_script('script', get_stylesheet_directory_uri() .'/js/bootstrap.min.js','','',true);
    wp_enqueue_script('script', get_stylesheet_directory_uri() .'/js/jquery-1.12.4.min.js','','',true);
    wp_enqueue_script('script', get_stylesheet_directory_uri() .'/js/style-1.6.min.js','','',true);
}
add_action('wp_enqueue_scripts', 'mfnch_enqueue_styles', 101);

/**
 * Load Textdomain
 */

function mfnch_textdomain()
{
	load_child_theme_textdomain('betheme', get_stylesheet_directory() . '/languages');
	load_child_theme_textdomain('mfn-opts', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mfnch_textdomain');
