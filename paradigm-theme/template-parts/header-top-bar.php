<?php
/**
 * The template for displaying header top info bar
 */
$options = get_option('paradigm_theme_options');
$phone_number = isset($options['phone_number']) ? $options['phone_number'] : '';
$location = isset($options['location']) ? $options['location'] : '';
$pay_online = isset($options['pay_online']) ? $options['pay_online'] : '';
$forms = isset($options['forms']) ? $options['forms'] : '';
$background_color = isset($options['background_color']) ? $options['background_color'] : '';
$font_color = isset($options['font_color']) ? $options['font_color'] : '';
?>

<!-- Begin header top bar -->
<section id="header-top-bar" class="display-flex justify-content-flex-end align-items-center" style="background-color:<?php echo esc_html($background_color); ?>;">

    <?php 
        if (!empty($phone_number)) { ?>

            <a href="tel:<?php echo esc_attr($phone_number); ?>" aria-label="Call us at <?php echo esc_html($phone_number); ?>" style="color:<?php echo esc_html($font_color); ?>;">
                <i class="fa-solid fa-phone"></i><?php echo esc_html($phone_number); ?>
            </a>

        <?php 
        } 
    ?>

    <?php
        if (!empty($location)) { ?>
            <!-- Locations menu attributes besides for id are to be removed when this element does not have a drop down menu -->
            <!-- If you decide to substitute the anchor tag below the address element with a span element then you should add tabindex="0" to the address element so that it can be focused on -->
            <address id="top-bar-dropdown" role="button" aria-expanded="false" aria-label="Locations Menu">
                
                <a href="/contact" style="color:<?php echo esc_html($font_color); ?>;" aria-label="Our location: <?php echo esc_html($location); ?>">
                    <i class="fa-solid fa-location-dot"></i><?php echo esc_html($location); ?>
                </a>

                <ul class="submenu" role="none">
                    <li>
                        <a href="/contact/kennett-square-office">
                            <p>Kennet Square Office</p>
                            <p><u>(610) 431-2161</u> <i class="fa-solid fa-arrow-right-long"></i></p>
                        </a>
                    </li>
                    <li>
                        <a href="/contact/west-chester-office">
                            <p>West Chester</p>
                            <p><u>(610) 431-2161</u> <i class="fa-solid fa-arrow-right-long"></i></p>
                        </a>
                    </li>
                    <li>
                        <a href="/contact/wayne-office">
                            <p>Wayne</p>
                            <p><u>(610) 431-2161</u> <i class="fa-solid fa-arrow-right-long"></i></p>
                        </a>
                    </li>      
                </ul>
                
            </address>

        <?php
        }
    ?>

    <?php
        if (!empty($pay_online)) { ?>
                
                <a href="<?php echo esc_html($pay_online); ?>" style="color:<?php echo esc_html($font_color); ?>;">
                    <?php echo esc_html($pay_online); ?>
                </a>

        <?php
        }
    ?>

    <?php
        if (!empty($forms)) { ?>
            <a href="<?php echo esc_html($forms); ?>" style="color:<?php echo esc_html($font_color); ?>;" target="_blank" aria-label="Visit our Patient Portal / Forms">
                <i class="fa-solid fa-clipboard"></i>Patient Portal / Forms
            </a>
        <?php
        }
    ?>

</section><!-- End header top bar -->