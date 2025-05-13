<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and get form fields
    $fname   = htmlspecialchars(trim($_POST["fname"]));
    $lname   = htmlspecialchars(trim($_POST["lname"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Set recipient and subject
    $to = "bashirgonbadi@gmail.com"; // Replace with your actual receiving email
    $subject = "New message from your website contact form";

    // Prepare email body
    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Name: $fname $lname\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
?>
