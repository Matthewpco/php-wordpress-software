<?php
// Function to handle the shortcode
function poh_landing_page_a_doctor_switcher_shortcode() {
        
    $image_urls = get_option('poh_di_a_lpp_doctor_switcher_image_urls');
    $image_urls_array = explode(';', $image_urls);
    $dr_names = get_option('poh_di_a_lpp_doctor_switcher_dr_names');
    $dr_names_array = explode(';', $dr_names);
    $dr_descriptions = get_option('poh_di_a_lpp_doctor_switcher_dr_descriptions');
    $dr_descriptions_array = explode(';', $dr_descriptions);

    ob_start();
    ?>

    <div id="poh-doctor-switcher-cards-container">
        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const image_urls_array = <?php echo json_encode($image_urls_array); ?>;
            const dr_names_array = <?php echo json_encode($dr_names_array); ?>;
            const dr_descriptions_array = <?php echo json_encode($dr_descriptions_array); ?>;

            const cardsContainer = document.querySelector("#poh-doctor-switcher-cards-container");

            dr_names_array.forEach((doctorsName, doctorsIndex) => {

                const card = document.createElement('div');
                card.classList.add('poh-doctor-switcher-card');
                card.innerHTML = `
                
                <img src="${image_urls_array[doctorsIndex]}" alt="${doctorsName}" width="625" height="350">

                <h3>${doctorsName}</h3>
                <p>${dr_descriptions_array[doctorsIndex]}</p>
                
                `;
                cardsContainer.appendChild(card)
            });    

        });
    </script>

    <?php
    return ob_get_clean();
            
} 

add_shortcode('poh_landing_page_a_doctor_switcher', 'poh_landing_page_a_doctor_switcher_shortcode');