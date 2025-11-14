<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include DB connection
include 'db_connect.php';

// Include PHPMailer files (make sure these paths are correct)
require 'PHPMailer-PHPMAILER-4384c20/src/Exception.php';
require 'PHPMailer-PHPMAILER-4384c20/src/PHPMailer.php';
require 'PHPMailer-PHPMAILER-4384c20/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Check if email exists in users table
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate token and expiry
        $token = bin2hex(random_bytes(32));
        $expires = date("U") + 1800; // 30 minutes

        // Insert token into password_resets table
        $stmt = $conn->prepare("INSERT INTO password_reset (email, token, expires) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expires);
        $stmt->execute();

        // Localhost reset link
        $resetLink = "http://192.168.1.109/princesstouch/reset.html?token=" . $token;

        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'forcomputeronly2371@gmail.com';         // 🔹 your Gmail
            $mail->Password   = 'ebty lifs hgtk bula';       // 🔹 16-character app password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            // Sender and recipient
            $mail->setFrom('forcomputeronly2371@gmail.com', 'Princess Touch');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset - Princess Touch';
            $mail->Body    = "
                <p>Hello,</p>
                <p>You requested a password reset for your Princess Touch account.</p>
                <p>Click the link below to reset your password:</p>
                <p><a href='$resetLink'>$resetLink</a></p>
                <p>This link will expire in 30 minutes.</p>
                <br>
                <p>— Princess Touch Team</p>
            ";

            $mail->send();

            echo "<script>alert('A password reset link has been sent to your email.'); window.location='../login.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Error sending email: " . $mail->ErrorInfo . "'); window.location='../forgot-password.html';</script>";
        }
    } else {
        echo "<script>alert('Email not found.'); window.location='../forgot-password.html';</script>";
    }
}
?>
