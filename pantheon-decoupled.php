<?php
/**
 * Plugin Name:     Pantheon Decoupled
 * Plugin URI:      https://pantheon.io/
 * Description:     Configuration necessary for hosting Decoupled WordPress sites on Pantheon.
 * Version:         0.1.0
 * Author:          Pantheon
 * Author URI:      https://pantheon.io/
 * Text Domain:     pantheon-decoupled
 * Domain Path:     /languages
 *
 * @package         Pantheon_Decoupled
 */

register_activation_hook( __FILE__, 'pantheon_decoupled_enable_deps' );

function pantheon_decoupled_enable_deps() {
  activate_plugin( 'pantheon-decoupled/pantheon-decoupled-example.php' );
  activate_plugin( 'wp-graphql/wp-graphql.php' );
}

function pantheon_decoupled_change_permalinks() {
	global $wp_rewrite;
	if ( $wp_rewrite->using_permalinks() == false ) {
		$wp_rewrite->set_permalink_structure('/%postname%/');
		update_option( "rewrite_rules", FALSE );
		$wp_rewrite->flush_rules( true );
	}
}
add_action('init', 'pantheon_decoupled_change_permalinks');
