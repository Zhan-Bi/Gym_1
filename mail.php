<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['U_name'];
$email = $_POST['U_email'];
$phone = $_POST['U_phone'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;

$mail->Username = 'nekozhanyymeshok@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '4p8GM57t45mZaCJg5qrR'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('nekozhanyymeshok@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('kar.one.to.one@gmail.com');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Форма с сайта Gym';
$mail->Body    = '' .$name . ' оставил заявку. Данные:<br> Телефон: ' .$phone. ' <br> Почта: ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('location: After_form.html');
}
?>
