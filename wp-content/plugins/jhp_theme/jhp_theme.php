<?php

/*
Plugin Name: Jeri Houseworth Theme Mods
Plugin URI: http://www.jerihouseworthphotography.com/blog/
Description: A plugin to make changes to the theme since that's how the theme likes it
Author: Joe Chellman
Author URI: http://www.shooflydesign.org/
Version: 1.0
*/

function jhp_theme_remove_categories() {
	remove_action('th_post_metadata', 'tarski_post_categories_link');
}
add_action( 'init', 'jhp_theme_remove_categories' );
