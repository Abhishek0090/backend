<?php
// Example secret key, make sure to replace this with your actual secret key
$secretKey = "your_secret_key_here";

// Function to generate a JWT token
function generateJWT($data, $secretKey) {
    $header = json_encode(['alg' => 'HS256', 'typ' => 'JWT']);
    $payload = json_encode($data);
    
    $header = base64url_encode($header);
    $payload = base64url_encode($payload);
    
    $signature = hash_hmac('sha256', "$header.$payload", $secretKey, true);
    $signature = base64url_encode($signature);
    
    return "$header.$payload.$signature";
}

// Function to verify a JWT token
function verifyJWT($token, $secretKey) {
    list($header, $payload, $signature) = explode('.', $token);
    
    $calculatedSignature = hash_hmac('sha256', "$header.$payload", $secretKey, true);
    $calculatedSignature = base64url_encode($calculatedSignature);
    
    return hash_equals($signature, $calculatedSignature);
}

// Function to base64url encode data
function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

// Function to base64url decode data
function base64url_decode($data) {
    return base64_decode(strtr($data, '-_', '+/'));
}

// Function to decode JWT token and retrieve data
function decodeJWT($token, $secretKey) {
    list($header, $payload, $signature) = explode('.', $token);
    
    $decodedPayload = base64url_decode($payload);
    return json_decode($decodedPayload, true);
}

// Sample data to be stored in the JWT payload
$userData = [
    'user_id' => 123,
    'username' => 'example_user'
];

// Generate JWT token
$jwtToken = generateJWT($userData, $secretKey);
echo "Generated JWT token: $jwtToken\n";

// Verify and decode JWT token
$isVerified = verifyJWT($jwtToken, $secretKey);
if ($isVerified) {
    echo "JWT token is valid and verified.\n";
    $decodedData = decodeJWT($jwtToken, $secretKey);
    echo "Decoded JWT data:\n";
    print_r($decodedData);
} else {
    echo "JWT token is invalid or not verified.\n";
}
?>
