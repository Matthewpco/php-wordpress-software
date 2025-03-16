document.addEventListener('DOMContentLoaded', function() {
    
    // Check if current page contains the form
    const form = document.getElementById('paradigm-form');

    // Immediately exit this function if no form is found
    if (!form) {
        return;
    }

    // Get query string to check for bypass code
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    const bypass = params.get('bypass');

    // Create variables and set types
    let reqFieldsArray = [];
    let formTimePassed =  false;
    let reqFormFields = false;
    let containsNonEnglishLanguage = false;
    let containsFilteredTerm  = false;
    const filteredTerms = ['www', 'marketing', '.com', 'http', 'xxx', '<', 'seo', 'ppc', 'pay per click', 'paid search', 'search engine'];
    
    // Get page elements for form
    const firstName = form.querySelector('input#first-name');
    const lastName = form.querySelector('input#last-name');
    const email = form.querySelector('input#email');
    const phoneNumber = form.querySelector('input#phone-number');
    const formMessage = form.querySelector('textarea#form-message');
    const formSubmitBtn = form.querySelector("input[type='submit']");

    // if bypass is true skip validation functions else run validation
    if (bypass === 'true') {

        form.addEventListener('submit', handleFormSubmit);
        formSubmitBtn.classList.remove('hidden');

    } else {

        // Event listeners for form, required form fields, and message.
        form.addEventListener('submit', handleFormSubmit);
        firstName.addEventListener('input', () => checkReqFields(firstName));
        lastName.addEventListener('input', () => checkReqFields(lastName));
        email.addEventListener('input', () => checkReqFields(email));
        phoneNumber.addEventListener('input', () => checkReqFields(phoneNumber));
        formMessage.addEventListener('input', () => checkInvalidContent(formMessage));

        // Security measure for spam to stop bots from immediately submitting forms
        setTimeout(() => {
            formTimePassed = true;
        }, 10000);

        // Security measure for spam to keep submit button hidden until reqFormFields equals true
        setInterval(() => {
            revealSubmitButtonOnReqMet();
        }, 1000);

    }

    // Returns true if non english characters are found
    function checkNonEnglishLanguage(message) {
        const nonEnglishRegex = /[^\x00-\x7F]+/;
        return nonEnglishRegex.test(message.value);
    }

    //  Check invalid content from filtered term list
    function checkInvalidContent(message) {

        let lowerCaseMessage = message.value.toLowerCase();
        containsFilteredTerm = filteredTerms.some(term => lowerCaseMessage.includes(term));
        
        if (containsFilteredTerm) {
            formSubmitBtn.classList.add('hidden');
        }

        if (checkNonEnglishLanguage(message)) {
            formSubmitBtn.classList.add('hidden');
            containsNonEnglishLanguage = true;
        } else {
            containsNonEnglishLanguage = false;
        }
        
    }

    // Checking required form fields are filled
    function checkReqFields(field) {

        if (field.value !== '') {

            if (reqFieldsArray.includes(field)) {
                return;
            }

            reqFieldsArray.push(field);

        } else {

            reqFieldsArray.pop(field);
            formSubmitBtn.classList.add('hidden');
            
        }

    }

    // Controller to reveal submit button when all reqs true
    function revealSubmitButtonOnReqMet() {
        if (reqFieldsArray.length == 4) {
            reqFormFields = true;
        } else {
            reqFormFields = false;
        }

        if (formTimePassed == true && reqFormFields == true && containsNonEnglishLanguage == false && containsFilteredTerm == false ) {
            formSubmitBtn.classList.remove('hidden');
        }
    }

    function checkTypeNumber(number) {
        let cleanedNumber = number.replace(/[-()]/g, '');

        number = Number(cleanedNumber);

        if (Number.isInteger(number)) {
            return true;
        } else {
            return false;
        }

    }

    function checkTypeString(str) {
        let castStr = Number(str);
        if (isNaN(castStr)) {
            return true;
        } else {
            return false;
        }
    }

    // Controller for submitting the form to the
    function handleFormSubmit(event) {

        event.preventDefault();
        
        // pass formdata to new object
        let formData = new FormData(form);

        let checkTypeNumberResult = checkTypeNumber(formData.get('phone-number'));
        let checkTypeStringResultFirstName = checkTypeString(formData.get('first-name'));
        let checkTypeStringResultLastName = checkTypeString(formData.get('last-name'));
        let checkTypeStringResultProcedure = checkTypeString(formData.get('procedure-of-interest'));

        if(checkTypeStringResultFirstName == false || checkTypeStringResultLastName == false || checkTypeStringResultProcedure == false) {
            alert('Invalid data type');
            return;
        }
        

        if(checkTypeNumberResult == false) {
            alert('Invalid data type');
            return;
        }

        // append the action and nonce
        formData.append('action', 'paradigm_forms_submit');
        formData.append('_ajax_nonce', paradigm_forms_ajax_object.nonce);

        // append bypass code if set
        if (bypass) {
            formData.append('bypass', bypass);
        }

        // send POST request to server controller for processing
        fetch(paradigm_forms_ajax_object.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Submission successful' + data.message);
                let success_message = document.getElementById('paradigm-form-received');
                success_message.classList.toggle('hidden');

                // reset form after a second
                setTimeout(() => {
                    form.reset();
                }, 500);
            } else {
                console.error('Server error:', data.message);
            }
        })
        .catch(error => {
            console.error('There has been a problem with the fetch operation.');
        });

    }

});