<?php
    //call the registration page
    include_once('../../functions/stuRegistration.php');

    if(isset($_POST['btnSave'])){
        $result = Registration($_POST['stuName'],$_POST['stuNIC'],$_POST['stuTel'],$_POST['stuMail'],$_POST['stuAdd']);
    
    ?>
    
<div class="container-fluid">
    <div class="col-md-6">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><?php echo($result);?></h4>
        </div>
    </div>
</div>

<?php
    }

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>Student</title>
     <!-- link bootstrap file -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">

    <!-- link jquery js file  -->
    <script src="../../../js/jquery.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
</head>


<body>
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron">
                <h1 class="display-4" style="font-weight: 100;">Register New student</h1>
                <hr>
                <form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">

                    <div class="form-group">
                        <input type="text" name="stuName" id="stuName" class="form-control" placeholder="Enter Student Name ">
                    </div>

                    
                    <div class="form-group">
                        <input type="text" name="stuNIC" id="stuNIC" class="form-control" placeholder="Enter Student NIC ">
                    </div>

                    <div class="form-group">
                        <input type="number" name="stuTel" id="stuTel" class="form-control" placeholder="Enter Student Phone Number ">
                    </div>

                    <div class="form-group">
                        <input type="email" name="stuMail" id="stuMail" class="form-control" placeholder="Enter Student Email ">
                    </div>

                    <div class="form-group">
                        <textarea name="stuAdd" id="stuAdd" cols="30" rows="4" class="form-control" placeholder="Enter Student Address"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btnSave" id="btnSave" class="btn btn-success btn-md" value="Save">
                        <input type="reset" value="Clear" class="btn btn-warning btn-md">
                    </div>

                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="jumbotron">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="search" name="search_data" id="search_data" class="form-control"
                                placeholder="Enter Search Value">
                        </div>
                        <div class="col-md-3">
                            <button id="search_btn" class="btn btn-success" onclick="return false">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student NIC</th>
                        <th>Student Phone</th>
                        <th>Student Email</th>
                        <th>Edit</th>
                        <th>Trash</th>
                    </tr>
                </thead>
                <tbody id="table_result">

                </tbody>
            </table>
        </div>
    </div>

    <!-- bootstrap Modal start -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">student Edit Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="stu_update">
                        <div class="form-group">
                            <input type="text" name="editID" id="editID" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="editName" id="editName" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="editNIC" id="editNIC" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="editPhone" id="editPhone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="editEmail" id="editEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" id="stu_update_btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- bootstrap Modal end -->
</body>

<script>
    $(document).ready(function () {
        $("#search_btn").click(function () {
            $input_value = $("#search_data").val();

            //send ajax request 

            $.get("../../routes/stu_view_data.php", {
                data: $input_value
            }, function (res) {
                $("#table_result").html(res);


                //start delete function 
                $(".btn-danger").click(function () {

                    //send ajax request to delete the record
                    $.get("../../routes/stu_delete.php", {

                            stu_id: $(this).attr('id')

                        },

                        function (res) {
                            alert(res);
                        })
                }); 
                //end delete function 


                //edit button script
                $(".btn-info").click(function () {

                    //fetch button id
                    let stu_id = $(this).attr('id');

                    //send an ajax request to bring student specific details
                    $.get("../../routes/single_stu.php", {

                        id: stu_id

                    }, function (data) {
                        $("#exampleModal").modal('show');

                        //convert the JSON into readable format
                        var jData = jQuery.parseJSON(data);
                        $("#editID").val(jData.stu_id);
                        $("#editName").val(jData.stu_name);
                        $("#editNIC").val(jData.stu_nic);
                        $("#editPhone").val(jData.stu_phone);
                        $("#editEmail").val(jData.stu_mail);


                        //update script 
                        $("#stu_update_btn").click(function(e){
                            e.preventDefault();

                            //send an ajax request 
                            $.ajax({
                                url:"../../routes/stu_update.php",
                                type:"POST",
                                data:$("#stu_update").serialize(),
                                success:function(data){
                                    alert(data);
                                }
                            })
                            
                        })

                    })
                }); //end edit script
            })
        })
    });
</script>

</html>