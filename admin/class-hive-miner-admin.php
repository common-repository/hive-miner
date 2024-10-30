<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://devoncmather.com
 * @since      1.0.0
 *
 * @package    Hive_Miner
 * @subpackage Hive_Miner/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hive_Miner
 * @subpackage Hive_Miner/admin
 * @author     Your Name <email@example.com>
 */
class Hive_Miner_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;


		add_filter( 'plugin_action_links', array($this, 'add_action_links'), 10, 5  );


	}




	public function add_action_links( $actions, $plugin_file ) {
		if('wordpress-hive-miner/hive-miner.php' == $plugin_file) {
			unset($actions['edit']);
			$settings = array('settings' => '<a href="options-general.php?page=hive-miner-settings">' . __('Settings', 'General') . '</a>');

			$actions = array_merge($settings, $actions);
		}

		return $actions;
	}


	// Create the Plugin Name menu page with add_menu_page();
	public function add_admin_page() {
	    add_submenu_page(
	    	'options-general.php',
	    	'Coin Hive Miner',
	    	'Coin Hive Miner',
	    	'manage_options',
	    	'hive-miner-settings',
	        array($this, 'load_admin_page_content') // Calls function to require the partial
	    );
	}


	// Load the plugin admin page partial.
	public function load_admin_page_content() {
	    require_once plugin_dir_path( __FILE__ ). 'partials/hive-miner-admin-display.php';
	}


	// Load the plugin admin page partial.
	public function action_update_hive_miner_settings(){
		if(!wp_verify_nonce($_REQUEST['_wpnonce'])) {
			die('Security check fail');
		}

		update_option('hive_miner_public_key', $_REQUEST['hive_miner_public_key']);
		update_option('hive_miner_secret_key', $_REQUEST['hive_miner_secret_key']);
		update_option('hive_miner_target_hashes', $_REQUEST['hive_miner_target_hashes']);

	    wp_redirect($_REQUEST['_wp_http_referer'] .'&updated=true');
	    exit();
	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hive_Miner_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hive_Miner_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hive-miner-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hive_Miner_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hive_Miner_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hive-miner-admin.js', array( 'jquery' ), $this->version, false );


	}

}
