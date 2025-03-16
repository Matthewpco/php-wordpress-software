<?php 
    $eighth_section_first_h2 = get_option('poh_di_lpp_eighth_section_first_h2');
    $eighth_section_first_h3 = get_option('poh_di_lpp_eighth_section_first_h3');
    $eighth_section_first_list = get_option('poh_di_lpp_eighth_section_first_list');
    $eighth_section_second_h3 = get_option('poh_di_lpp_eighth_section_second_h3');
    $eighth_section_second_list = get_option('poh_di_lpp_eighth_section_second_list');
    $eighth_section_third_h3 = get_option('poh_di_lpp_eighth_section_third_h3');
    $eighth_section_third_list = get_option('poh_di_lpp_eighth_section_third_list');
?>
<!-- Begin eighth station -->
<section id="poh-di-lpp-eighth-section" class="section-padding">
    <div class="two-thirds-column">

      <h2>
         <?php
            if($eighth_section_first_h2) {
               echo $eighth_section_first_h2;
            }
         ?>
      </h2>
      
      <!-- Begin Bulleted Sections - FIRST -->
      <h3>
         <?php
            if($eighth_section_first_h3) {
               echo $eighth_section_first_h3;
            }
         ?>
      </h3>

      <ul>
         <?php
               
            if($eighth_section_first_list) {
               $items = explode(';', $eighth_section_first_list);
               foreach ($items as $item) {
                  echo '<li>' . $item . '</li>';
               }
            }
         ?>
      </ul>

      <!-- Second -->
      <h3>
         <?php
            if($eighth_section_second_h3) {
               echo $eighth_section_second_h3;
            }
         ?>
      </h3>
      
      <ul>
         <?php
               
            if($eighth_section_second_list) {
               $items = explode(';', $eighth_section_second_list);
               foreach ($items as $item) {
                  echo '<li>' . $item . '</li>';
               }
            }
         ?>
      </ul>

      <!-- Third -->
      <h3>
         <?php
            if($eighth_section_third_h3) {
               echo $eighth_section_third_h3;
            }
         ?>
      </h3>
      
      <ul>
         <?php
               
            if($eighth_section_third_list) {
               $items = explode(';', $eighth_section_third_list);
               foreach ($items as $item) {
                  echo '<li>' . $item . '</li>';
               }
            }
         ?>
      </ul>

   </div>

</section>