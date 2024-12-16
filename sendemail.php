<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Email details
    $to = "your-email@example.com"; // Replace with your email address
    $email_subject = "New Contact Form Submission: " . $subject;
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Name: $username\n" .
                  "Email: $email\n" .
                  "Phone: $phone\n" .
                  "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send the message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
