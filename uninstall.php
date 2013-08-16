<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   Skyhook_Help
 * @author    Cory Crowley <cory@skyhookmarketing.com>
 * @license   GPL-2.0+
 * @link      http://skyhookinternetmarketing.com/
 * @copyright 2013 Cory Crowley, Skyhook Internet Marketing
 */

// If uninstall, not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Define uninstall functionality here