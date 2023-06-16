<?php

//create a database connection
function Connection(){

    
    $server ="127.0.0.1";       //server information
    $user = "root";             //databse user name
    $pwd = "";                  //database password
    $db_name = "sm_system";     //database name


    //call the database connection
    $conn = mysqli_connect($server,$user,$pwd,$db_name);

    
    //check the db errors
    if(mysqli_connect_errno()){
        return null;
    }
    else{
        return ($conn);
    }
}

?>