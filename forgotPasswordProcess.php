<?php

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

$email = $_POST["e"];
$vcode = uniqid();

$rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
$num = $rs->num_rows;

if ($num > 0) {

    Database::iud("UPDATE `user` SET `v_code` = '" . $vcode . "' WHERE `email` = '" . $email . "'");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'janindumagamage100@gmail.com';
        $mail->Password = 'jvepgimcswgnsdkv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('janindumagamage100@gmail.com', 'Horos');
        $mail->addAddress($email);
        $mail->addReplyTo('info@example.com', 'Horos Support');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Your Password - Horos';
        $mail->Body = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reset Password - Horos</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                
                body {
                    font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                    background-color: #ffffff;
                    color: #000000;
                    line-height: 1.6;
                }
                
                .email-container {
                    max-width: 600px;
                    margin: 0 auto;
                    background: #ffffff;
                }
                
                .email-header {
                    text-align: center;
                    padding: 48px 24px 32px;
                    border-bottom: 1px solid #f5f5f5;
                }
                
                .logo {
                    font-size: 32px;
                    font-weight: 700;
                    color: #000000;
                    text-decoration: none;
                    letter-spacing: -0.02em;
                }
                
                .email-content {
                    padding: 48px 24px;
                }
                
                .content-title {
                    font-size: 24px;
                    font-weight: 600;
                    color: #000000;
                    margin-bottom: 16px;
                    letter-spacing: -0.01em;
                }
                
                .content-text {
                    font-size: 16px;
                    color: #525252;
                    margin-bottom: 32px;
                    line-height: 1.6;
                }
                
                .reset-button {
                    display: inline-block;
                    background: #000000;
                    color: #ffffff;
                    text-decoration: none;
                    padding: 16px 32px;
                    border-radius: 8px;
                    font-weight: 500;
                    font-size: 16px;
                    margin-bottom: 32px;
                    transition: all 0.2s ease;
                }
                
                .reset-button:hover {
                    background: #262626;
                    transform: translateY(-1px);
                }
                
                .security-notice {
                    font-size: 14px;
                    color: #737373;
                    background: #fafafa;
                    padding: 16px;
                    border-radius: 8px;
                    border-left: 3px solid #000000;
                    margin-bottom: 32px;
                }
                
                .divider {
                    height: 1px;
                    background: #f5f5f5;
                    margin: 32px 0;
                }
                
                .email-footer {
                    text-align: center;
                    padding: 24px;
                    background: #fafafa;
                    border-top: 1px solid #f5f5f5;
                }
                
                .footer-text {
                    font-size: 14px;
                    color: #737373;
                    margin-bottom: 8px;
                }
                
                .footer-link {
                    color: #000000;
                    text-decoration: none;
                    font-weight: 500;
                }
                
                @media (max-width: 480px) {
                    .email-content {
                        padding: 32px 16px;
                    }
                    
                    .email-header {
                        padding: 32px 16px 24px;
                    }
                    
                    .content-title {
                        font-size: 20px;
                    }
                    
                    .reset-button {
                        display: block;
                        text-align: center;
                        width: 100%;
                        max-width: 280px;
                        margin: 0 auto 32px;
                    }
                }
            </style>
        </head>
        <body>
            <div class="email-container">
                <!-- Header -->
                <div class="email-header">
                    <a href="#" class="logo">Horos</a>
                </div>
                
                <!-- Content -->
                <div class="email-content">
                    <h1 class="content-title">Reset Your Password</h1>
                    
                    <p class="content-text">
                        We received a request to reset your password for your Horos account.
                        Click the button below to create a new password.
                    </p>
                    
                    <a href="http://localhost/eshop/resetPassword.php?vcode=' . $vcode . '" class="reset-button">
                        Reset Password
                    </a>
                    
                    <div class="security-notice">
                        <strong>Security Notice:</strong> If you didn\'t request this password reset, 
                        please ignore this email. Your account will remain secure.
                    </div>
                    
                    <p class="content-text" style="margin-bottom: 0; font-size: 14px; color: #737373;">
                        This link will expire in 24 hours for your security.
                    </p>
                </div>
                
                <!-- Footer -->
                <div class="email-footer">
                    <p class="footer-text">
                        © 2024 <a href="#" class="footer-link">Horos</a> | Legend of the WatchCraft
                    </p>
                    <p class="footer-text">
                        Need help? <a href="#" class="footer-link">Contact Support</a>
                    </p>
                </div>
            </div>
        </body>
        </html>';

        $mail->send();
        echo 'success';
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
} else {
    echo ("User not found! Please check your email");
}

?>