<?php


require "database.php";
$offset=$_POST["offset"];

$s="SELECT * FROM `images` WHERE `status`='Avalible' ORDER BY `id` DESC LIMIT 1 OFFSET ".$offset." ; ";
$e=Dbms::s($s);
$numb=$e->num_rows;
if($numb==1){
    $c=$e->fetch_assoc();
    echo $c['url'];
}



?>