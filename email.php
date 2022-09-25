

<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
require 'database.php';

$res = Dbms::s("SELECT * FROM `images` WHERE  `id`='" . $_POST["img"] . "' ;");
$num = $res->num_rows;
if ($num == 0) {
    echo "err_s_i";
} else {

    session_start();
    $nft = $res->fetch_assoc();

    $img = $nft['url'];
    $email = $_SESSION["user"]["email"];

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pixbin110@gmail.com';
    $mail->Password = '0724886404Was@';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('110kanishkamedankara110@gmail.com', 'kanishka');
    $mail->addReplyTo('No Reply');
    $mail->addAddress("$email");
    $mail->isHTML(true);
    $mail->Subject = 'Nft';
    $bodyContent = "<h1 style='color:teal;'>Thank You For Purchasing NFT</h1>";
    $bodyContent .= "<h3 style='color:black;'>" . $nft["title"] . "</h3>";
    $bodyContent .= "<h3 style='color:black;'>Rs:" . $nft["price"] . "</h3>";
    $bodyContent .= "<hr/>";
    $bodyContent .= "<span style='color:black;'>" . $nft["description"] . "</span>";
    $bodyContent .= "<hr/>";

    $mail->AddEmbeddedImage("$img", "my-attach");
    $mail->Body = $bodyContent;

    if (!$mail->send()) {
    } else {
    }
}


?>