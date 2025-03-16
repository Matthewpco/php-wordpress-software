<?php

// Send csp headers for better security ** CAN BREAK FUNCTIONALITY - USE CAUTION AND CUSTOMIZE WHERE NECCESSARY **
function add_csp_security_headers() {
    // Build the Content-Security-Policy header string using the CURRENT_SERVER_URL constant
    $csp_header = "Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' *.googletagmanager.com *.google-analytics.com cdn-cookieyes.com " . CURRENT_SERVER_URL . ";" .
    "style-src 'self' 'unsafe-inline'; img-src 'self' blob: placehold.co cdn-cookieyes.com data: *.googleusercontent.com *.gstatic.com *.vimeocdn.com secure.gravatar.com 2.gravatar.com; " .
    "font-src 'self' fonts.googleapis.com data:; frame-src *.google.com *.eventsquid.com *.youtube.com player.vimeo.com; " .
    "connect-src *.google-analytics.com log.cookieyes.com cdn-cookieyes.com " . CURRENT_SERVER_URL . "/wp-admin/admin-ajax.php;";
}
add_action('send_headers', 'add_security_headers');