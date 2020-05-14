<?php

    require_once('PHPMailer/PHPMailerAutoload.php');
    class mailServer{

        public function sendMail($refNumber,$sender,$receiver,$status,$remark){

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
            $mail->Subject ='Shipment Update: '.$refNumber;
            $mail->Body = 'Your shipment is now '.$status.'. Please visit our site for more details using reference number '.$refNumber.'. Remarks: '.$remark;
            $mail->AddAddress($sender);
            $mail->AddAddress($receiver);

            $mail->Send();

        }
    }



?>