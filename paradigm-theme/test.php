<?php
/*
Template Name: test
*/

$options = get_option('paradigm_theme_options');
?>

<div class="header-info-bar">
    <div class="phone-number"><?php echo esc_html($options['phone_number']); ?></div>
    <div class="location"><?php echo esc_html($options['location']); ?></div>
    <div class="forms"><?php echo $options['forms']; ?></div>
    <div class="background-color"><?php echo esc_html($options['background_color']); ?></div>
    <div class="font-color"><?php echo $options['font_color']; ?></div>
</div>
