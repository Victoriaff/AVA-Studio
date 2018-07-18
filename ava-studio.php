<?php
/*
Plugin Name: WP-Magic AVA Studio
Plugin URI: http://ava-studio.wp-magic.com
Description: Just add live to your pages
Version: 1.0.0
Author: WP-Magic.com
Author URI: http://wp-magic.com
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * AVA Studio version
 */
if ( ! defined( 'AVA_STUDIO_VERSION' ) ) {
	define( 'AVA_STUDIO_VERSION', '1.0.0' );
}
if ( ! defined( 'AVA_STUDIO_PLUGIN_DIR' ) ) {
	define( 'AVA_STUDIO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'AVA_STUDIO_PLUGIN_URL' ) ) {
	define( 'AVA_STUDIO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * AVA main class
 *
 * @package AVA-Studio
 * @since   1.0
 */
class AVA_Studio {
	private static $plugin = 'ava-studio';
	private static $pluginName = 'AVA Studio';

	private $options = array(
		'ava_studio_general' => array(

		),
		'ava_studio_css' => array(

		),
	);

	/**
	 * Modules and objects instances list
	 * @since 4.2
	 * @var array
	 */
	private $factory = array();

	/**
	 * Core singleton class
	 * @var self - pattern realization
	 */
	private static $instance;






	/**
	 * Class constructor
	 *
	 * @since  1.0
	 */
	private function __construct() {
		$dir = dirname( __FILE__ );

		/** Load core files */
		$this->load();


		// Add hooks
		//add_action( 'plugins_loaded', array( &$this, 'plugins_loaded' ), 9 );
		add_action( 'init', array( &$this, 'init' ), 9 );


		//register_activation_hook( __FILE__, array( $this, 'plugin_activated' ) );

		add_action( 'admin_init', array( &$this, 'adminInit' ) );

		add_action( 'admin_menu', array( &$this, 'adminMenu' ) );

		add_action( 'admin_footer', array( &$this, 'adminFooter' ) );

		// Enqueue scripts & styles
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueScripts' ) );
	}

	public function init() {

		//$this->factory['options']   = new AVA_Studio_Options($this->options);
		$this->factory['params']    = new AVA_Studio_Params();
		$this->factory['shortcodes']= new AVA_Studio_Shortcodes();
		$this->factory['view']      = new AVA_Studio_View();
		$this->factory['pages']     = new AVA_Studio_Pages();

		/** Load shortcodes */
		$this->shortcodes()->load();

	}

	public function load() {
		/** Load helpers */
		foreach ( glob( plugin_dir_path( __FILE__ ) . 'helpers/*.php' ) as $file ) {
			include_once $file;
		}
		/** Load classes */
		foreach ( glob( plugin_dir_path( __FILE__ ) . 'classes/*.php' ) as $file ) {
			include_once $file;
		}

	}


	public function mainPageSlug() {
		return 'ava-studio-about';
	}

	public function adminInit() {
	}

	public function adminMenu() {

		add_menu_page( __( ava()->pluginName(), 'ava-studio' ), __( ava()->pluginName(), 'ava-studio' ), 'manage_options', $this->mainPageSlug(), null, AVA_STUDIO_PLUGIN_URL.'admin/assets/images/plugin.png', 76 );

		$page = add_submenu_page( $this->mainPageSlug(), __( 'About', 'ava-studio' ), __( 'About', 'ava-studio' ), 'manage_options', 'ava-studio-about', array($this->factory['pages'], 'about') );
		//dump($page);
		// toplevel_page_ava-studio-about
		$page = add_submenu_page( $this->mainPageSlug(), __( 'Shortcodes', 'ava-studio' ), __( 'Shortcodes', 'ava-studio' ), 'manage_options', 'ava-studio-shortcodes', array($this->factory['pages'], 'shortcodes') );
		//dump($page);
		// ava-studio_page_ava-studio-shortcodes
		$page = add_submenu_page( $this->mainPageSlug(), __( 'Settings', 'ava-studio' ), __( 'Settings', 'ava-studio' ), 'manage_options', 'ava-studio-settings', array($this->factory['pages'], 'settings') );
		//dump($page);
		// ava-studio_page_ava-studio-settings


		//global $admin_page_hooks, $pagenow, $plugin_page;

		//dump($plugin_page);
		//dd($admin_page_hooks);



		//add_action( wpmew()->plugin().'_page_wpmew-settings', function() { dump('Act: '.wpmew()->plugin().'_page_wpmew-settings'); });
		//add_action( 'load-easy-work_page_wpmew-settings', function() { dump('Act: load-easy-work_page_wpmew-settings'); });

		//add_action( 'load-wpmew-settings', function() { dump('Act: load-wpmew-settings'); });
		//add_action( 'load-admin.php', function() { dump('Act: load-admin.php'); });

	}

	public function adminFooter() {
	}




	/*
	public function wp_enqueue_scripts() {
		wp_enqueue_script( 'wpm-form', wmpew_asset_url( 'js/wpm-form.js' ), array( 'jquery' ), WPM_EW_VERSION, true );
	}

	public function admin_footer() {
		wp_enqueue_script( 'wpm-functions', wmpew_asset_url( 'js/wpm-functions.js' ), array( 'jquery' ), time(), true );
		wp_enqueue_script( 'wpmew-callbacks', wmpew_asset_url( 'js/wpmew-callbacks.js' ), array( 'jquery' ), time(), true );
		wp_enqueue_script( 'wpm-form', wmpew_asset_url( 'js/wpm-form.js' ), array( 'jquery' ), time(), true );

		wp_enqueue_style( 'wpm-form-css', wmpew_asset_url( 'css/wpm-form.css' ), null, time() );
	}
	*/

	/**
	 * Get the instane of WMP_EW
	 *
	 * @return self
	 */
	public static function instance() {
		if ( ! ( self::$instance instanceof self ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Cloning disabled
	 */
	private function __clone() {
	}

	/**
	 * Serialization disabled
	 */
	private function __sleep() {
	}

	/**
	 * De-serialization disabled
	 */
	private function __wakeup() {
	}

	public function plugin() {
		return self::$plugin;
	}

	public function pluginName() {
		return self::$pluginName;
	}

	public function options() {
		if ( ! isset( $this->factory['options'] ) ) {
			do_action( 'ava_studio_before_init_options' );
			//require_once $this->getPath( 'CORE_DIR', 'class-ew-options.php' );
			$this->factory['options'] = new AVA_Studio_Options();
			do_action( 'ava_studio_init_settings' );
		}

		return $this->factory['options'];
	}

	public function params() {
		return $this->factory['params'];
	}

	public function shortcodes() {
		return $this->factory['shortcodes'];
	}

	public function pages() {
		return $this->factory['pages'];
	}

	/** Enqueue scripts & styles */
	public function enqueueScripts() {
		wp_register_style( 'ava-studio-params', AVA_STUDIO_PLUGIN_URL . '/admin/assets/css/params.css', time() );
		wp_enqueue_style( 'ava-studio-params' );

		wp_register_script( 'ava-studio-admin', AVA_STUDIO_PLUGIN_URL . '/admin/assets/js/params.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'ava-studio-admin' );
	}


	/**
	 * Callback function WP plugin_loaded action hook. Loads locale
	 *
	 * @since  1.0
	 * @access public
	 */
	public function pluginsLoaded() {
		// Setup locale
		do_action( 'ava_studio_plugins_loaded' );
		load_plugin_textdomain( self::$plugin, false, __FILE__.'/languages' );
	}

	/**



	/**
	 * Enables to add hooks in activation process.
	 * @since 1.0
	 */
	public function pluginActivated() {
		//dd('activationHook');
		do_action( 'ava_studio_activation_plugin' );
	}

	/**
	 * Enables to add hooks in deactivation process.
	 * @since 1.0
	 */
	public function pluginDeactivated() {
		//dd('activationHook');
		do_action( 'ava_studio_activation_plugin' );
	}


	/**
	 * Sets version of the VC in DB as option `vc_version`
	 *
	 * @since 1.0
	 * @access protected
	 *
	 * @return void
	 */
	protected function setVersion() {
		$version = get_option( 'ava_studio_version' );
		if ( ! is_string( $version ) || version_compare( $version, AVA_STUDIO_VERSION ) !== 0 ) {
			/*
			add_action(  'wpmew_after_init', array(
				vc_settings(),
				'rebuild',
			) );
			*/
			update_option( 'ava_studio_version', AVA_STUDIO_VERSION );
		}
	}



}

if ( !function_exists('ava') ) {
	function ava() {
		return AVA_Studio::instance();
	}
	ava()->init();
}

/*
global $ava;

if ( ! $ava ) {
	$ava = AVA_Studio::instance();
	//$wmpew->init();
}
*/



