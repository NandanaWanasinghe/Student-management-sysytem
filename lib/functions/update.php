<?php
//include the db connection
include_once('db_conn.php');

function stuUpdate($stuId,$stuName,$stuNic,$stuPhone,$stuMail){

    //call the database connection
    $db_conn = Connection();

    $sql_update = "UPDATE stu_tbl SET stu_name = '$stuName',stu_nic='$stuNic', stu_phone = '$stuPhone', stu_mail = '$stuMail' WHERE
                   stu_id = '$stuId';";
    
    $sql_result = mysqli_query($db_conn,$sql_update);

    if($sql_result > 0){
        return("success");
    }
}



?>