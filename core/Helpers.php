<?php
function getUserIP() {
    return $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
}

function generateHashKey($receipt_id) {
    return hash("sha512", data: $receipt_id);
}

?>
