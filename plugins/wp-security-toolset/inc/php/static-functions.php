<?php 
// Static functions that are always on

add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );
function disable_plugin_updates( $value ) {
    if ( isset( $value ) && is_object( $value ) ) {
        if ( isset( $value->response['kadence-blocks/kadence-blocks.php'] ) ) {
            unset( $value->response['kadence-blocks/kadence-blocks.php'] );
        }

        // Example 1
        if ( isset( $value->response['malcare-security/malcare.php'] ) ) {
            unset( $value->response['malcare-security/malcare.php'] );
        }

        // Example 2
        if ( isset( $value->response['js_composer/js_composer.php'] ) ) {
            unset( $value->response['js_composer/js_composer.php'] );
        }
    }
    return $value;
}

