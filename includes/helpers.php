<?php
function redirect($url) {
    header("Location: $url");
    exit();
}

function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}
?>
