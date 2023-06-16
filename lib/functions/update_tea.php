<?php

//include the db connection
include_once('db_conn.php');

function viewSingleTea($id){

    //call db connection
    $db_conn = Connection();

    //view single teacher informations based on thire tea_id 
    $sql_view = "SELECT * FROM tea_tbl WHERE tea_id = '$id';";

    $sql_result = mysqli_query($db_conn,$sql_view);

    $nor = mysqli_num_rows($sql_result);

    if($nor > 0){
        while ($rec = mysqli_fetch_assoc($sql_result)) {
           //return the records 
           return(json_encode($rec));
        }
    }
    else{
        return("No record found!!");
    }
}


?>