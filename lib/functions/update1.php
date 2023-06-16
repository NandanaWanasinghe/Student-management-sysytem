<?php
//include the db connection
include_once('db_conn.php');

function teaUpdate($teaId,$teaName,$teaNic,$teaPhone,$teaMail){

    //call db connection
    $db_conn = Connection();

    $sql_update = "UPDATE tea_tbl SET tea_name = '$teaName',tea_nic='$teaNic', tea_phone = '$teaPhone', tea_mail = '$teaMail' WHERE
                   tea_id = '$teaId';";
    
    $sql_result = mysqli_query($db_conn,$sql_update);

    if($sql_result > 0){
        return("success");
    }
}



?>