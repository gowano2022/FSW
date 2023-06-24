<?php
// Get the number sent from the client
$number = $_POST['number'];

// Telegram bot settings
$botToken = '5412336519:AAH-HGiiJJ-AZE3D5FF9457pJACcT-jbqQg';
$chatID = '373715044';

// Telegram API URL
$telegramURL = 'https://api.telegram.org/bot' . $botToken . '/sendMessage';

// Create the message
$message = 'Random Number: ' . $number;

// Send the message to the Telegram chat
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $telegramURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'chat_id=' . $chatID . '&text=' . urlencode($message));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
curl_close($ch);

// Respond with a success message
$responseData = array(
    'success' => true,
    'message' => 'kNumber sent to Telegram chat!'
);

header('Content-Type: application/json');
echo json_encode($responseData);
?>
