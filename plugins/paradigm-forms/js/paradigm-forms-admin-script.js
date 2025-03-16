document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector("#paradigm-admin-form");
    const formLocationsCheckbox = document.querySelector("#form-locations-checkbox");
    const locationsRow = document.querySelector("#form-locations-row");
    const emailsRow = document.querySelector("#form-emails-row");
    const singleLocationEmailRow = document.querySelector("#form-email-row");
    const locationsInput = document.querySelector("#paradigm_forms_locations");
    const emailsInput = document.querySelector("#paradigm_forms_locations_emails");
    const singleLocationEmailInput = document.querySelector("#paradigm_forms_email");

    const adjustCheckBoxes = function() {
        if (formLocationsCheckbox) {
            if (formLocationsCheckbox.checked) {
                locationsRow.style.display = "table-row";
                emailsRow.style.display = "table-row";
                singleLocationEmailRow.style.display = "none";
            } else {
                locationsRow.style.display = "none";
                emailsRow.style.display = "none";
                singleLocationEmailRow.style.display = "table-row";
            }
        }
    }
    
    adjustCheckBoxes();
    
    if (form) {
        form.addEventListener("submit", function(event) {
    
            if (singleLocationEmailInput.value === "" && formLocationsCheckbox.checked === false) {
                alert("The input field for the email address is empty. Please fill it out.");
                event.preventDefault();
            }

            if(locationsInput.value === "" && formLocationsCheckbox.checked === true || emailsInput.value === "" && formLocationsCheckbox.checked === true) {
                alert("The required input fields for multiple form locations are empty. Please fill them out.");
                event.preventDefault();
            }
        });
    }

    if (formLocationsCheckbox) {
        formLocationsCheckbox.addEventListener("change", function() {
            adjustCheckBoxes();
        });
    }
    
});