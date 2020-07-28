<?php
// Copyright 2014-2016 RealFaviconGenerator

require_once plugin_dir_path( __FILE__ ) . '..' . DIRECTORY_SEPARATOR .
	'public' . DIRECTORY_SEPARATOR . 'class-favicon-by-realfavicongenerator-common.php';

class Favicon_By_RealFaviconGenerator extends Favicon_By_RealFaviconGenerator_Common {

	protected static $instance = null;

	private function __construct() {
		add_action( 'wp_head', array( $this, 'add_favicon_markups' ) );
		add_action( 'login_head', array( $this, 'add_favicon_markups' ) );

		// Deactivate Genesis default favicon
		add_filter( 'genesis_pre_load_favicon', array( $this, 'return_empty_favicon_for_genesis' ) );
	}

	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}


	public static function activate( $network_wide ) {
		// Nothing to do
	}

	public static function deactivate( $network_wide ) {
		wp_clear_scheduled_hook( Favicon_By_RealFaviconGenerator_Common::ACTION_CHECK_FOR_UPDATE );
	}

}
