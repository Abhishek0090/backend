<?php
// Create an HTTP server
$server = stream_socket_server("tcp://localhost:8080", $errno, $errstr);

if (!$server) {
    die("Error: $errstr ($errno)");
}

// Store connected clients
$clients = [];

while (true) {
    // Accept incoming connections
    $client = stream_socket_accept($server);
    
    if ($client) {
        // Handle WebSocket handshake and store the client
        $clients[] = handleHandshake($client);
    }

    // Check for client activity
    foreach ($clients as $key => $client) {
        $data = fread($client, 8192);

        if ($data) {
            handleMessage($data, $client, $clients);
        } else {
            // Client disconnected
            fclose($client);
            unset($clients[$key]);
        }
    }
}

function handleHandshake($client) {
    // Perform WebSocket handshake and return the client stream
    // ... (your handshake code)
    return $client;
}

function handleMessage($data, $client, $clients) {
    // Parse and handle WebSocket messages
    // ... (your message handling code)
    // Broadcast messages to other clients
    // ... (your broadcasting logic)
}
