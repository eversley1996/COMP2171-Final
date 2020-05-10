<?php

    require_once('PHPMailer/PHPMailerAutoload.php');
    class MailServer{

        public function sendMail($sender,$receiver,$status,$refNum){
            $mail= new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth=true;
            $mail->SMTPSecure= 'ssl';
            $mail->Host='smtp.gmail.com';
            $mail->Port='465';
            $mail->isHTML();
            $mail->Username = 'bdzshippingja@gmail.com';
            $mail->Password = 'comp2171';
            $mail->SetFrom('no-reply@bdzshipping.com');
            $mail->Subject =$refNum." Update";
            $mail->Body = 'Shipment '.$refNum.' is now '.$status;
            $mail->AddAddress($sender);
            $mail->AddAddress($receiver);

            $mail->Send();

        }
    }



?>