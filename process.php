<?php

      // Import PHPMailer classes into the global namespace 
        use PHPMailer\PHPMailer\PHPMailer; 
        use PHPMailer\PHPMailer\Exception; 
         
        // Include PHPMailer library files 
        require 'PHPMailer/Exception.php'; 
        require 'PHPMailer/PHPMailer.php'; 
        require 'PHPMailer/SMTP.php'; 
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $messageStatus = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'info@smartmoneyinvest.ca';                     //SMTP username
            $mail->Password   = '1AFL[+G5&,75.iX';                               //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'tls';                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                            

            //Recipients
            $mail->setFrom($_POST['email'], $_POST['name']);
            $mail->addAddress('omarbabul@gmail.com', 'Admin');     

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'New Contact Form Submission';


$mail->Body .= "Hello Omar,<br>";
$mail->Body .= "<h4>Enquiry from ".$_POST['name']." please find ".$_POST['name']." details below</h4>
                <table style='border-collapse: collapse; width: 100%;'>
                  <tr>
                    <th style='border: 1px solid black; padding: 8px;'>Name</th>
                    <th style='border: 1px solid black; padding: 8px;'>Email</th>
                    <th style='border: 1px solid black; padding: 8px;'>Phone</th>
                    <th style='border: 1px solid black; padding: 8px;'>Address</th>
                    <th style='border: 1px solid black; padding: 8px;'>Date</th>
                    <th style='border: 1px solid black; padding: 8px;'>Message</th>
                  </tr>
                  <tr>
                    <td style='border: 1px solid black; padding: 8px;'>".$_POST['name']."</td>
                    <td style='border: 1px solid black; padding: 8px;'>".$_POST['email']."</td>
                    <td style='border: 1px solid black; padding: 8px;'>".$_POST['phone']."</td>
                    <td style='border: 1px solid black; padding: 8px;'>".$_POST['address']."</td>
                    <td style='border: 1px solid black; padding: 8px;'>".$_POST['date']."</td>
                    <td style='border: 1px solid black; padding: 8px;'>".$_POST['message']."</td>
                  </tr>
                </table>
                <br />Best regards,";

$mail->Body .="<h3>Omar Babul <br>";


                    
                 $mail->Body .="<p><u>399 St Germain Ave, <br /> North York, ON <br /> M5M 1W8</u> <br /> <b>Email:</b> <u>omarbabul@gmail.com</u><br /> <b>
                     <br /><u>www.obball.com</u></p>";
       




                              //   'Name: '.$_POST['name'].'<br>'.
                              // 'Email: '.$_POST['email'].'<br>'.
                              // 'Phone: '.$_POST['phone'].'<br>'.
                              // 'Address: '.$_POST['address'].'<br>'.
                              // 'Date: '.$_POST['date'].'<br>'.
                              // 'Message: '.$_POST['message'];


            // $mail->Body    = 'Name: '.$_POST['name'].'<br>'.
            //                   'Email: '.$_POST['email'].'<br>'.
            //                   'Phone: '.$_POST['phone'].'<br>'.
            //                   'Address: '.$_POST['address'].'<br>'.
            //                   'Date: '.$_POST['date'].'<br>'.
            //                   'Message: '.$_POST['message'];

            $mail->send();
            $response = 'THANK YOU! OMAR BABUL WILL CONTACT YOU';
        } catch (Exception $e) {
            $response = "OOPS SOMETHING WENT WRONG PLEASE TRY AGAIN AFTER SOMETIME OR EMAIL omarbabul@gmail.com";
            // $response = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
        }

        echo $response;
    }
    ?>