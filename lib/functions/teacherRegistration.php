<?php
//include the db connection
include_once('db_conn.php');

//call the auto numbering page 
include_once('autoNumber.php');

//create the Registration function
function Registration($name,$nic,$number,$email,$address){

    //call db connection
    $db_conn = Connection();

    //call the auto numbering function
    $id = Auto('tea_id','tea_tbl','Tea');

    //sql insert 
    $sqlInsert = "INSERT INTO tea_tbl (tea_id,tea_name,tea_nic,tea_phone,tea_mail,tea_add) 
                  VALUES('$id','$name','$nic','$number','$email','$address');";

    $sqlResult = mysqli_query($db_conn,$sqlInsert);

    if($sqlResult > 0){
        return ("Saved Successfully!!");
    }
    else{
        return("Please Try again!!");
    }
}
?>