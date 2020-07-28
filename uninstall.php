<?php
// Copyright 2014-2016 RealFaviconGenerator

// If uninstall not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'public' . DIRECTORY_SEPARATOR .
	'class-favicon-by-realfavicongenerator-common.php';

function fbrfg_clean_site_instance() {
	// Remove options
	foreach( Favicon_By_RealFaviconGenerator_Common::get_options_list() as $opt ) {
		delete_option( $opt );
	}

	// Remove files
	$dir = Favicon_By_RealFaviconGenerator_Common::get_files_dir();
	if ( file_exists( $dir ) ) {
		Favicon_By_RealFaviconGenerator_Common::remove_directory( $dir );
	}
}

if ( is_multisite() ) {
	global $wpdb;
	$blogs = $wpdb->get_results( "SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A );
	fbrfg_clean_site_instance();

	if ( $blogs ) {
		foreach( $blogs as $blog ) {
			switch_to_blog( $blog['blog_id'] );
			fbrfg_clean_site_instance();
			restore_current_blog();
		}
	}
} else {
	fbrfg_clean_site_instance();
}
