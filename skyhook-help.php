<?php
/**
 * Skyhook Help
 *
 * A help plugin that offers advice in various sections of the WordPress admin.
 *
 * @package   Skyhook_Help
 * @author    Cory Crowley <cory@skyhookmarketing.com>
 * @license   GPL-2.0+
 * @link      http://skyhookinternetmarketing.com/
 * @copyright 2013 Cory Crowley, Skyhook Internet Marketing
 *
 * Plugin Name: Skyhook Help
 * Plugin URI:  http://skyhookinternetmarketing.com/
 * Description: A help plugin that offers advice in various sections of the WordPress admin.
 * Version:     1.0.0
 * Author:      Skyhook Marketing
 * Author URI:  http://skyhookinternetmarketing.com/
 * Text Domain: skyhook-help
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Load Needed Classes
require_once( plugin_dir_path( __FILE__ ) . 'inc/class-skyhook-help.php' );

// Call Instance of class
Skyhook_Help::get_instance();