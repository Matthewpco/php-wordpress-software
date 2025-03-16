<?php

function convert_all_images() {
    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type IN ('image/jpeg', 'image/png')" );
    if ( ! empty( $results ) ) {
        echo '<p>Found ' . count( $results ) . ' attachment posts.</p>';
        foreach ( $results as $post ) {
            $attachment_id = $post->ID;
            $file_path = get_attached_file( $attachment_id );
            $extension = pathinfo( $file_path, PATHINFO_EXTENSION );
            if ( $extension === 'jpg' || $extension === 'jpeg' ) {
                $image = imagecreatefromjpeg( $file_path );
            } 
            elseif ( $extension === 'png' ) {
                $image = imagecreatefrompng( $file_path );
            }
            if ( isset( $image ) ) {
                echo '<p>Created image resource for attachment ID ' . $attachment_id . '</p>';
                $webp_image_path = str_replace( ".$extension", '.webp', $file_path );
                imagewebp( $image, $webp_image_path );
                imagedestroy( $image );
                update_attached_file( $attachment_id, $webp_image_path );
                wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $webp_image_path ) );
                wp_update_post( array(
                    'ID' => $attachment_id,
                    'post_mime_type' => 'image/webp',
                ) );
                unlink( $file_path );
                echo '<p>Image ID ' . $attachment_id . ' converted and replaced successfully!</p>';
            } 
            else {
                echo '<p>Failed to create image resource for attachment ID ' . $attachment_id . '</p>';
            }
        }
    } 
    else {
        echo '<p>No attachment posts found.</p>';
    }
}

function convert_image_from_url() {
    $url = esc_url_raw( $_POST['image_url'] );
    $extension = pathinfo( $url, PATHINFO_EXTENSION );
    $response = wp_remote_get( $url );
    if ( is_wp_error( $response ) ) {
        echo '<p>Error: ' . $response->get_error_message() . '</p>';
    } else {
        $image_data = wp_remote_retrieve_body( $response );
        $image = imagecreatefromstring( $image_data );
        $upload_dir = wp_upload_dir();
        $webp_image_path = $upload_dir['path'] . '/' . str_replace( ".$extension", '.webp', basename( $url ) );
        imagewebp( $image, $webp_image_path );
        imagedestroy( $image );
        $attachment = array(
            'guid' => $upload_dir['url'] . '/' . basename( $webp_image_path ),
            'post_mime_type' => 'image/webp',
            'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $webp_image_path ) ),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment( $attachment, $webp_image_path );
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        $attach_data = wp_generate_attachment_metadata( $attach_id, $webp_image_path );
        wp_update_attachment_metadata( $attach_id,  $attach_data );
        echo '<p>Image converted successfully! <a href="' . esc_url( wp_get_attachment_url( $attach_id ) ) . '">Download WebP image</a></p>';
    }
}

function upload_image() {
    $file = $_FILES['image_file'];
    $extension = pathinfo( $file['name'], PATHINFO_EXTENSION );
    if ( $extension === 'jpg' || $extension === 'jpeg' ) {
        $image = imagecreatefromjpeg( $file['tmp_name'] );
    } elseif ( $extension === 'png' ) {
        $image = imagecreatefrompng( $file['tmp_name'] );
    }
    $upload_dir = wp_upload_dir();
    $webp_image_path = $upload_dir['path'] . '/' . str_replace( ".$extension", '.webp', $file['name'] );
    imagewebp( $image, $webp_image_path );
    imagedestroy( $image );
    $attachment = array(
        'guid' => $upload_dir['url'] . '/' . basename( $webp_image_path ),
        'post_mime_type' => 'image/webp',
        'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $webp_image_path ) ),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $webp_image_path );
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $webp_image_path );
    wp_update_attachment_metadata( $attach_id,  $attach_data );
    echo '<p>Image converted successfully! <a href="' . esc_url( wp_get_attachment_url( $attach_id ) ) . '">Download WebP image</a></p>';
}