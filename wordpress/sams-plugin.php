<?php
/*
Plugin Name: SAMS Plugin
Description: Display game plan and results from the German volleyball leagues with shortcodes
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

require_once("autoload.php");

require_once plugin_dir_path( __FILE__ ) . 'shortcodes/sams_table_shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'shortcodes/sams_fixtures_shortcode.php';
add_shortcode( 'samstable', 'fetch_and_render_sams_table' );
add_shortcode( 'samsfixtures', 'fetch_and_render_sams_fixtures');

?>
