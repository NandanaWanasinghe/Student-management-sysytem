<?php
//include db connection
include_once('db_conn.php');

//auto number system
function Auto($recId,$tblName,$str){

    //call db connection
    $db_conn = Connection();

    $sql = "SELECT $recId FROM $tblName ORDER BY $recId DESC LIMIT 1;";
    $result = mysqli_query($db_conn,$sql);

    $nor = mysqli_num_rows($result);
    if($nor > 0){
        $rec = mysqli_fetch_assoc($result);
        $lid = $rec[$recId];
        $num = substr($lid,3);
        $num++;
        $id = str_pad($num,4,'0',STR_PAD_LEFT);
        $id=$str.$id;
    }
    else{
        $id=$str."0001";
    }

    return($id);
    mysqli_close($db_conn);
}


?>