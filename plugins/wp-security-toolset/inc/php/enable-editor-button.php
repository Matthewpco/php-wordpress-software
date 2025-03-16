<?php
// Redirect non logged in users to coming soon template
if (get_option('wpst_enable_editor_button')) {
    add_filter("mce_buttons", "wpst_register_editor_button");
    add_filter("mce_external_plugins", "wpst_add_editor_plugin");
} else {
    remove_filter("mce_buttons", "wpst_register_editor_button");
    remove_filter("mce_external_plugins", "wpst_add_editor_plugin");
}

function wpst_register_editor_button($buttons) {
    array_push($buttons, "design_button"); // Add the new button here
    return $buttons;
}


function wpst_add_editor_plugin($plugin_array) {
    $plugin_array['design_button'] = plugins_url('js/register-editor-button.js', dirname((__FILE__))); // Path to the script for 'design_button'
    return $plugin_array;
}
