<?php

require "database.php";

$email = $_POST["email"];
$password1 = $_POST["password1"];





if (empty($email)) {
    echo "Enter Your Email";
} else if (empty($password1)) {
    echo "Enter Your Password";
} else {

    $ad = "SELECT * FROM `admin` WHERE `user_name`='" . $email . "' AND `password`='" . $password1 . "';";
    $adres = Dbms::s($ad);
    $q = "SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $password1 . "';";
    $res = Dbms::s($q);

    if ($res->num_rows == 1) {
        session_start();
        $_SESSION['user'] = $res->fetch_assoc();
    } else if ($adres->num_rows == 1) {
        session_start();
        $_SESSION['admin'] = $adres->fetch_assoc();
    } else {
        echo "Invalid Login Details";
    }
}
