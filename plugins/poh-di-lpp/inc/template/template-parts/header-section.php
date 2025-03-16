<?php
$poh_di_lpp_seo_title = get_option('poh_di_lpp_seo_title');
$poh_di_lpp_seo_description = get_option('poh_di_lpp_seo_description');
$poh_di_lpp_header_link_url = get_option('poh_di_lpp_header_link_url');
$poh_di_lpp_header_img_url = get_option('poh_di_lpp_header_img_url');
$poh_di_lpp_header_phone_number = get_option('poh_di_lpp_header_phone_number');
$poh_di_lpp_header_phone_number = get_option('poh_di_lpp_header_phone_number');
?>
<!-- Begin landing page header -->
<!doctype html>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>
            <?php
                if($poh_di_lpp_seo_title) {
                    echo $poh_di_lpp_seo_title;
                }
            ?>
        </title>
        <meta name="description" content="
            <?php
                if($poh_di_lpp_seo_description) {
                    echo $poh_di_lpp_seo_description;
                }
            ?>
        ">
        <meta name="robots" content="noindex">
        <?php wp_head(); ?>
    </head>


    <body id="poh-di-lpp-body">

        <?php wp_body_open(); ?>

        <header id="poh-di-lpp-header" class="display-flex">
            <div class="one-quarter-column">
                <a href="
                    <?php
                        if($poh_di_lpp_header_link_url) {
                            echo $poh_di_lpp_header_link_url;
                        }
                    ?>
                ">
                <img src="
                    <?php
                        if($poh_di_lpp_header_img_url) {
                            echo $poh_di_lpp_header_img_url;
                        }
                    ?>
                " alt="Paradigm oral health landing page logo" width="300px" /></a>
            </div>

            <div class="three-quarters-column justify-content-flex-end display-flex align-items-center">
                <a href="tel:
                    <?php
                        if($poh_di_lpp_header_phone_number) {
                            echo $poh_di_lpp_header_phone_number;
                        }
                    ?>
                "><button class="secondary-btn"><i class="fa-solid fa-phone" style="margin-right: 8px;"></i>
                <?php
                    if($poh_di_lpp_header_phone_number) {
                        echo $poh_di_lpp_header_phone_number;
                    }
                ?>
                </button></a>
            </div>
        </header>