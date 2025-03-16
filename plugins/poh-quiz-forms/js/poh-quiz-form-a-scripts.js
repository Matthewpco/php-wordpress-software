document.addEventListener('DOMContentLoaded', function() {
    let quiz_form = document.getElementById("poh-quiz-form-a");

    const submit_form = function(event) {
        event.preventDefault();
        
        // Pass formdata to new object
        let formData = new FormData(this);

        let quizScore = formData.get('quiz-score');
        console.log('Score at submission controller',quizScore);

        // Append the action and nonce
        formData.append('action', 'poh_quiz_forms_submit');
        formData.append('_ajax_nonce', poh_quiz_form_ajax_object.nonce);

        // Send POST request to server controller for processing
        fetch(poh_quiz_form_ajax_object.ajax_url, {
            method: 'POST',
            body: formData
        })
        .then(() => {
            if (quizScore < 20) {
                window.location.href = '/pqf-thanks-1';
            } else if (quizScore < 40) {
                window.location.href = '/pqf-thanks-2';
            } else if (quizScore > 39) {
                window.location.href = '/pqf-thanks-3';
            }

            // Reset form after a second
            setTimeout(() => {
                this.reset();
            }, 500);
        })
        .catch(error => {
            console.error('There has been a problem with the fetch operation.');
        });
    }

    if (quiz_form) {
        quiz_form.addEventListener('submit', submit_form);
    }
});