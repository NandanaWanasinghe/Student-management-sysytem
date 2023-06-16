<?php

//include db connection
include_once('db_conn.php');

function stuDelete($stu_id){

     //call db connection
     $db_conn = Connection();

     //delete sql query 
     $sql_delete = "DELETE FROM stu_tbl WHERE stu_id='$stu_id';";

     $result = mysqli_query($db_conn,$sql_delete);

     if($result > 0){
         return("Successfully Deleted");
     }
     else{
         return("Please Check Again !!!");
     }
}
?>