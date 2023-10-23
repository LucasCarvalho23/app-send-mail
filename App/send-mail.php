<?php 

    session_start();

    require '../../password.php';
    require '../Security/Library/DSNConfigurator.php';
    require '../Security/Library/Exception.php';
    require '../Security/Library/OAuthTokenProvider.php';
    require '../Security/Library/PHPMailer.php';
    require '../Security/Library/POP3.php';
    require '../Security/Library/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    class SendMail {

        private $sendto = null;
        private $subject = null;
        private $messege = null;

        function __get($attribute) {
            return $this -> $attribute;
        }

        function __set($attribute, $value) {
            $this -> $attribute = $value;
        }

    }

    $sendMail = new SendMail();
    $sendMail -> __set('sendto',$_POST['sendto']);
    $sendMail -> __set('subject',$_POST['subject']);
    $sendMail -> __set('messege',$_POST['messege']);

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $_SESSION['login']; 
        $mail->Password   = $_SESSION['password'];
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom($_SESSION['login'], 'Hidden');
        $mail->addAddress($_SESSION['login'], 'User'); 

        //Content
        $mail->isHTML(true);    
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

        $mail->send();
        echo 'Message has been sent';
    
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }



?>