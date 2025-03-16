<?php

if (get_option('wpst_enable_seo_metadata')) {
    add_action('add_meta_boxes', 'wpst_add_seo_meta_box');
    add_action("save_post", "wpst_save_seo_meta_box", 10, 3);
    add_action('wp_head', 'wpst_seo_add_meta_tags');
} else {
    remove_action('add_meta_boxes', 'wpst_add_seo_meta_box');
    remove_action("save_post", "wpst_save_seo_meta_box", 10, 3);
    remove_action('wp_head', 'wpst_seo_add_meta_tags');
}


function wpst_add_seo_meta_box() {
    add_meta_box(
        'seo_meta_box', // id of the meta box
        'SEO Metadata', // title
        'wpst_display_seo_meta_box', // callback function
        'post', // screen or post type
        'normal' // context
    );
    add_meta_box(
        'seo_meta_box', // id of the meta box
        'SEO Metadata', // title
        'wpst_display_seo_meta_box', // callback function
        'page', // screen or post type
        'normal' // context
    );
}


function wpst_display_seo_meta_box($post) {
    $seo_title = get_post_meta($post->ID, '_seo_title', true);
    $seo_description = get_post_meta($post->ID, '_seo_description', true);
    $seo_noindex = get_post_meta($post->ID, '_seo_noindex', true);
    ?>
    <table>
        <tr>
            <td style="width: 100%">SEO Title</td>
            <td><input type="text" size="80" name="seo_title" value="<?php echo $seo_title; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%;">SEO Description</td>
            <td style="padding-top: 10px;"><textarea type="text" rows="4" cols="50" name="seo_description" style="width: 100%"><?php echo $seo_description?></textarea></td>
        </tr>
        <tr>
            <td style="width: 100%">SEO Noindex - Nofollow</td>
            <td><input type="checkbox" name="seo_noindex" value="1" <?php checked($seo_noindex, 1) ?> /></td>
        </tr>
    </table>
    <?php
}


function wpst_save_seo_meta_box($post_id, $post, $update) {
    if (!isset($_POST["seo_title"]) || !isset($_POST["seo_description"]) ) {
        return $post_id;
    }

    $seo_title = $_POST["seo_title"];
    $seo_description = $_POST["seo_description"];
    $seo_noindex = $_POST["seo_noindex"];

    update_post_meta($post_id, "_seo_title", $seo_title);
    update_post_meta($post_id, "_seo_description", $seo_description);
    update_post_meta($post_id, "_seo_noindex", $seo_noindex);
}


function wpst_seo_add_meta_tags() {
    if (is_singular()) {
        $seo_title = get_post_meta(get_the_ID(), '_seo_title', true);
        $seo_description = get_post_meta(get_the_ID(), '_seo_description', true);
        $seo_noindex = get_post_meta(get_the_ID(), '_seo_noindex', true);
        if ($seo_title) {
            echo '<title>' . $seo_title . '</title>';
        }
        if ($seo_description) {
            echo '<meta name="description" content="' . $seo_description . '">';
        }
        if ($seo_noindex) {
            echo '<meta name="robots" content="noindex, nofollow" />';
        }
    }

    if (is_front_page()) {
        $front_page_title = get_option('wpst_front_page_title');
        $front_page_title = wp_unslash($front_page_title);
        $front_page_description = get_option('wpst_front_page_description');
        $front_page_description = wp_unslash($front_page_description);

        if ($front_page_title) {
            echo '<title>' . $front_page_title . '</title>';
        }
        if ($front_page_description) {
            echo '<meta name="description" content="' . $front_page_description . '">';
        }
    }
    
}