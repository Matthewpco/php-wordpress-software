<?php

function paradigm_doctor_slider_shortcode() {
    ob_start(); // Start output buffering

    ?>
    
    <!-- Begin meet the doctor -->
    <section class="display-flex template-meet-the-doctor">
        <div class="one-third-column image-meet-doctor" style="background-image: url('/wp-content/plugins/paradigm-doctor-slider/media/dr-1.png')">
            <!-- <img src="/wp-content/uploads/dr-vigliante.webp" class="image-meet-doctor" width=1200 height=1400 /> -->
        </div>
        <div class="two-thirds-column image-background-mtd">
            <h2 class="meet-dr-top-heading">Meet Doctor</h2>
            <h2 class="meet-dr-heading bold">Craig Vigliante, MD, DMD</h2>
            <img src="/wp-content/plugins/paradigm-doctor-slider/media/img-1.png" class="img-meet-dr-deco" width=200 height=20 alt="" />
            <p class="meet-dr-content padding-right-20 text-medium">Dr. Vigliante became interested in oral surgery after having double jaw surgery for his open bite. Since then, he’s dedicated himself to showing his patients the highest level of care possible. He’s certified by the American Board of Oral and Maxillofacial Surgeons and holds medical and dental licenses in Virginia. </p>
            <button class="white-orange-button"><a href="/about/meet-dr-vigliante" class="meet-dr-link bold">MEET DR. VIGLIANTE</a></button>
            <div class="display-flex previous-next-switches">
                <div class="display-flex one-fifth-column">
                    <button class="previous-dr meet-dr-button bold"><i class="fa-solid fa-arrow-left"></i></button>
                </div>
                <div class="display-flex three-fifths-column meet-dr-switches">
                    <button class="meet-dr-button bold" id="vigliante">DR. VIGLIANTE</button>
                    <button class="meet-dr-button bold" id="gocke">DR. GOCKE</button>
                    <button class="meet-dr-button bold" id="mcadams">DR. MCADAMS</button>
                </div>
                <div class="display-flex one-fifth-column">
                    <button class="next-dr meet-dr-button bold"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="sidebar-image-column">
        </div>
    </section>

    <?php

    return ob_get_clean(); // Return the form as a string
}
add_shortcode('paradigm_doctor_slider', 'paradigm_doctor_slider_shortcode');
