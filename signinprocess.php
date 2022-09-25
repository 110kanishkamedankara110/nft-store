<?php 

require "database.php";

$email=$_POST["email"];
$password1=$_POST["password1"];
$password2=$_POST["password2"];



// echo $email;
// echo $password1;
// echo $password2;

if(empty($email)){
    echo "Enter Your Email";
}else if(!(str_ends_with($email,"@gmail.com") || str_ends_with($email,"@email.com") || str_ends_with($email,"@hotmail.com") || str_ends_with($email,"@icloud.com"))){
    echo "Invalid Email";
}else if(empty(explode("@",$email)[0])){
    echo "Invalid Email";
}else if((strlen(explode("@",$email)[0]))<4){
    echo "Invalid Email";
}else if(empty($password1)){
    echo "Enter Your Password";
}else if(empty($password2)){
    echo "Re Type Your Password";
}else if($password1!=$password2){
    echo "Passwords Does Not Match";
}

else{
    
    $res=Dbms::s("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n=$res->num_rows;
    if($n>=1){
        echo "Sorry This Email Is Alredy Registered";
    }else{
        $q="INSERT INTO `user` (`email`,`password`) VALUES ('".$email."','".$password1."');";
        Dbms::iud($q);
    }




  
}
?>