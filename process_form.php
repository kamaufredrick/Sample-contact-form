<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($name && $email && $subject && $message) {
        // Typically, you'd send an email here
        // mail($email_to, $subject, $message, $headers);

        echo json_encode(['success' => true, 'message' => 'Your message has been sent successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Please fill in all fields correctly.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
