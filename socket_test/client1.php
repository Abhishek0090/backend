<?php

    echo "
    // Connect to the WebSocket server
    const socket = new WebSocket('ws://localhost:8080');

    // Handle messages from the server
    socket.addEventListener('message', event => {
        const message = event.data;
        // Process the received message
    });

    // Send messages to the server
    socket.send('Hello, server!');
    ";
    


?>