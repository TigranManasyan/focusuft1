<?php
    $sendto  = "example@yourdomain.com";
    $subject = "Order from Mirax";
    $firstName    = $_POST['first_name'];
    $lastName    = $_POST['last_name'];
    $email   = $_POST['email'];
    $message   = $_POST['message'];

    // Header
    $headers  = "From: " . strip_tags($usermail) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

    // Body
    $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
    $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>$subject</h2>\r\n";
    $msg .= "<p><strong>First Name: </strong> ".$firstName."</p>\r\n";
    $msg .= "<p><strong>Last Name: </strong> ".$lastName."</p>\r\n";
    $msg .= "<p><strong>Email: </strong> ".$email."</p>\r\n";
    $msg .= "<p><strong>Message: </strong> ".$message."</p>\r\n";
    $msg .= "</body></html>";
 
    // send
    if(@mail($sendto, $subject, $msg, $headers)){
        $_POST['hidden'] = "";
        echo "true";
    }
?>