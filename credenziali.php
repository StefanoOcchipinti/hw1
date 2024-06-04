<?php

header('Content-Type: application/json');

session_start();

// Credenziali Spotify
$clientId = '5b439905906645a8aca4b4e7f7fd0761';
$clientSecret = 'dbcd1aa4dbdd4333beed9a93d8679886';

// Restituisce le credenziali come JSON
echo json_encode([
    "clientId" => $clientId,
    "clientSecret" => $clientSecret
]);

?>