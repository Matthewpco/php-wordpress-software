<?php
// Theme configurations functions 
// Add support for featured images
add_theme_support( 'post-thumbnails' );

// Stop wordpress from adding uploads to month and year folders and instead just use /uploads
update_option( 'uploads_use_yearmonth_folders', 0 );

// Remove image size limit
function disable_big_image_size_threshold( $threshold ) {
    return false;
}
add_filter( 'big_image_size_threshold', 'disable_big_image_size_threshold' );

// Stop wordpress from making additional image sizes
function remove_all_image_sizes( $sizes) {
    return array();
}
add_filter('intermediate_image_sizes', 'remove_all_image_sizes');


// updates the option for permalinks to postname automatically if not set already
function set_permalink_structure() {
    global $wp_rewrite;
    // Check if the permalink structure is already set to '/%postname%/'
    if (get_option('permalink_structure') !== '/%postname%/') {
        update_option('permalink_structure', '/%postname%/');
        $wp_rewrite->flush_rules();
    }
}
add_action('init', 'set_permalink_structure');


// Add support for HTML 5 features
add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    )
);

// theme-settings-page

function paradigm_theme_add_settings_page() {
    add_menu_page(
        'Paradigm Theme Settings', // page title
        'Theme Settings', // menu title
        'manage_options', // capability
        'paradigm-theme-settings', // menu slug
        'paradigm_theme_display_settings_page', // function that displays the options page
        null, // icon url
        100 // position
    );
}
add_action('admin_menu', 'paradigm_theme_add_settings_page');

function paradigm_theme_display_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('paradigm_theme_options');
            do_settings_sections('paradigm_theme_options');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
    <?php
}


// theme-settings
function paradigm_theme_register_settings() {
    register_setting(
        'paradigm_theme_options', // option group
        'paradigm_theme_options', // option name
        'paradigm_theme_validate_options' // sanitize callback function
    );

    add_settings_section(
        'header_info_bar', // id
        'Header Info Bar Settings', // title
        null, // callback function
        'paradigm_theme_options' // page
    );

    add_settings_field(
        'phone_number', // id
        'Phone Number', // title
        'paradigm_theme_display_phone_field', // callback function
        'paradigm_theme_options', // page
        'header_info_bar' // section
    );

    add_settings_field(
        'location', // id
        'Location', // title
        'paradigm_theme_display_location_field', // callback function
        'paradigm_theme_options', // page
        'header_info_bar' // section
    );

    add_settings_field(
        'pay_online', // id
        'Pay Online', // title
        'paradigm_theme_display_pay_online_field', // callback function
        'paradigm_theme_options', // page
        'header_info_bar' // section
    );

    add_settings_field(
        'forms', // id
        'Forms', // title
        'paradigm_theme_display_forms_field', // callback function
        'paradigm_theme_options', // page
        'header_info_bar' // section
    );

    add_settings_field(
        'background_color', // id
        'Background Color', // title
        'paradigm_theme_display_background_color_field', // callback function
        'paradigm_theme_options', // page
        'header_info_bar' // section
    );

    add_settings_field(
        'font_color', // id
        'Font Color', // title
        'paradigm_theme_display_font_color_field', // callback function
        'paradigm_theme_options', // page
        'header_info_bar' // section
    );
}
add_action('admin_init', 'paradigm_theme_register_settings');

function paradigm_theme_display_phone_field() {
    $options = get_option('paradigm_theme_options');
    $phone_number = isset($options['phone_number']) ? $options['phone_number'] : '';
    ?>
    <input type="text" name="paradigm_theme_options[phone_number]" value="<?php echo esc_attr($phone_number); ?>">
    <?php
}

function paradigm_theme_display_location_field() {
    $options = get_option('paradigm_theme_options');
    $location = isset($options['location']) ? $options['location'] : '';
    ?>
    <input type="text" name="paradigm_theme_options[location]" value="<?php echo esc_attr($location); ?>">
    <?php
}

function paradigm_theme_display_pay_online_field() {
    $options = get_option('paradigm_theme_options');
    $pay_online = isset($options['pay_online']) ? $options['pay_online'] : '';
    ?>
    <input type="text" name="paradigm_theme_options[pay_online]" value="<?php echo esc_attr($pay_online); ?>">
    <?php
}

function paradigm_theme_display_forms_field() {
    $options = get_option('paradigm_theme_options');
    $forms = isset($options['forms']) ? $options['forms'] : '';
    ?>
    <textarea name="paradigm_theme_options[forms]"><?php echo esc_textarea($forms); ?></textarea>
    <?php
}

function paradigm_theme_display_background_color_field() {
    $options = get_option('paradigm_theme_options');
    $background_color = isset($options['background_color']) ? $options['background_color'] : '';
    ?>
    <input type="text" name="paradigm_theme_options[background_color]" value="<?php echo esc_attr($background_color); ?>" class="color-field">
    <?php
}

function paradigm_theme_display_font_color_field() {
    $options = get_option('paradigm_theme_options');
    $font_color = isset($options['font_color']) ? $options['font_color'] : '';
    ?>
    <input type="text" name="paradigm_theme_options[font_color]" value="<?php echo esc_attr($font_color); ?>" class="color-field">
    <?php
}

function paradigm_theme_validate_options($input) {
    $input['phone_number'] = sanitize_text_field($input['phone_number']);
    $input['location'] = sanitize_text_field($input['location']);
    $input['pay_online'] = sanitize_text_field($input['pay_online']);
    $input['forms'] = wp_kses_post($input['forms']);
    $input['background_color'] = sanitize_text_field($input['background_color']);
    $input['font_color'] = sanitize_text_field($input['font_color']);
    return $input;
}
