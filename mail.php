<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email']; 
    $message = $_POST['message']; 

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = '';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'le.com';
        $mail->Password   = 'J,.)';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        
        $mail->setFrom('gmail.com', 'Crypt4Bits');
        $mail->addAddress('aliyafathimaks@gmail.com', ' Name'); 

        
        $mail->isHTML(true);
        $mail->Subject = 'Contact message';
        
        $mail->Body    = "
            <div style='font-family: Arial, sans-serif; font-size: 16px;'>
                <img src='https://yourwebsite.com/assets/images/logo.png' alt='Email Banner' style='width:100%; max-width: 600px; display: block; margin-bottom: 10px;'>
                <h3>Contact Message</h3>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Message:</strong> $message</p>
            </div>
        ";

        if ($mail->send()) {
            $_SESSION['success_message'] = "The email was sent successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to send email. Please try again.";
        }

    } catch (Exception $e) {
        $_SESSION['error_message'] = "Mailer Error: " . $mail->ErrorInfo;
    }

    header("Location: contact-us.php");
    exit();
}
?>