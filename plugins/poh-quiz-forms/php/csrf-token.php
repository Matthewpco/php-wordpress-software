<?php 

if (!session_id()) {
    session_start();
}

function poh_quiz_form_a_generate_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function poh_quiz_form_a_validate_token($token) {
    return $token === $_SESSION['csrf_token'];
}