<?php
    $id=$_POST["id"];
    $st=$_POST["status"];

    


    if($st=='Avalible'){
        $status="Unavalible";
    }else if($st=='Unavalible'){
        $status="Avalible";
    }
    require "database.php";
    Dbms::iud("UPDATE `images` SET `status`='".$status."' WHERE `id`='".$id."' ;");

?>