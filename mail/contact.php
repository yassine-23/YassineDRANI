<?php
require 'PHPMailer/PHPMailerAutoload.php';

if (isset($_POST['name'], $_POST['subject'], $_POST['message'], $_POST['email'])) {
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email = strip_tags(htmlspecialchars($_POST['email']));
    $m_subject = strip_tags(htmlspecialchars($_POST['subject']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';
    $mail->Port = 587;  // Use 587 for STARTTLS or 465 for SSL/TLS.
    $mail->SMTPAuth = true;
    $mail->Username = 'yassine@yassinedrani.com';
    $mail->Password = 'Forabetterlife2020@';
    $mail->setFrom('yassine@yassinedrani.com', 'Your Name');
    $mail->addAddress('yassine@yassinedrani.com'); // Replace with your email address
    $mail->Subject = "$m_subject: $name";
    $mail->Body = "You have received a new message from your website contact form.\n\nName: $name\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
    $mail->SMTPSecure = 'tls'; // Use 'tls' for STARTTLS or 'ssl' for SSL/TLS.

    if ($mail->send()) {
        http_response_code(200); // Success response code.
    } else {
        http_response_code(500); // Server error response code.
    }
} else {
    http_response_code(400); // Bad request response code.
}
?>

