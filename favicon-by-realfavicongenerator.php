<?php
/**
 * Favicon by RealFaviconGenerator.
 *
 * @package   favicon-by-realfavicongenerator
 * @author    Philippe Bernard <philippe@realfavicongenerator.net>
 * @license   GPLv2
 * @link      http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright 2014 RealFaviconGenerator
 *
 * @wordpress-plugin
 * Plugin Name:       Favicon by RealFaviconGenerator
 * Plugin URI:        http://realfavicongenerator.net/extensions/wordpress
 * Description:       Create and install your favicon for all platforms: PC/Mac of course, but also iPhone/iPad, Android devices, Windows 8 tablets, etc.
 * Version:           1.3.19
 * Author:            Philippe Bernard
 * Author URI:        http://realfavicongenerator.net/
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       favicon-by-realfavicongenerator
 * Domain Path:       /languages/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public' . DIRECTORY_SEPARATOR .
	'class-favicon-by-realfavicongenerator.php' );

register_activation_hook( __FILE__, array( 'Favicon_By_RealFaviconGenerator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Favicon_By_RealFaviconGenerator', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'Favicon_By_RealFaviconGenerator', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if ( is_admin() ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin' . DIRECTORY_SEPARATOR .
		'class-favicon-by-realfavicongenerator-admin.php' );
	add_action( 'plugins_loaded', array( 'Favicon_By_RealFaviconGenerator_Admin', 'get_instance' ) );

}
