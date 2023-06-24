

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $randomNumber = $_POST['random_number'];
    
    // Email settings
    $to = '01028838444a@gmail.com';
    $subject = 'Random Number';
    $message = "Generated random number: $randomNumber";
    $headers = 'From: your-email@example.com' . "\r\n" .
               'Reply-To: your-email@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    
    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo 'Email sent successfully!';
    } else {
        echo 'Failed to send email.';
    }
}
?>
