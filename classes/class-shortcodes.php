<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class AVA_Studio_Shortcodes {

	public $shortcodes;

    public function __construct() {

	    //dump($this->shortcodes);
    }

	/** Load shortcodes */
	public function load() {

		foreach ( glob( AVA_STUDIO_PLUGIN_DIR . 'shortcodes/*', GLOB_ONLYDIR ) as $dir ) {
			preg_match('/[\/\\\\]([a-z_0-9\-]+)$/i', $dir, $p);
			$this->shortcodes[$p[1]] = array();

			foreach ( glob( $dir.'/*.php' ) as $file ) {

				if ( preg_match('/^params\./', basename($file)) ) {
					$params = require_once $file;
					if (!empty($params) && is_array($params)) $this->shortcodes[ $p[1] ]['params'] = $params;

					if (function_exists('vc_map')) {
						vc_map( $params );
					}
				} else
					require_once $file;
			}
		}

		//dd($this->shortcodes);
		// vc_shortcode_output
	}
}

