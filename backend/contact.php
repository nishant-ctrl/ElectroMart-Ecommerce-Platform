<?php
    include("./config.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    if(isset($_POST['contact_btn']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $id=$_SESSION['id'];
        $query=$conn->prepare("INSERT INTO `contact_form` (`user_id`, `name`, `email`, `phone`, `subject`, `message`) VALUES ('$id', '$name', '$email', '$phone', '$subject', '$message')");
        $result=$query->execute();
        if($result)
        {
            $_SESSION['message']="Submitted Successfully";
            header("Location:../frontend/contact.php");
        }
        else
        {
            $_SESSION['message']="Something went wrong";
            header("Location:../frontend/contact.php");
        }
    }
    else
    {
        header("Location:../frontend/contact.php");
    }
        if(isset($_POST['contact_btn']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            
            //Import PHPMailer classes into the global namespace
            //These must be at the top of your script, not inside a function

            //Load Composer's autoloader (created by composer, not included with PHPMailer)
            require 'phpmailer/Exception.php';
            require 'phpmailer/PHPMailer.php';
            require 'phpmailer/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'electromart251@gmail.com';                     //SMTP username
                $mail->Password   = 'egfavarjuxfnyisf';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('electromart251@gmail.com', 'Contact Form');
                $mail->addAddress('electromart251@gmail.com', 'Electromart');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "Subject: $subject";
                $mail->Body    = "Sender Name: $name <br> Sender Email: $email <br> Sender Phone: $phone <br> Subject: $subject <br> Message: $message";
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                $_SESSION['message'] = "Your message has been sent successfully!";
            } catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                $_SESSION['message'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }





            // Set success message
            header("Location: contact.php");
        }
?>