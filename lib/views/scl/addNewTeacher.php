<?php
    //call the registration page
    include_once('../../functions/teacherRegistration.php');

    if(isset($_POST['btnSave'])){
        $result = Registration($_POST['teaName'],$_POST['teaNIC'],$_POST['teaTel'],$_POST['teaMail'],$_POST['teaAdd']);
    
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
    <title>Teacher</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">

    <!-- link jquery js file  -->
    <script src="../../../js/jquery.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron">
                <h1 class="display-4" style="font-weight: 100;">Register New Teacher</h1>
                <hr>
                <form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">

                    <div class="form-group">
                        <input type="text" name="teaName" id="teaName" class="form-control" placeholder="Enter Teacher Name ">
                    </div>

                    
                    <div class="form-group">
                        <input type="text" name="teaNIC" id="teaNIC" class="form-control" placeholder="Enter Teacher NIC ">
                    </div>

                    <div class="form-group">
                        <input type="number" name="teaTel" id="teaTel" class="form-control" placeholder="Enter Teacher Phone Number ">
                    </div>

                    <div class="form-group">
                        <input type="email" name="teaMail" id="teaMail" class="form-control" placeholder="Enter Teacher Email ">
                    </div>

                    <div class="form-group">
                        <textarea name="teaAdd" id="teaAdd" cols="30" rows="4" class="form-control" placeholder="Enter Teacher Address"></textarea>
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
                        <th>Teacher Name</th>
                        <th>Teacher NIC</th>
                        <th>Teacher Phone</th>
                        <th>Teacher Email</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">teacher Edit Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tea_update">
                        <div class="form-group">
                            <input type="text" name="editIDt" id="editIDt" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="editNamet" id="editNamet" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="editNICt" id="editNICt" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="editPhonet" id="editPhonet" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="editEmailt" id="editEmailt" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" id="tea_update_btn">Update</button>
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

            //send an ajax request 

            $.get("../../routes/tcher_view_data.php", {
                data: $input_value
            }, function (res) {
                $("#table_result").html(res);

                //start delete script 
                $(".btn-danger").click(function () {

                    //send ajax request to delete the record
                    $.get("../../routes/tcher_delete.php", {

                            tea_id: $(this).attr('id')
                        },

                        function (res) {
                            alert(res);
                        })
                }); //end delete function 

                

                //edit button script
                $(".btn-info").click(function () {

                    //fetch button id
                    let tea_id = $(this).attr('id');
                    //send an ajax request to bring teacher specific details
                    $.get("../../routes/single_tea.php", {

                        id: tea_id

                    }, function (data) {
                        $("#exampleModal").modal('show');


                        //convert the JSON into readable format
                        var jData = jQuery.parseJSON(data);
                        $("#editIDt").val(jData.tea_id);
                        $("#editNamet").val(jData.tea_name);
                        $("#editNICt").val(jData.tea_nic);
                        $("#editPhonet").val(jData.tea_phone);
                        $("#editEmailt").val(jData.tea_mail);


                        //update script 
                        $("#tea_update_btn").click(function(e){
                            e.preventDefault();

                            //send an ajax request 
                            $.ajax({
                                url:"../../routes/tea_update.php",
                                type:"POST",
                                data:$("#tea_update").serialize(),
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