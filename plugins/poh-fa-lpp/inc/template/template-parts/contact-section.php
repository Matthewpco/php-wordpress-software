<?php 
    $contact_section_h2 = get_option('poh_fa_lpp_contact_section_h2');
    $contact_section_name_list = get_option('poh_fa_lpp_contact_section_name_list');
    $contact_section_address_list = get_option('poh_fa_lpp_contact_section_address_list');
    $contact_section_phone_list = get_option('poh_fa_lpp_contact_section_phone_list');
    $contact_section_button_text = get_option('poh_fa_lpp_contact_section_button_text');
    $contact_section_button_link = get_option('poh_fa_lpp_contact_section_button_link');
    $contact_section_p = get_option('poh_fa_lpp_contact_section_p');
    $contact_section_img_url = get_option('poh_fa_lpp_contact_section_img_url');
    $contact_section_img_alt = get_option('poh_fa_lpp_contact_section_img_alt');
?>
<!-- Begin Contact us template part -->
<section id="poh-fa-lpp-contact-section">

   <div class="display-flex">

    <div class="one-half-column section-padding">
        <div>
            <h2>
                <?php
                    if($contact_section_h2) {
                        echo $contact_section_h2;
                    }
                ?>
            </h2>
            <div class="display-flex">
                <?php
                    ob_start();
                    if($contact_section_name_list && $contact_section_address_list) {
                        $name_list = explode(';', $contact_section_name_list);
                        $address_list = explode(';', $contact_section_address_list);
                        $phone_list = $contact_section_phone_list ? explode(';', $contact_section_phone_list) : array();
                        
                        for ($x = 0; $x < count($name_list); $x++) {
                            $name = $name_list[$x];
                            $address = $address_list[$x];
                            $phone = isset($phone_list[$x]) ? $phone_list[$x] : null;
                            
                            ?>
                                <div class="one-half-column">
                                    <p><?php echo $name; ?></p>

                                    <?php
                                        if($phone) {
                                            ?>
                                                <p><i class="fa-solid fa-phone"></i><a href="tel:<?php echo $phone; ?>"></a><?php echo $phone; ?></p>
                                            <?php
                                        }
                                    ?>

                                    <?php
                                        if($address) {
                                            ?>
                                                <address><i class="fa-solid fa-location-dot"></i><?php echo $address; ?></address>
                                            <?php
                                        }
                                    ?>
                                    
                
                                    
                                </div>

                            <?php
                        }
                    }
                    echo ob_get_clean();
                ?>
            </div>

            <?php
                if($contact_section_button_text && $contact_section_button_link) {
                    ?>
                        <a href="tel:<?php echo $contact_section_button_link; ?>">
                            <button type="button"><?php echo $contact_section_button_text; ?></button>
                        </a>
                    <?php
                }
            ?>
            


        </div>
    </div>

    <div class="one-half-column">
       <img src="
        <?php
            if($contact_section_img_url) {
                echo $contact_section_img_url;
            }
        ?>
       " alt="
       <?php
            if($contact_section_img_alt) {
                echo $contact_section_img_alt;
            }
        ?>
       " width="600px">
    </div>

</div>

        
</section>