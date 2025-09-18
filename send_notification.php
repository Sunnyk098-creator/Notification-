<?php
// Firebase API Key
define('FIREBASE_API_KEY', 'YOUR_FIREBASE_SERVER_KEY');

// This is the device token you would get from the client-side
// For this example, we are using a placeholder.
$device_token = 'DEVICE_REGISTRATION_TOKEN';

$message = [
    'notification' => [
        'title' => 'New Notification!',
        'body' => 'This is a push notification from your app.',
        'icon' => 'your_icon_url',
    ],
    'to' => $device_token
];

$headers = [
    'Authorization: key=' . FIREBASE_API_KEY,
    'Content-Type: application/json'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>