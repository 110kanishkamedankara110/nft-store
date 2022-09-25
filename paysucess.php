
<?php
session_start();
$id=$_POST["id"];
$invoice=$_POST["invoice"];

// echo $id." ".$invoice;

require "database.php";
require "timezone.php";
$date=Date::getdate();

Dbms::iud("UPDATE `images` SET `status`='Sold' WHERE `id`='".$id."'");
Dbms::iud("INSERT INTO `invoice` (`date_inv`,`invoice_id`,`user_id`,`images_id`) VALUES ('".$date."','".$invoice."','".$_SESSION['user']['id']."','".$id."')");

?>