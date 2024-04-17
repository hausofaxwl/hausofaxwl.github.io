
<?php

// Discord Bot Token
$token = 'MTIzMDAzMzE2MzUyNzY1NTQ1NA.Gj5GGx.lAURfrqkV7CgkAr1xR_P6P4-q0Vn-LzgsbtW_U';

// Discord Server ID
$server_id = '1198476380376150097';

// Discord API URL
$url = "https://discord.com/api/v9/guilds/$server_id/events";

// Headers
$headers = [
    'Authorization: Bot ' . $token,
];

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($curl);

// Close cURL
curl_close($curl);

// Decode JSON response
$data = json_decode($response, true);

// Check if data is valid
if ($data && isset($data['events'])) {
    // Loop through events
    foreach ($data['events'] as $event) {
        // Output event details
        echo "Event ID: " . $event['id'] . "<br>";
        echo "Event Type: " . $event['type'] . "<br>";
        echo "Event Timestamp: " . date('Y-m-d H:i:s', $event['timestamp'] / 1000) . "<br>";
        echo "Event Data: " . json_encode($event['data']) . "<br><br>";
    }
} else {
    echo "Failed to fetch events.";
}
