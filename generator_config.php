<?php
$referer = $_SERVER['HTTP_REFERER'] ?? '';
$accept = $_SERVER['HTTP_ACCEPT'] ?? '';

if (!str_contains($referer, 'admin.php') && strpos($accept, 'text/html') !== false) {
    http_response_code(403);
    exit('403 Forbidden');
}

$flag = trim(file_get_contents("flag.txt"));
header("Content-Type: application/javascript");
echo "const FLAG = " . json_encode($flag) . ";";
