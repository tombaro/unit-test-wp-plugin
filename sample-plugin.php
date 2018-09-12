<?php
/**
 * Plugin Name:     Sample Plugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     sample-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Sample_Plugin
 */

namespace UnitTestDemo;

/**
 * Get a plugin option from the WordPress database.
 *
 * @param string $name The option to search for.
 * @param array  $default The default value.
 *
 * @return mixed
 */
function demo_get_option( $name, $default = null ) {
	$option = get_option( 'demo_' . $name, $default );

	if ( is_array( $default ) && ! is_array( $option ) ) {
		$option = (array) $option;
	}

	return $option;
}
