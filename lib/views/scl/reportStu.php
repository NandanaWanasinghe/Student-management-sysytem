<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Student Report</title>

    <!-- link bootstrap file -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">

    <!-- link jquery js file  -->
    <script src="../../../js/jquery.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
</head>
<body>
   

<div class="row">

        <div class="col-md-10" >
            <div class="jumbotron">
                <h1 class="display-5" style="font-weight: 100;" align="center">Student report</h1>
                <hr>

                <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Student NIC</th>
                        <th>Student Phone</th>
                        <th>Student Email</th>
                        <th>Student Address</th>
                        
                    </tr>
  
                </thead>

        <tbody id="table_result">

<!--fetch data from stu_tbl to student report table -->
<?php

//include database connection page
include_once('../../functions/db_conn.php');

function readStuData(){

    //call db connection
    $db_conn = Connection();

    $viewSql = "SELECT * FROM stu_tbl;";
    $sqlResult = mysqli_query($db_conn,$viewSql);

    //check no of rows
    $nor = mysqli_num_rows($sqlResult);

    if($nor>0){

       

        while($rec=mysqli_fetch_assoc($sqlResult))
        echo("<tr>
            <td>".$rec['stu_id']."</td>    
            <td>".$rec['stu_name']."</td>
            <td>".$rec['stu_nic']."</td>
            <td>".$rec['stu_phone']."</td>
            <td>".$rec['stu_mail']."</td>
            <td>".$rec['stu_add']."</td>
            </tr>
        ");
    }

    else{

        echo("No Records Found");
    }
}
readStuData();

?>

            </tbody>
        </table>

    </div>

</div>

</div>
        
        <button onclick="window.print()" class="btn btn-primary">print</button>        
        
        </div>   
</body>
</html>