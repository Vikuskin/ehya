<?php
if(isset($_POST['name_modal'])) {
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name_modal = $_POST['name_modal'];
$phone_modal = $_POST['phone_modal'];
$message_modal = $_POST['message_modal'];
$email_modal = $_POST['email_modal'];

// Формирование самого письма
$title = "Новое обращение Ehya";
$body = "
<h2>Новое обращение</h2>
<b>Имя:</b> $name_modal<br>
<b>Телефон:</b> $phone_modal<br>
<b>Email:</b> $email_modal<br><br>
<b>Сообщение:</b><br>$message_modal<br>
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'besttourplan.kiskina@gmail.com'; // Логин на почте
    $mail->Password   = 'Bl00dBorn'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('besttourplan.kiskina@gmail.com', 'Виктория Кискина'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('kiskina.vss@yandex.ru');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html');
}

if(isset($_POST['subscribe'])) {
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$subscribe = $_POST['subscribe'];

// Формирование самого письма
$title = "Новый запрос на подписку Ehya";
$body = "
<h2>Запрос на подписку</h2>
<b>Email:</b> $subscribe
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'besttourplan.kiskina@gmail.com'; // Логин на почте
    $mail->Password   = 'Bl00dBorn'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('besttourplan.kiskina@gmail.com', 'Виктория Кискина'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('kiskina.vss@yandex.ru');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html');
}