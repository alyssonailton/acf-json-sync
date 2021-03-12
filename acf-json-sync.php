<?php
/**
 * Plugin Name:     Acf Json Sync
 * Plugin URI:      https://bitbucket.org/mostardals/acf-json-sync/src
 * Description:     Create JSON files to Sync ACF fields
 * Author:          Alysson A. da Silva
 * Author URI:      https://alyssonailton.com.br
 * Text Domain:     acf-json-sync
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Acf_Json_Sync
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Not allowed' );
}

class ACF_JSON_Sync {

	public function __construct() {
        if ( class_exists( 'ACF' ) ) {
            add_filter( 'acf/settings/save_json', array( __CLASS__, 'acf_json_save' ) );
            add_filter( 'acf/settings/load_json', array( __CLASS__, 'acf_json_load' ) );
        }

	}

	public static function acf_json_save( $path ) {
		return self::get_path();
	}

	public static function acf_json_load( $paths ) {
		unset( $paths[0] );

		$paths[] = self::get_path();

		return $paths;
	}

	public static function get_path() {
		return plugin_dir_path( __FILE__ ) . 'acf-json';
	}

}

new ACF_JSON_Sync();
