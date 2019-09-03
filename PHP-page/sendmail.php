<?php
require '../mailler/PHPMailerAutoload.php';
//require 'class.smtp.php';

function senMail($email,$name,$pass){
    //var_dump($pass);die();
   // var_dump($_SESSION['user_login']);die();
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3; // Enable verbose debug output
    //$mail->SMTPDebug = 1;

    $mail->isSMTP();                             // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'sofavieet689@gmail.com'; // SMTP username
    $mail->Password = 'luan123456'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('sofaviet68@gmail.com', 'Công ty cổ phần nội thất SOFAVIET');
    $mail->addAddress($email,$name); // Add a recipient

    $mail->isHTML(true); // Set email format to HTML

    $mail->Subject = 'Xin chào'.$name;
    //$mail->Body    = 'Mật khẩu mới của bạn là '.$pass.' vui lòng bảo mật thông tin';
    $mail->Body = $pass;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
       echo "<script>alert('Thất bại')</script>";
       //echo($pass.$name.$email);
       echo "Có lỗi khi gửi mail: ". $mail->ErrorInfo;
    } else {
        echo "<script>alert('chúng tôi đã gửi mật khẩu tới email của bạn vui lòng kiểm tra email')</script>";

    }
}

function sendorder($email,$name,$table){
    //var_dump($table);die();
   //var_dump($_SESSION['user_login']);die();
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3; // Enable verbose debug output

    $mail->isSMTP();                             // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'sofavieet689@gmail.com'; // SMTP username
    $mail->Password = 'luan123456'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('safaviet10@gmail.com', 'Công ty cổ phần nội thất SOFAVIET');
    $mail->addAddress($email,$name); // Add a recipient

    $mail->isHTML(true); // Set email format to HTML

    $mail->Subject = 'Xin chào '.$name.' Đơn Hàng của bạn:';
    $mail->Body    = $table;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
       echo "thất bại";
       //echo($table);
    } else {
        echo "<script>alert('Chúng tôi đã gửi Mail cho bạn vui lòng dũ liên lạc để nhận hàng')</script>";

    }
}
?>