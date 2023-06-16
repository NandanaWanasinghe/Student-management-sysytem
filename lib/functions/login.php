<?php
    //start sessions 
    session_start();
    
    //include db connection page
    include_once('db_conn.php');


    //system authentication function
    function Authenticate($userName,$userPwd){

        //call db connection
        $db_conn = Connection();

        //select the user
        $sql_user = "SELECT * FROM  login_tbl WHERE user_mail='$userName';";
        $sqlResult = mysqli_query($db_conn,$sql_user);

        //check number of rows
        $nor = mysqli_num_rows($sqlResult);

        if($nor>0){
            

            //check the authentication
            // 1st convert the user password into encripted password
            $enc_pwd = md5($userPwd);

            //fetch the database items
            $rec = mysqli_fetch_assoc($sqlResult);

            //start the validation
            if($enc_pwd == $rec['user_pwd']){

                //if userpassword is match then check user status
                if($rec['user_status'] == 1){

                    //if the userstatus is active then check user role
                    if($rec['user_role'] == "Principle"){

                        //create a session
                        $_SESSION['login_id'] = $rec['user_id'];
                        $_SESSION['login_name'] = $rec['user_name'];


                        //create a cookie
                        setcookie('login_id',$rec['user_id'],time()+60*60);

                        //redirect the Principal to admin page
                        header("location:lib/views/admin.php");
                    }
                }
                else{
                    return("Your account has been diactivated");
                }
            }
            else{
                return("Check Your Password!!");
            }
        }
        else{
            return("No Record Found!!!");
        }

    }
?>