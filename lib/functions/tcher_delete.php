<?php

//include db connection
include_once('db_conn.php');

function tchrDelete($tea_id){

     //call db connection
     $db_conn = Connection();

     //delete sql query 
     $sql_delete = "DELETE FROM tea_tbl WHERE tea_id='$tea_id';";

     $result = mysqli_query($db_conn,$sql_delete);

     if($result > 0){
         return("Successfully Deleted");
     }
     else{
         return("Please Check Again !!!");
     }
}
?>