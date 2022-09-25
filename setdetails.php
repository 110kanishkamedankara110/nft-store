<?php
session_start();
$id=$_POST["id"];
$_SESSION["details"]=$id;
?>