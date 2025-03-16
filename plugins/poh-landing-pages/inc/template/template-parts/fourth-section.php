<!-- Begin fourth section -->
<section id="fourth-section" class="section-padding">

    <div class="two-thirds-column">
        <h2>
            <?php
                $fourth_section_first_h2 = get_option('pohlp_fourth_section_first_h2');
                if($fourth_section_first_h2) {
                    echo $fourth_section_first_h2;
                }
            ?>
        </h2>
        <h3>Dr. Michael Shapiro</h3>
        <p>
            Dr. Michael Shapiro, a Long Island, New York native, stands at the forefront of oral surgery excellence in Cleveland, Ohio.
            Graduating with distinction, he obtained both his DDS and MA degrees from Columbia University.
            During his tenure at dental school, Dr. Shapiro was among a select few nationwide to undertake a concurrent Master of Science and Dental Education at Columbia University’s Teachers College, earning him the esteemed ADEA/Crest Oral-B Scholarship for Pre-doctoral Students.
        </p>
        <p>
            Continuing his journey, Dr. Shapiro pursued advanced training in Oral and Maxillofacial Surgery at Boston University. Amidst his residency, he authored nearly a dozen articles in esteemed peer-reviewed scientific journals and contributed a notable chapter on oral cancer management.
            Renowned for his dedication to dental implant surgery, Dr. Shapiro was granted funds by the Massachusetts Dental Society to establish a program delivering free dental implants to underserved communities.
            As a digital dental implantology trailblazer, Dr. Shapiro orchestrates over a thousand implants annually using his state-of-the-art CT-guided digital workflow, ensuring precise implant placement with minimal invasiveness.
        </p>
        <div class="display-flex">
            <div class="one-half-column">
                <div>
                    <img src="/wp-content/plugins/poh-landing-pages/inc/media/dr-shapiro-landing.webp" width="100%" />
                </div>
            </div>

            <div class="one-half-column padding-5">
                <h3 style="color: #322883;">Dr. Chad E. Rebhun</h3>
                <ul>
                    <?php
                        $fourth_section_list = get_option('pohlp_fourth_section_list');
                        if($fourth_section_list) {
                            $items = explode(';', $fourth_section_list);
                            foreach ($items as $item) {
                                echo '<li>' . $item . '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>

        
    </div>

</section>