<!-- Begin Seventh section template part -->
<section id="seventh-section" class="section-padding">

    <div class="two-thirds-column">

        <h2>
            <?php
                $seventh_section_first_h2 = get_option('pohlp_seventh_section_first_h2');
                if($seventh_section_first_h2) {
                    echo $seventh_section_first_h2;
                }
            ?>
        </h2>
        <h3>$23,000-$27,000 <span>per arch</span></h3>
        <p>(includes everything from start to finish)</p>
        <a href="tel: 6163690360">
            <button>
                <?php 
                    $seventh_section_cta = get_option('pohlp_seventh_section_cta');
                    if($seventh_section_cta) {
                        echo $seventh_section_cta;
                    }
                ?>
            </button>
        </a>
        
        <div class="display-flex">
            <div class="one-half-column">
                <p class="padding-right-20 color-purple bold">For your convenience, we accept the following forms of payment:</p>
                <ul>
                    <li>Cash</li>
                    <li>Cashier's Check</li>
                    <li>Money Order</li>
                    <li>Debit Card</li>
                    <li>Visa</li>
                    <li>Master Card</li>
                    <li>Discover</li>
                    <li>American Express</li>
                </ul>
            </div>

            <div class="one-half-column">
                <p class="padding-right-20 color-purple bold">We also offer alternative financing and payment options:</p>
                <ul>
                    <li>Proceed Finance</li>
                    <li>Care Credit</li>
                    <li>Personal loans</li>
                    <li>401k</li>
                    <li>Home Equity Line of Credit</li>
                    <a href="https://www.carecredit.com/go/725JNS/"><img src="/wp-content/plugins/poh-landing-pages/inc/media/proceed-finance.webp" width="50%" alt="care-credit-logo"/></a>
                    <a href="https://www.carecredit.com/go/725JNS/"><img src="/wp-content/plugins/poh-landing-pages/inc/media/care-credit.webp" width="50%" alt="care-credit-logo"/></a>
                </ul>
                
            </div>
        </div>
    </div>

</section>