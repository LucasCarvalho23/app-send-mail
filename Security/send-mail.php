<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    class SendMail {

        private $sendto = null;
        private $subject = null;
        private $messege = null;
        public $status = null;

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

        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $_SESSION['login']; 
        $mail->Password   = $_SESSION['password'];
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom($_SESSION['login'], 'Hidden');
        $mail->addAddress($_POST['sendto'], 'User'); 

        //Content
        $mail->isHTML(true);    
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['messege'];

        $mail->send();
        $status = 1;
        $finalMessenge = 'Message has been sent';
    
    } catch (Exception $e) {
        $status = 2;
        $finalMessenge = 'Message could not be sent. Error: ' . $mail->ErrorInfo;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>App Mail Send</title>
</head>
<body>
    
<div class = "container">
        <div class = "row">
            <div class = "col-md-12">

                <h2 class = "display-5 mt-5 text-primary">App Send Email</h2>

                <div class = "mt-5 border p-5">

                    <?php if ($status == 1) {?>
                        <h4 class = "display-5 text-success">Sucess</h4>
                        <p><?php echo $finalMessenge; ?></p>
                        <a href="index.php" class = "btn btn-success text-white">Back</a>
                    <?php } ?>

                    <?php if ($status == 2) {?>
                        <h4 class = "display-5 text-danger">Failed</h4>
                        <p class = "text-danger"><?php echo $finalMessenge; ?></p>
                        <a href="index.php" class = "btn btn-danger text-white">Back</a>
                    <?php } ?>

                </div>


            </div>
        </div>
    </div>

</body>
</html>