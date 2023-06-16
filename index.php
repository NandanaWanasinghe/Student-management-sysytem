<?php
//call login page
include_once('lib/functions/login.php');

if(isset($_POST['btn_save'])){
    $userName = $_POST['userMail'];
    $userPwd = $_POST['userPwd'];

    //call the Authenticate function
    $result = Authenticate($userName,$userPwd);

    ?>
     <div class="container">
        <div class="col-md-4">
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
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container" align="center">
        <div class="col-md-6">
            <div class="jumbotron">
                <h1 class="display-5" style="font-weight:400">Student Management System</h1>
                <hr class="my-2">
                <form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
                   <div class="form-group">
                        <input type="email" name="userMail" id="userMail" class="form-control" placeholder="Enter Your Email">
                   </div>
                   <div class="form-group">
                        <input type="password" name="userPwd" id="userPwd" class="form-control" placeholder="Enter Your Password">
                   </div>
                   <div class="form-group">
                       <input type="submit" value="Login" class="btn btn-success btn-md" name="btn_save">
                   </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>