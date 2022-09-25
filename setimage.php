<?php
require "database.php";
session_start();
$id=$_POST["id"];


$res=Dbms::s("SELECT * FROM `images` WHERE `id`='".$id."' ");
$image=$res->fetch_assoc();
$_SESSION["image"]=$image;

?>