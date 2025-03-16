<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Check if the option exists and delete it
if (get_option('wpst_disable_admin_url') !== false) {
    delete_option('wpst_disable_admin_url');
}

if (get_option('wpst_disable_comments') !== false) {
    delete_option('wpst_disable_comments');
}

if (get_option('wpst_disable_version_tags') !== false) {
    delete_option('wpst_disable_version_tags');
}

if (get_option('wpst_disable_theme_editor') !== false) {
    delete_option('wpst_disable_theme_editor');
}

if (get_option('wpst_enable_security_headers') !== false) {
    delete_option('wpst_enable_security_headers');
}

if (get_option('wpst_enable_limit_login_attempts') !== false) {
    delete_option('wpst_enable_limit_login_attempts');
}

if (get_option('wpst_enable_custom_sitemap') !== false) {
    delete_option('wpst_enable_custom_sitemap');
}

if (get_option('wpst_enable_blog_prefix') !== false) {
    delete_option('wpst_enable_blog_prefix');
}

if (get_option('wpst_enable_coming_soon') !== false) {
    delete_option('wpst_enable_coming_soon');
}

if (get_option('wpst_enable_editor_button') !== false) {
    delete_option('wpst_enable_editor_button');
}

if (get_option('wpst_enable_seo_metadata') !== false) {
    delete_option('wpst_enable_seo_metadata');
}

if (get_option('wpst_seo_front_meta_title') !== false) {
    delete_option('wpst_seo_front_meta_title');
}

if (get_option('wpst_seo_front_meta_description') !== false) {
    delete_option('wpst_seo_front_meta_description');
}