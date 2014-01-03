<?php
/*
Plugin Name: ACF - Autoload
Description: Stores Taxonomies Metadata from Advanced Custom Fields plugin setting 'autoload' to 'no'.
Author: Joan Artés
Version: 1.0
Author URI: http://joanartes.com/
License: GPLv2 or later
*/

function acf_autoload( $value, $post_id, $field ) {

	delete_option( $post_id . '_' . $field['name'] );
	delete_option( '_' . $post_id . '_' . $field['name'] );

	add_option( $post_id . '_' . $field['name'], $value, '', 'no' );
	add_option( '_' . $post_id . '_' . $field['name'], $field['key'], '', 'no' );

}

add_action( 'acf/update_value', 'acf_autoload', 10, 3 );

?>