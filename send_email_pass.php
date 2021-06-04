<?php


// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include "database/connect.php";

$email = $_POST['email'];

$sql = "SELECT * from tb_pengguna where email='$email'";

$result = mysqli_query($mysqli, $sql);
$fetch = mysqli_fetch_assoc($result);
$row = mysqli_fetch_row($result);
if ($fetch != null) {
    $id_users = $fetch['id_pengguna'];

    $name = $fetch['nama'];
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'gekmaramadhan1697@gmail.com';                     // SMTP username
        $mail->Password   = 'gataulahkita';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email, 'MuliaJasaFurniture');
        $mail->addAddress($email, $name);     // Add a recipient
        $mail->addReplyTo($email, "gekmaramadhan1697@gmail.com");

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Lupa Password';
        $mail->Body    = "http://localhost/muliajasafurniture/input_new_password.php?id=$id_users";

        if ($mail->send()) {
            echo "<script>alert('Silahkan cek Email');window.location.href='index.php'</script>";
        }
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
