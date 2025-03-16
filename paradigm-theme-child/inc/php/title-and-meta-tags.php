<?php

function add_title_and_meta_tags() {
   // Define an array of page-specific title and meta tag information
   $pages = array(
        'front-page' => array(
            'title' => 'META TITLE',
            'description' => 'META DESCRIPTION'
        ),

        'about' => array(
            'title' => 'META TITLE',
            'description' => 'META DESCRIPTION'
        ),

        'contact' => array(
            'title' => 'META TITLE',
            'description' => 'META DESCRIPTION'
        ),
   );

   // Loop through the array and output the appropriate title and meta tags
   foreach ( $pages as $page => $data ) {
       if ( ( $page == 'front-page' && is_front_page() ) || is_page( $page ) ) {
           echo '<title>' . $data['title'] . '</title>';
           echo '<meta name="description" content="' . $data['description'] . '">';
           echo '<meta name="robots" content="index,follow">';
           break;
       }
   }
}
//add_action( 'wp_head', 'add_title_and_meta_tags' );