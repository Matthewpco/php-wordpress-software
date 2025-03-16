<?php 
    $contact_section_h2 = get_option('poh_di_lpp_contact_section_h2');
    $contact_section_phone_number = get_option('poh_di_lpp_contact_section_phone_number');
    $contact_section_address = get_option('poh_di_lpp_contact_section_address');
    $contact_section_button_text = get_option('poh_di_lpp_contact_section_button_text');
    $contact_section_img_url = get_option('poh_di_lpp_contact_section_img_url');
    $contact_section_img_alt = get_option('poh_di_lpp_contact_section_img_alt');
?>
<!-- Begin Contact us template part -->
<section id="poh-di-lpp-contact-section" class="section-padding">

   <div class="display-flex">

    <div class="one-half-column">
        <div>
            <h2>
                <?php
                    if($contact_section_h2) {
                        echo $contact_section_h2;
                    }
                ?>
            </h2>
            <p><i class="fa-solid fa-phone"></i><a href="tel: 
                <?php
                    if($contact_section_phone_number) {
                        echo $contact_section_phone_number;
                    }
                ?>
            ">
            <?php
                if($contact_section_phone_number) {
                    echo $contact_section_phone_number;
                }
            ?>
            </a></p>
            
            <address><i class="fa-solid fa-location-dot"></i>
                <?php
                    if($contact_section_address) {
                        echo $contact_section_address;
                    }
                ?>
            </address>
            
            <button>
                <?php
                    if($contact_section_button_text) {
                        echo $contact_section_button_text;
                    }
                ?>
            </button>

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