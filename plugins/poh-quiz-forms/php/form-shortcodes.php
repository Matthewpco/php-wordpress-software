<?php

function poh_quiz_form_a_shortcodes_csrf_token() {
    global $csrf_token;
    $csrf_token = poh_quiz_form_a_generate_token(); // Generate the CSRF token
}
add_action('plugins_loaded', 'poh_quiz_form_a_shortcodes_csrf_token');


// Create shortcode for poh-quiz-form-a CURRENT ONE IN USE
function poh_quiz_form_a_landing_quiz_shortcode() {
    ob_start();
    global $csrf_token;
    ?>

    <div id="poh-quiz-form-a-container">
        
        <form id="poh-quiz-form-a">
            <!-- This is the honeypot field -->
            <div style="display: none;">
                <label for="fax">Fax (do not fill out)</label>
                <input type="text" id="fax" name="fax">
                <input type="text" id="poh-quiz-form-a" name="poh-quiz-form-a" value="poh-quiz-form-a">
                <input type="hidden" id="quiz-score" name="quiz-score" value="">
                <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $csrf_token; ?>">
            </div>

            <h2 id="poh-quiz-form-a-heading" >Take Our 1-Minute Quiz</h2>
            <h2 id="poh-quiz-form-a-sub-heading">Find Out if You’re Eligible for Smile Restoration</h2>


            <div class="quiz-question-container">

                <div class="quiz-question">
                    <p>On a scale of 1-4, how confident are you when you smile right now?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="how-confident-are-you-when-you-smile" value="Not confident" data-points="10" >Not confident
                    </label><br>
                    <label>
                        <input type="radio" name="how-confident-are-you-when-you-smile" value="Somewhat confident" data-points="3" >Somewhat confident
                    </label><br>
                    <label>
                        <input type="radio" name="how-confident-are-you-when-you-smile" value="Confident" data-points="2" >Confident
                    </label><br>
                    <label>
                        <input type="radio" name="how-confident-are-you-when-you-smile" value="Very confident" data-points="1" >Very confident
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>How many missing or failing teeth do you have?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="how-many-missing-or-failing-teeth-do-you-have" value="1-2" data-points="2"> Yes, 1-2 teeth
                    </label><br>
                    <label>
                        <input type="radio" name="how-many-missing-or-failing-teeth-do-you-have" value="3-5" data-points="3"> Yes, 3-5 teeth
                    </label><br>
                    <label>
                        <input type="radio" name="how-many-missing-or-failing-teeth-do-you-have" value="6+" data-points="5"> Yes, 6+ teeth
                    </label><br>
                    <label>
                        <input type="radio" name="how-many-missing-or-failing-teeth-do-you-have" value="all" data-points="10"> I’m missing all my teeth
                    </label><br><br>
                </div>
            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>How old are you?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="how-old-are-you" value="65+" data-points="5"> 65+
                    </label><br>
                    <label>
                        <input type="radio" name="how-old-are-you" value="56-64" data-points="10"> 56-65
                    </label><br>
                    <label>
                        <input type="radio" name="how-old-are-you" value="46-55" data-points="3"> 46-55
                    </label><br>
                    <label>
                        <input type="radio" name="how-old-are-you" value="under 45" data-points="2">under 45
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>Which of these tooth replacement options best describes what you currently have?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="Dentures" data-points="4">Dentures
                    </label><br>
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="Partial denture" data-points="3">Partial denture
                    </label><br>
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="Bridge or crown" data-points="2">Bridge or crown
                    </label><br>
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="Dental implants" data-points="1">Dental implants
                    </label><br>
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="None of the above" data-points="5">None of the above
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>Do you have trouble eating hard or sticky foods?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="do-you-have-trouble-eating-hard-or-sticky-foods" value="yes" data-points="5">Yes
                    </label><br>
                    <label>
                        <input type="radio" name="do-you-have-trouble-eating-hard-or-sticky-foods" value="no" data-points="0">No
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>How long have you been dealing with missing or failing teeth?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="how-long-have-you-been-dealing-with-missing-or-failing-teeth" value="under one year" data-points="2">Under one year
                    </label><br>
                    <label>
                        <input type="radio" name="how-long-have-you-been-dealing-with-missing-or-failing-teeth" value="1-2 years ago" data-points="3">1-2 years
                    </label><br>
                    <label>
                        <input type="radio" name="how-long-have-you-been-dealing-with-missing-or-failing-teeth" value="more than two years ago" data-points="5">More than three years
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>When was the last time you saw a dentist?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="when-was-the-last-time-you-saw-a-dentist" value="Less than one year ago" data-points="2">Less than one year ago
                    </label><br>
                    <label>
                        <input type="radio" name="when-was-the-last-time-you-saw-a-dentist" value="1-2 years ago" data-points="3">1-2 years ago
                    </label><br>
                    <label>
                        <input type="radio" name="when-was-the-last-time-you-saw-a-dentist" value="More than two years ago" data-points="5">More than two years ago
                    </label><br>
                    <br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div id="final-score-question" class="quiz-question">
                    <p>Pricing for dental implants depends on a unique patient’s needs. To help you cover expenses, we provide accessible third-party financing. How ready are you to make the investment in your forever-smile?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="pricing-for-dental-implants-depends-on-a-patients-unique-needs-how-ready-are-you-to-make-the-investment-in-your-forever-smile" value="Not ready" data-points="1">Not ready
                    </label><br>
                    <label>
                        <input type="radio" name="pricing-for-dental-implants-depends-on-a-patients-unique-needs-how-ready-are-you-to-make-the-investment-in-your-forever-smile" value="Somewhat ready" data-points="3">Somewhat ready
                    </label><br>
                    <label>
                        <input type="radio" name="pricing-for-dental-implants-depends-on-a-patients-unique-needs-how-ready-are-you-to-make-the-investment-in-your-forever-smile" value="Ready" data-points="4">Ready
                    </label><br>
                    <label>
                        <input type="radio" name="pricing-for-dental-implants-depends-on-a-patients-unique-needs-how-ready-are-you-to-make-the-investment-in-your-forever-smile" value="Very ready" data-points="10">Very ready
                    </label><br>
                    <br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div id="collaborate-question" class="quiz-question">
                    <p>Do you have a dentist you would like for us to collaborate with?</p>
                </div>

                <div id="collaborate-answer" class="quiz-answer">
                    <label>
                        <input type="radio" name="do-you-have-a-dentist-you-would-like-for-us-to-collaborate-with" value="No" data-points="0">No
                    </label><br>
                    <label>
                        <input type="radio" name="do-you-have-a-dentist-you-would-like-for-us-to-collaborate-with" value="Yes" data-points="0">Yes
                    </label><br>
                    <br>
                </div>

            </div>


            <div id="collab-extra-question-container" class="hidden quiz-question-container">

                <div id="collab-extra-question" class="quiz-question">
                    <p>Please enter the name of the Dentist you would like for us to collaborate with.</p>
                </div>

                <div id="collaborate-answer" class="quiz-answer">
                    <label>
                        <input type="text" name="dentist-to-collaborate-with" data-points="0">
                    </label><br>
                    <br>

                    <button class="paradigm-forms-quiz-button" onclick="nextButtonTrigger(event)" id="doctor-colab">Next Question</button>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>What is your single biggest challenge or obstacle when it comes to your smile right now?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <textarea name="what-is-your-single-biggest-challenge-or-obstacle-when-it-comes-to-your-smile-right-now" data-points="0" rows="4" cols="50"></textarea>
                    </label><br>
                    <br>

                    <button class="paradigm-forms-quiz-button" onclick="nextButtonTrigger(event)">Next Question</button>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>To get your results, enter your contact information to see which solution is best for you.</p>
                </div>

                <div id="quiz-multi-answer" class="quiz-answer">
                    <label>What is your first name?<br>
                        <input type="text" id="quiz-a-first-name" name="first-name" data-points="0" required>
                    </label><br>
                    <label>What is your last name?<br>
                        <input type="text" id="quiz-a-last-name" name="last-name" data-points="0" required>
                    </label><br>
                    <label>What is your email?<br>
                        <input type="email" id="quiz-a-email" name="email" data-points="0" required>
                    </label><br>
                    <label>What is your phone number?<br>
                        <input type="tel" id="quiz-a-phone-number" name="phone-number" data-points="0" required>
                    </label><br>
                    <label>Do you have a preferred location?<br>
                        <input type="text" id="quiz-a-location" name="preferred-location" data-points="0">
                    </label><br>
                    <br>

                    <button id="multi-quiz-answer-button" class="paradigm-forms-quiz-button" onclick="nextButtonTrigger(event)">Next Question</button>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div id="final-question" class="quiz-question">
                    <p>Is there anything else you’d like to share with us about the condition of your teeth? We’d like to hear anything else about your smile that you think is important.</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <textarea name="is-there-anything-else-youd-like-to-share-with-us-about-the-condition-of-your-teeth-wed-like-to-hear-anything-else-about-your-smile-that-you-think-is-important" data-points="0" rows="4" cols="50"></textarea>
                    </label><br><br>

                    <input type="submit" value="Submit">
                </div>

            </div>

            <p>We value your trust. By proceeding you agree to our Terms and Conditions and confirm you have read and understand our Privacy Policy, and you consent to receive emails, SMS and calls about your situation.</p>
        
        </form>

        <div id="low-rank-results" class="hidden results-modal">
            <div class="results-modal-content">
                <h1>Congratulations, You’re On Your Way To A Healthier Smile!</h1>
                <p style="font-weight: bold;">It looks like you may be a candidate for dental implants, but we’d like to learn a bit more about you first.</p>
                <p>
                The next step is to speak with one of our dental implant experts, they’ll reach out to you within 48 hours. During the call, they may ask you a few more questions to see how we can best support you. They can also help with scheduling an initial appointment or provide guidance on how to achieve your smile goals. We’re here to answer all of your dental implant questions. Talk to you soon!
                </p>
                <a href="tel:+0000000000"><button >(000) 000 0000</button></a>
            </div>
        </div>

        <div id="medium-rank-results" class="hidden results-modal">
            <div class="results-modal-content">
                <h1>Congratulations, You’re On Your Way To A Healthier Smile!</h1>
                <p style="font-weight: bold;">It looks like you could be a good candidate for dental implants.</p>
                <p>
                The next step is to speak with one of our dental implant experts, they’ll reach out to you within 24-48 hours. During the call, they’ll walk you through the process of scheduling an initial consultation to meet with one of our esteemed oral surgeons. Together, they’ll work with you to create a personalized treatment plan to best support your smile goals. When you speak with the dental implant expert, you can expect to receive a general overview of the process for scheduling, treatment, as well as how we can collaborate with your general dentist. We’re here to answer all of your dental implant questions. Talk to you soon!
                </p>
                <a href="tel:+0000000000"><button >(000) 000 0000</button></a>
            </div>
        </div>

        <div id="high-rank-results" class="hidden results-modal">
            <div class="results-modal-content">
                <h1>Congratulations, You’re On Your Way To A Healthier Smile!</h1>
                <p style="font-weight: bold;">It looks like you’re a great candidate for dental implants.</p>
                <p>
                The next step is to speak with one of our dental implant experts, they’ll reach out to you within 24 hours. During the call, they’ll walk you through the process of scheduling an initial consultation to meet with one of our esteemed oral surgeons[or insert specific doctor’s name here]. Together, they’ll work with you to create a personalized treatment plan to best support your smile goals. When you speak with the dental implant expert, you can expect to receive a general overview of the process for scheduling, treatment, as well as how we can collaborate with your general dentist. We’re here to answer all of your dental implant questions. Talk to you soon!
                </p>
                <a href="tel:+0000000000"><button >(000) 000 0000</button></a>
            </div>
        </div>

        <script>
            // Create a points counter and add the clicked buttons points
            let pointsCounter = 0;
            // Create a value for if the collobrate question is yes or no
            let extraQuestionVal = false;
            // Value for points rank
            let clientRank = document.querySelector("#quiz-score");
            
            // Function that returns false is contact fields are empty and returns true if all fields are not empty
            function validateContactInfo(parentElement) {

                // Get specific input fields
                let firstName = parentElement.querySelector("#quiz-a-first-name");
                let lastName = parentElement.querySelector("#quiz-a-last-name");
                let email = parentElement.querySelector("#quiz-a-email");
                let phoneNumber = parentElement.querySelector("#quiz-a-phone-number");
                // Create an array to loop through
                let allFields = [firstName, lastName, email, phoneNumber];

                // Loop through all fields and make sure they are not empty if they are return false
                for (field of allFields) {

                    if (!field.value) {
                        alert(`Please fill out the required fields ${field.name} to proceed.`);
                        return false;
                    }

                }

                // Check email address is valid
                if (!email.value.includes('@')) {
                    alert('Please input a valid email address to proceed.')
                    return false;
                } 

                // Check phone number is valid
                phoneNumberIsNaN = isNaN(phoneNumber.value);
                if (phoneNumberIsNaN == true) {
                    alert('Please fill in your phone number without any special characters to proceed.');
                    return false;
                } 


                // If nothing else returned false everything is valid so return true
                return true;

            }
            
            // Function to trigger form questions without radio buttons
            function nextButtonTrigger(event) {
                // Stop form from submitting
                event.preventDefault();

                // Set to true to allow for the first question without contact info to work as normal
                let formsValidated = true;
                
                // Reset containers for current location
                currentContainer = event.target.closest('.quiz-question-container');
                nextContainer = currentContainer.nextElementSibling;


                // If currentContainer contains #multi-quiz-answers then console log that element
                const multiQuizAnswers = currentContainer.querySelector('#quiz-multi-answer');
                if (multiQuizAnswers) {
                    
                    // create a variable to hold a true or false return from the function
                    let isFormValid = validateContactInfo(multiQuizAnswers);

                    if (isFormValid == true) {
                        formsValidated = true;
                    } else {
                        formsValidated = false;
                    }
                }

                if (formsValidated == true) {
                    // Call the next question function with the present containers
                    nextQuestion(currentContainer, nextContainer);
                }

                
            }


            // Function to handle async switching animations using the current question container to fade out and the next container to fade in
            function nextQuestion(currentContainer, nextContainer) {

                currentContainer.classList.add('fade-out');
                currentContainer.addEventListener('animationend', function handleAnimationEnd() {
                    currentContainer.classList.add('hidden');
                    currentContainer.classList.remove('fade-out');
                    nextContainer.classList.remove('hidden');
                    nextContainer.classList.add('fade-in');
                    nextContainer.addEventListener('animationend', function handleFadeInEnd() {
                        nextContainer.classList.remove('fade-in');
                        nextContainer.removeEventListener('animationend', handleFadeInEnd);
                    });
                    currentContainer.removeEventListener('animationend', handleAnimationEnd);
                });
            }


            document.querySelectorAll('input[type="radio"]').forEach(button => {
                button.addEventListener('click', function() {
                    // Add the data points from the clicked element to our counter
                    pointsCounter += parseInt(button.getAttribute('data-points'));
                    // Reset containers for current location
                    let currentContainer = this.closest('.quiz-question-container');
                    let nextContainer = currentContainer.nextElementSibling;


                    // If we are at colaborate question handle it differently if yes selected
                    if (nextContainer.querySelector('#collaborate-question')) {
                        let labels = document.querySelectorAll('#collaborate-answer label');
                        labels.forEach(label => {
                            label.addEventListener("click", function() {
                                let radioInput = label.querySelector('input[type="radio"]');
                                if (radioInput) {
                                    if (radioInput.value == 'Yes') {
                                        extraQuestionVal = true;
                                        skipContainer = nextContainer.nextElementSibling;
                                        nextQuestion(nextContainer, skipContainer);
                                    }
                                    else {
                                        skipContainer = nextContainer.nextElementSibling;
                                        skipSkipContainer = skipContainer.nextElementSibling;
                                        skipContainer.style.display = "none";
                                        nextQuestion(nextContainer, skipSkipContainer);
                                    }
                                }
                            })
                        })
                    }


                    // if we are at final question then set clientRank based on score
                    if (currentContainer.querySelector('#final-score-question')) {

                        if (pointsCounter < 20) {
                            clientRank.value = pointsCounter;
                        } 
                        
                        else if (pointsCounter < 40) {
                            clientRank.value = pointsCounter;
                        }

                        else if (pointsCounter > 39) {
                            clientRank.value = pointsCounter;
                        }

                    } 


                    if (nextContainer) {
                        // Check for the extra question to stay false to continue the loop for next question
                        if (extraQuestionVal === false) {
                            nextQuestion(currentContainer, nextContainer);
                        } 
                    }

                });
            });
        </script>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('poh_quiz_form_a_landing_quiz', 'poh_quiz_form_a_landing_quiz_shortcode');


// Create shortcode for poh-quiz-form-a CURRENT ONE IN USE
function poh_quiz_form_a_two_landing_quiz_shortcode() {
    ob_start();
    global $csrf_token;
    ?>

    <div id="poh-quiz-form-a-container">
        
        <form id="poh-quiz-form-a">
            <!-- This is the honeypot field -->
            <div style="display: none;">
                <label for="fax">Fax (do not fill out)</label>
                <input type="text" id="fax" name="fax">
                <input type="text" id="poh-quiz-form-a" name="poh-quiz-form-a" value="poh-quiz-form-a">
                <input type="hidden" id="quiz-score" name="quiz-score" value="">
                <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $csrf_token; ?>">
            </div>

            <h2 id="poh-quiz-form-a-heading" >Take Our 1-Minute Quiz</h2>
            <h2 id="poh-quiz-form-a-sub-heading">Find Out if You’re Eligible for Smile Restoration</h2>


            <div class="quiz-question-container">

                <div class="quiz-question">
                    <p>On a scale of 1-4, how confident are you when you smile right now?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="how-confident-are-you-when-you-smile" value="Not confident" data-points="10" >Not confident
                    </label><br>
                    <label>
                        <input type="radio" name="how-confident-are-you-when-you-smile" value="Somewhat confident" data-points="3" >Somewhat confident
                    </label><br>
                    <label>
                        <input type="radio" name="how-confident-are-you-when-you-smile" value="Confident" data-points="2" >Confident
                    </label><br>
                    <label>
                        <input type="radio" name="how-confident-are-you-when-you-smile" value="Very confident" data-points="1" >Very confident
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>How many missing or failing teeth do you have?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="how-many-missing-or-failing-teeth-do-you-have" value="1-2" data-points="2"> Yes, 1-2 teeth
                    </label><br>
                    <label>
                        <input type="radio" name="how-many-missing-or-failing-teeth-do-you-have" value="3-5" data-points="3"> Yes, 3-5 teeth
                    </label><br>
                    <label>
                        <input type="radio" name="how-many-missing-or-failing-teeth-do-you-have" value="6+" data-points="5"> Yes, 6+ teeth
                    </label><br>
                    <label>
                        <input type="radio" name="how-many-missing-or-failing-teeth-do-you-have" value="all" data-points="10"> I’m missing all my teeth
                    </label><br><br>
                </div>
            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>To get your results, enter your contact information to see which solution is best for you.</p>
                </div>

                <div id="quiz-multi-answer" class="quiz-answer">
                    <label>What is your first name?<br>
                        <input type="text" id="quiz-a-first-name" name="first-name" data-points="0" required>
                    </label><br>
                    <label>What is your last name?<br>
                        <input type="text" id="quiz-a-last-name" name="last-name" data-points="0" required>
                    </label><br>
                    <label>What is your email?<br>
                        <input type="email" id="quiz-a-email" name="email" data-points="0" required>
                    </label><br>
                    <label>What is your phone number?<br>
                        <input type="tel" id="quiz-a-phone-number" name="phone-number" data-points="0" required>
                    </label><br>
                    <label>Do you have a preferred location?<br>
                        <input type="text" id="quiz-a-location" name="preferred-location" data-points="0">
                    </label><br>
                    <br>

                    <button id="multi-quiz-answer-button" class="paradigm-forms-quiz-button" onclick="nextButtonTrigger(event)">Next Question</button>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>How old are you?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="how-old-are-you" value="65+" data-points="5"> 65+
                    </label><br>
                    <label>
                        <input type="radio" name="how-old-are-you" value="56-64" data-points="10"> 56-65
                    </label><br>
                    <label>
                        <input type="radio" name="how-old-are-you" value="46-55" data-points="3"> 46-55
                    </label><br>
                    <label>
                        <input type="radio" name="how-old-are-you" value="under 45" data-points="2">under 45
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>Which of these tooth replacement options best describes what you currently have?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="Dentures" data-points="4">Dentures
                    </label><br>
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="Partial denture" data-points="3">Partial denture
                    </label><br>
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="Bridge or crown" data-points="2">Bridge or crown
                    </label><br>
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="Dental implants" data-points="1">Dental implants
                    </label><br>
                    <label>
                        <input type="radio" name="which-of-these-tooth-replacement-options-best-describes-what-you-currently-have" value="None of the above" data-points="5">None of the above
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>Do you have trouble eating hard or sticky foods?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="do-you-have-trouble-eating-hard-or-sticky-foods" value="yes" data-points="5">Yes
                    </label><br>
                    <label>
                        <input type="radio" name="do-you-have-trouble-eating-hard-or-sticky-foods" value="no" data-points="0">No
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>How long have you been dealing with missing or failing teeth?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="how-long-have-you-been-dealing-with-missing-or-failing-teeth" value="under one year" data-points="2">Under one year
                    </label><br>
                    <label>
                        <input type="radio" name="how-long-have-you-been-dealing-with-missing-or-failing-teeth" value="1-2 years ago" data-points="3">1-2 years
                    </label><br>
                    <label>
                        <input type="radio" name="how-long-have-you-been-dealing-with-missing-or-failing-teeth" value="more than two years ago" data-points="5">More than three years
                    </label><br><br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>When was the last time you saw a dentist?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="when-was-the-last-time-you-saw-a-dentist" value="Less than one year ago" data-points="2">Less than one year ago
                    </label><br>
                    <label>
                        <input type="radio" name="when-was-the-last-time-you-saw-a-dentist" value="1-2 years ago" data-points="3">1-2 years ago
                    </label><br>
                    <label>
                        <input type="radio" name="when-was-the-last-time-you-saw-a-dentist" value="More than two years ago" data-points="5">More than two years ago
                    </label><br>
                    <br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div id="final-score-question" class="quiz-question">
                    <p>Pricing for dental implants depends on a unique patient’s needs. To help you cover expenses, we provide accessible third-party financing. How ready are you to make the investment in your forever-smile?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <input type="radio" name="pricing-for-dental-implants-depends-on-a-patients-unique-needs-how-ready-are-you-to-make-the-investment-in-your-forever-smile" value="Not ready" data-points="1">Not ready
                    </label><br>
                    <label>
                        <input type="radio" name="pricing-for-dental-implants-depends-on-a-patients-unique-needs-how-ready-are-you-to-make-the-investment-in-your-forever-smile" value="Somewhat ready" data-points="3">Somewhat ready
                    </label><br>
                    <label>
                        <input type="radio" name="pricing-for-dental-implants-depends-on-a-patients-unique-needs-how-ready-are-you-to-make-the-investment-in-your-forever-smile" value="Ready" data-points="4">Ready
                    </label><br>
                    <label>
                        <input type="radio" name="pricing-for-dental-implants-depends-on-a-patients-unique-needs-how-ready-are-you-to-make-the-investment-in-your-forever-smile" value="Very ready" data-points="10">Very ready
                    </label><br>
                    <br>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div id="collaborate-question" class="quiz-question">
                    <p>Do you have a dentist you would like for us to collaborate with?</p>
                </div>

                <div id="collaborate-answer" class="quiz-answer">
                    <label>
                        <input type="radio" name="do-you-have-a-dentist-you-would-like-for-us-to-collaborate-with" value="No" data-points="0">No
                    </label><br>
                    <label>
                        <input type="radio" name="do-you-have-a-dentist-you-would-like-for-us-to-collaborate-with" value="Yes" data-points="0">Yes
                    </label><br>
                    <br>
                </div>

            </div>


            <div id="collab-extra-question-container" class="hidden quiz-question-container">

                <div id="collab-extra-question" class="quiz-question">
                    <p>Please enter the name of the Dentist you would like for us to collaborate with.</p>
                </div>

                <div id="collaborate-answer" class="quiz-answer">
                    <label>
                        <input type="text" name="dentist-to-collaborate-with" data-points="0">
                    </label><br>
                    <br>

                    <button class="paradigm-forms-quiz-button" onclick="nextButtonTrigger(event)" id="doctor-colab">Next Question</button>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div class="quiz-question">
                    <p>What is your single biggest challenge or obstacle when it comes to your smile right now?</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <textarea name="what-is-your-single-biggest-challenge-or-obstacle-when-it-comes-to-your-smile-right-now" data-points="0" rows="4" cols="50"></textarea>
                    </label><br>
                    <br>

                    <button class="paradigm-forms-quiz-button" onclick="nextButtonTrigger(event)">Next Question</button>
                </div>

            </div>


            <div class="hidden quiz-question-container">

                <div id="final-question" class="quiz-question">
                    <p>Is there anything else you’d like to share with us about the condition of your teeth? We’d like to hear anything else about your smile that you think is important.</p>
                </div>

                <div class="quiz-answer">
                    <label>
                        <textarea name="is-there-anything-else-youd-like-to-share-with-us-about-the-condition-of-your-teeth-wed-like-to-hear-anything-else-about-your-smile-that-you-think-is-important" data-points="0" rows="4" cols="50"></textarea>
                    </label><br><br>

                    <input type="submit" value="Submit">
                </div>

            </div>

            <p>We value your trust. By proceeding you agree to our Terms and Conditions and confirm you have read and understand our Privacy Policy, and you consent to receive emails, SMS and calls about your situation.</p>
        
        </form>

        <div id="low-rank-results" class="hidden results-modal">
            <div class="results-modal-content">
                <h1>Congratulations, You’re On Your Way To A Healthier Smile!</h1>
                <p style="font-weight: bold;">It looks like you may be a candidate for dental implants, but we’d like to learn a bit more about you first.</p>
                <p>
                The next step is to speak with one of our dental implant experts, they’ll reach out to you within 48 hours. During the call, they may ask you a few more questions to see how we can best support you. They can also help with scheduling an initial appointment or provide guidance on how to achieve your smile goals. We’re here to answer all of your dental implant questions. Talk to you soon!
                </p>
                <a href="tel:+0000000000"><button >(000) 000 0000</button></a>
            </div>
        </div>

        <div id="medium-rank-results" class="hidden results-modal">
            <div class="results-modal-content">
                <h1>Congratulations, You’re On Your Way To A Healthier Smile!</h1>
                <p style="font-weight: bold;">It looks like you could be a good candidate for dental implants.</p>
                <p>
                The next step is to speak with one of our dental implant experts, they’ll reach out to you within 24-48 hours. During the call, they’ll walk you through the process of scheduling an initial consultation to meet with one of our esteemed oral surgeons. Together, they’ll work with you to create a personalized treatment plan to best support your smile goals. When you speak with the dental implant expert, you can expect to receive a general overview of the process for scheduling, treatment, as well as how we can collaborate with your general dentist. We’re here to answer all of your dental implant questions. Talk to you soon!
                </p>
                <a href="tel:+0000000000"><button >(000) 000 0000</button></a>
            </div>
        </div>

        <div id="high-rank-results" class="hidden results-modal">
            <div class="results-modal-content">
                <h1>Congratulations, You’re On Your Way To A Healthier Smile!</h1>
                <p style="font-weight: bold;">It looks like you’re a great candidate for dental implants.</p>
                <p>
                The next step is to speak with one of our dental implant experts, they’ll reach out to you within 24 hours. During the call, they’ll walk you through the process of scheduling an initial consultation to meet with one of our esteemed oral surgeons[or insert specific doctor’s name here]. Together, they’ll work with you to create a personalized treatment plan to best support your smile goals. When you speak with the dental implant expert, you can expect to receive a general overview of the process for scheduling, treatment, as well as how we can collaborate with your general dentist. We’re here to answer all of your dental implant questions. Talk to you soon!
                </p>
                <a href="tel:+0000000000"><button >(000) 000 0000</button></a>
            </div>
        </div>

        <script>
            // Create a points counter and add the clicked buttons points
            let pointsCounter = 0;
            // Create a value for if the collobrate question is yes or no
            let extraQuestionVal = false;
            // Value for points rank
            let clientRank = document.querySelector("#quiz-score");
            
            // Function that returns false is contact fields are empty and returns true if all fields are not empty
            function validateContactInfo(parentElement) {

                // Get specific input fields
                let firstName = parentElement.querySelector("#quiz-a-first-name");
                let lastName = parentElement.querySelector("#quiz-a-last-name");
                let email = parentElement.querySelector("#quiz-a-email");
                let phoneNumber = parentElement.querySelector("#quiz-a-phone-number");
                // Create an array to loop through
                let allFields = [firstName, lastName, email, phoneNumber];

                // Loop through all fields and make sure they are not empty if they are return false
                for (field of allFields) {

                    if (!field.value) {
                        alert(`Please fill out the required fields ${field.name} to proceed.`);
                        return false;
                    }

                }

                // Check email address is valid
                if (!email.value.includes('@')) {
                    alert('Please input a valid email address to proceed.')
                    return false;
                } 

                // Check phone number is valid
                phoneNumberIsNaN = isNaN(phoneNumber.value);
                if (phoneNumberIsNaN == true) {
                    alert('Please fill in your phone number without any special characters to proceed.');
                    return false;
                } 


                // If nothing else returned false everything is valid so return true
                return true;

            }
            
            // Function to trigger form questions without radio buttons
            function nextButtonTrigger(event) {
                // Stop form from submitting
                event.preventDefault();

                // Set to true to allow for the first question without contact info to work as normal
                let formsValidated = true;
                
                // Reset containers for current location
                currentContainer = event.target.closest('.quiz-question-container');
                nextContainer = currentContainer.nextElementSibling;


                // If currentContainer contains #multi-quiz-answers then console log that element
                const multiQuizAnswers = currentContainer.querySelector('#quiz-multi-answer');
                if (multiQuizAnswers) {
                    
                    // create a variable to hold a true or false return from the function
                    let isFormValid = validateContactInfo(multiQuizAnswers);

                    if (isFormValid == true) {
                        formsValidated = true;
                    } else {
                        formsValidated = false;
                    }
                }

                if (formsValidated == true) {
                    // Call the next question function with the present containers
                    nextQuestion(currentContainer, nextContainer);
                }

                
            }


            // Function to handle async switching animations using the current question container to fade out and the next container to fade in
            function nextQuestion(currentContainer, nextContainer) {

                currentContainer.classList.add('fade-out');
                currentContainer.addEventListener('animationend', function handleAnimationEnd() {
                    currentContainer.classList.add('hidden');
                    currentContainer.classList.remove('fade-out');
                    nextContainer.classList.remove('hidden');
                    nextContainer.classList.add('fade-in');
                    nextContainer.addEventListener('animationend', function handleFadeInEnd() {
                        nextContainer.classList.remove('fade-in');
                        nextContainer.removeEventListener('animationend', handleFadeInEnd);
                    });
                    currentContainer.removeEventListener('animationend', handleAnimationEnd);
                });
            }


            document.querySelectorAll('input[type="radio"]').forEach(button => {
                button.addEventListener('click', function() {
                    // Add the data points from the clicked element to our counter
                    pointsCounter += parseInt(button.getAttribute('data-points'));
                    // Reset containers for current location
                    let currentContainer = this.closest('.quiz-question-container');
                    let nextContainer = currentContainer.nextElementSibling;


                    // If we are at colaborate question handle it differently if yes selected
                    if (nextContainer.querySelector('#collaborate-question')) {
                        let labels = document.querySelectorAll('#collaborate-answer label');
                        labels.forEach(label => {
                            label.addEventListener("click", function() {
                                let radioInput = label.querySelector('input[type="radio"]');
                                if (radioInput) {
                                    if (radioInput.value == 'Yes') {
                                        extraQuestionVal = true;
                                        skipContainer = nextContainer.nextElementSibling;
                                        nextQuestion(nextContainer, skipContainer);
                                    }
                                    else {
                                        skipContainer = nextContainer.nextElementSibling;
                                        skipSkipContainer = skipContainer.nextElementSibling;
                                        skipContainer.style.display = "none";
                                        nextQuestion(nextContainer, skipSkipContainer);
                                    }
                                }
                            })
                        })
                    }


                    // if we are at final question then set clientRank based on score
                    if (currentContainer.querySelector('#final-score-question')) {

                        if (pointsCounter < 20) {
                            clientRank.value = pointsCounter;
                        } 
                        
                        else if (pointsCounter < 40) {
                            clientRank.value = pointsCounter;
                        }

                        else if (pointsCounter > 39) {
                            clientRank.value = pointsCounter;
                        }

                    } 


                    if (nextContainer) {
                        // Check for the extra question to stay false to continue the loop for next question
                        if (extraQuestionVal === false) {
                            nextQuestion(currentContainer, nextContainer);
                        } 
                    }

                });
            });
        </script>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('poh_quiz_form_a_two_landing_quiz', 'poh_quiz_form_a_two_landing_quiz_shortcode');
