<?php
 
    
class Dbms{
    public static $dbms;


    public static function connection(){
        if(!isset($dbms)){
            
           Dbms::$dbms=new mysqli("localhost","root","0724886404Was","nft","3306");
            
        }

    }
    
    public static function iud($q){
        Dbms::connection();
        Dbms::$dbms->query($q);
    } 

    public static function s($q){
        Dbms::connection();
        $res=Dbms::$dbms->query($q);
        return $res;
    }

}



?>