<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Teacher Report</title>

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
                <h1 class="display-5" style="font-weight: 100;" align="center">Teacher Report</h1>
                <hr>

                <table class="table">
                <thead>
                    <tr>
                        <th>Teacher ID</th>
                        <th>Teacher Name</th>
                        <th>Teacher NIC</th>
                        <th>Teacher Phone</th>
                        <th>Teacher Email</th>
                        <th>Teacher Address</th>
                        
                    </tr>
  
                </thead>

        <tbody id="table_result">

<!--fetch data from tea_tbl to Teacher report table -->
<?php

//include database connection page
include_once('../../functions/db_conn.php');

function readTeaData(){

    //call db connection
    $db_conn = Connection();

    $viewSql = "SELECT * FROM tea_tbl;";
    $sqlResult = mysqli_query($db_conn,$viewSql);

    //check no of rows
    $nor = mysqli_num_rows($sqlResult);

    if($nor>0){

       

        while($rec=mysqli_fetch_assoc($sqlResult))
        echo("<tr>
            <td>".$rec['tea_id']."</td>    
            <td>".$rec['tea_name']."</td>
            <td>".$rec['tea_nic']."</td>
            <td>".$rec['tea_phone']."</td>
            <td>".$rec['tea_mail']."</td>
            <td>".$rec['tea_add']."</td>
            </tr>
        ");
    }

    else{

        echo("No Records Found");
    }
}
 readTeaData();

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