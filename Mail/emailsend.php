<?php
include('smtp/PHPMailerAutoload.php');

$to = "abhishekshajare786@gmail.com";
$subject = 'Test Mail';
$message = 'Hi abhishek';

$result = smtp_mailer($to, $subject, $message);

if ($result === true) {
    echo 'Email sent successfully';
} else {
    echo 'Email sending failed. Error: ' . $result;
}

function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->Username = "annapurnamessnotification@gmail.com";
    $mail->Password = "tlyfdsgvimhwlfsx";
    $mail->SetFrom("annapurnamessnotification@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );

    if (!$mail->send()) {
        return $mail->ErrorInfo;
    } else {
        return true;
    }
}
?>
