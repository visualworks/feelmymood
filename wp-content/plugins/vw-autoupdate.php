<?php
/*
Plugin Name: Visual Works Auto-Update
Plugin URI:  https://www.visualworks.com.br/wordpress/vw-autoupdate
Description: Enable or Disable WordPress automatic updates for core, plugins, themes and translations
Version:     1.0.0
Author:      Visual Works
Author URI:  https://www.visualworks.com.br
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: vw
*/
//Domain Path: /languages

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action('init', 'vw_config_update');

function vw_config_update() { 
define( 'WP_AUTO_UPDATE_CORE', true ); // 'minor', false
add_filter( 'auto_update_plugin', '__return_true' ); // '__return_false'
add_filter( 'auto_update_theme', '__return_true' ); // '__return_false'
// add_filter( 'auto_update_translation', '__return_false' ); enabled by default
// add_filter( 'auto_core_update_send_email', '__return_false' ); // enabled by default


/* @param bool   $send        Whether to send the email. Default true.
 * @param string $type        The type of email to send.
 *                            Can be one of 'success', 'fail', 'critical'.
 * @param object $core_update The update offer that was attempted.
 * @param mixed  $result      The result for the core update. Can be WP_Error.
 */
// apply_filters( 'auto_core_update_send_email', true, $type, $core_update, $result );
}
