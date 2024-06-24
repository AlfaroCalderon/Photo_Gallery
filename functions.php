<?php 

//This function is gonna establish the connecton to the database.
function connection($db,$user,$pass){

    try{
        $connection = new PDO("mysql:host=localhost;dbname=$db",$user,$pass);
        return $connection;

    }catch(PDOException $e){
       return false; 
    }
}

?>