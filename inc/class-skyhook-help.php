<?php
/**
 * Skyhook Help
 *
 * @package   Skyhook_Help
 * @author    Cory Crowley <cory@skyhookmarketing.com>
 * @license   GPL-2.0+
 * @link      http://skyhookinternetmarketing.com/
 * @copyright 2013 Cory Crowley, Skyhook Internet Marketing
 */

/**
 * Skyhook_Help Class
 *
 * @package   Skyhook_Help
 * @author    Cory Crowley <cory@skyhookmarketing.com>
 */
class Skyhook_Help {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since 1.0.0
	 * @var 	string
	 */
	protected $version = '1.0.0';

	/**
	 * Instance of this class.
	 *
	 * @since 1.0.0
	 * @var   object
	 */
	protected static $instance = null;

	/**
	 * Unique identifier
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	public $plugin_slug = 'skyhook-help';

	/**
	 * Dashboard Widget Name
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	public $dasboard_widget_name = 'skyhook_help_dashboard_widget';

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Add Widget
		add_action( 'wp_dashboard_setup', array( $this, 'skyhook_help_dashboard_widget' ) );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since  1.0.0
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		// Return Instance
		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function load_plugin_textdomain() {

		// Domain
		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		// Load Textdomain
		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}

	/**
	 * Skyook Help Dashoard Widget
	 *
	 * @since  1.0
	 * @return void
	 */
	public function skyhook_help_dashboard_widget() {

		// Add the Dashboard Widget
		wp_add_dashboard_widget( $this->dasboard_widget_name, __( 'Skyhook Support', $this->plugin_slug ), array( $this, 'help_view' ) );
		
		// Globalize the metaboxes array, this holds all the widgets for wp-admin
		global $wp_meta_boxes;

		// Get the regular dashboard widgets array (which has our new widget already but at the end)
		$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
		
		// Backup the dashboard widget
		$support_widget_backup = array( 'skyhook_help_dashboard_widget' => $normal_dashboard['skyhook_help_dashboard_widget'] );

		// Delete the dashboard widget
		unset( $normal_dashboard['skyhook_help_dashboard_widget'] );

		// Merge the two arrays together so our widget is at the beginning
		$sorted_dashboard = array_merge( $support_widget_backup, $normal_dashboard );

		// Save the sorted array back into the original metaboxes 
		$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
	}

	/**
	 * Skyhook Help Dashboard View
	 *
	 * @since  1.0
	 * @return void
	 */
	public function help_view() {
		printf( __( '<p>Welcome to the %s Dashboard! Need Help? Contact <a target="_blank" href="%s">Skyhook Support</a>!</p>', $this->plugin_slug ), get_bloginfo( 'name' ), 'http://support.skyhookinternetmarketing.com/' );
	}	
}