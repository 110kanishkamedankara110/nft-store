<?php
session_start();
$id=$_POST["image_id"];
require "database.php";

$res = Dbms::s("SELECT * FROM `images` WHERE `status`='Avalible' AND `id`='".$id."'");
$nr=$res->num_rows;
if($nr==0){
    echo "error";
}else{
    $r=$res->fetch_assoc();
    $r["unique"]=uniqid();
    $r["email"]=$_SESSION["user"]["email"];
    $x= json_encode($r);
    echo $x;
}


?>