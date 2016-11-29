<?php
$sendto = "loftkirpich@yandex.ru";
// $uname = $_POST['email'];
// print_r($_POST);
$tel = isset($_POST['phone'])?$_POST['phone']:"";
$text = isset($_POST['text'])?$_POST['text']:"";
$email =  isset($_POST['email'])?(!($_POST['email']==="noemail@noemail.ru")?$_POST['email']:""):"";
$popup =  isset($_POST['popup'])?$_POST['popup']:"";
// if(isset($_POST['file'])){
	// echo 1111;
	// print_r($_FILES);
// }

// $utm = $_POST['f-utm'];
// Формирование заголовка письма
$subject  = "Новое сообщение";
$headers  = "From: " . "loftkirpich.ru" . "\r\n";
$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// $subject  = "Новое сообщение";
// $headers  = "From: " . strip_tags($email) . "\r\n";
// $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
// $headers .= "MIME-Version: 1.0\r\n";
// $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg  = "<html><body>";
$msg .= "<h2>Новое сообщение</h2>\r\n";
if($popup!==""){$msg .= "<p><strong>Заявка:</strong> ".$popup."</p>\r\n";}

if($tel!==""){$msg .= "<p><strong>Телефон:</strong> ".$tel."</p>\r\n";}
// $msg .= "<p><strong>Имя:</strong> ".$uname."</p>\r\n";
if($email!==""){$msg .= "<p><strong>Email:</strong> ".$email."</p>\r\n";}
if($text!==""){$msg .= "<p><strong>Сообщение:</strong> ".$text."</p>\r\n";}
// $msg .= "<p><strong>UTM-метка:</strong> ".$utm."</p>\r\n";

$msg .= "</body></html>";

// echo $sendto;
// echo $subject;
// echo $msg;
// echo $headers;

// отправка сообщения
if(!@mail($sendto, $subject, $msg, $headers)) {
	// echo "true";
} else {
	// echo "false";
}
