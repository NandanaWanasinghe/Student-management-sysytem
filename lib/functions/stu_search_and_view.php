<?php

//include db connection
include_once('db_conn.php');

function Search_and_view($data){

     //call db connection
     $db_conn = Connection();


    //search sql
    $sql_search = "SELECT * FROM stu_tbl WHERE stu_name LIKE '%$data%';";
    $sql_result = mysqli_query($db_conn,$sql_search);


    //fetch no of rows
    $nor = mysqli_num_rows($sql_result);
    if($nor>0){
        while ($rec = mysqli_fetch_assoc($sql_result)) {
            echo("
            <tr>
                <td>".$rec['stu_name']."</td>
                <td>".$rec['stu_nic']."</td>
                <td>".$rec['stu_phone']."</td>
                <td>".$rec['stu_mail']."</td>
                
                <td> <button id=".$rec['stu_id']." class='btn btn-info btn-sm'>Edit</button></td>
                <td> <button id=".$rec['stu_id']." class='btn btn-danger btn-sm'>Trash</button></td>
            </tr>
            ");
        }    
    }
    else{
        return("No records found");
    }
}





?>