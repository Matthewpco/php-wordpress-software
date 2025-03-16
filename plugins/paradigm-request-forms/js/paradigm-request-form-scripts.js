document.addEventListener('DOMContentLoaded', function() {
    let form = document.getElementById('paradigm-request-form');

    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            let success_message = document.getElementById('paradigm-form-received');
            
            let formData = new FormData(form);
            formData.append('action', 'paradigm_request_forms_submit');
            formData.append('_ajax_nonce', paradigm_request_forms_ajax_object.nonce);
            
            // Log form data
            for (let pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]); 
            }

            // Checks for empty fields
            let emptyField = "";

            switch (true) {
                case !formData.get('name'):
                    emptyField = "name";
                    break;
                case !formData.get('email'):
                    emptyField = "email";
                    break;
                case !formData.get('newpage'):
                    emptyField = "task needs";
                    break;
                case !formData.get('site-url'):
                    emptyField = "site URL";
                    break;
                case !formData.get('date'):
                    emptyField = "preferred completion date";
                    break;
                case !formData.get('message'):
                    emptyField = "message";
                    break;
            }

            if (emptyField) {
                alert(`Please enter your ${emptyField}.`);
                return;
            }

            // Continuation of code if alerts are completed
            fetch(paradigm_request_forms_ajax_object.ajax_url, {
                    method: 'POST',
                    body: formData
            })
            .then(response => response.json()) // Parse the JSON response from the server
            .then(data => {
                // Check if there's an error message
                if (data.error_message) {
                    // Display the error message
                    console.error(data.error_message);
                    // Refresh the page
                    location.reload();
                } else if (data.success_message) {
                    // Form submission successful
                    success_message.classList.toggle('hidden');
                    setTimeout(function() {
                        form.reset();
                    }, 3000);
                }
            })            
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    }
});


