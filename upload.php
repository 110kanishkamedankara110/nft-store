<?php
session_start();
$admin=$_SESSION["admin"]["id"];
echo $admin;
    require "database.php";
    require "timezone.php";
    $legnth=count($_FILES);
    // echo $legnth;
    // echo $_POST["image0"];
    for($i=0;$i<$legnth;$i++){

        $tmp_loc=$_FILES["img".$i]["tmp_name"];
        $n=$_FILES["img".$i]["name"];
        $title=$_POST["tit".$i];
        $name=str_replace(' ','+',$n);
        
        $price=$_POST["price".$i];
        $des=$_POST["des".$i];
        $newlocation="nft/".uniqid().$name;
        $date=Date::getdate();


        Dbms::iud("INSERT INTO `images` (`url`,`price`,`status`,`description`,`date`,`title`,`admin_id`) VALUES ('".$newlocation."','".$price."','Avalible','".$des."','".$date."','".$title."','".$admin."');");

        move_uploaded_file($tmp_loc,$newlocation);

        
    }
