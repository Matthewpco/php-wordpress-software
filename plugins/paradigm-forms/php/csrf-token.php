<?php 

if (!session_id()) {
    session_start();
}

function generate_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validate_token($token) {
    return $token === $_SESSION['csrf_token'];
}