<?php
header('Content-Type: application/json');

// Get the POST data
$input = json_decode(file_get_contents('php://input'), true);

$name = $input['name'];
$email = $input['email'];
$message = $input['message'];


// Validate the input
if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

// Set up email parameters
$to = 'yashdhone007@gmail.com';
$subject = 'Contact form submission from ' . $name;
$body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
$headers = 'From: ' . $email . "\r\n" .
           'Reply-To: ' . $email . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

// Send the email
if (mail($to, $subject, $body, $headers)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to send message.']);
}
?>
