<?php
// Load environment configuration
require_once __DIR__ . '/../src/config/env.php';

// Get email configuration from environment
$smtp_host = EnvLoader::get('SMTP_HOST', 'smtp.gmail.com');
$smtp_port = EnvLoader::get('SMTP_PORT', '587');
$smtp_username = EnvLoader::get('SMTP_USERNAME', '');
$smtp_password = EnvLoader::get('SMTP_PASSWORD', '');
$contact_to_email = EnvLoader::get('CONTACT_TO_EMAIL', 'contact@example.com');

ini_set('SMTP', $smtp_host);
ini_set('smtp_port', $smtp_port);

  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $subject = test_input($_POST["subject"]);
    $message = test_input($_POST["message"]);

    // Validate input data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        // Send email using environment configured email
        $to = $contact_to_email;
        $headers = "From: $name <$email>" . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            echo "Your message has been sent.";
        } else {
            echo "Error: Unable to send email.";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
