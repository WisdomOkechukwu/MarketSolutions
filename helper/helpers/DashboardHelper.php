<?php 
session_start();
require_once "../../ResetController/ResetController.php";



$user  = new UserController();

if($_SERVER['REQUEST_METHOD'] == 'POST'):
    if(isset($_POST['forgot'])):
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $restState = $user->UpdatePassword($email,$password);

        ($restState == "Updated")?$_SESSION['resteStatus'] = "true":$_SESSION['resteStatus'] = "false";
        ($_SESSION['resteStatus'] == "true")?header("Location: ../../Routes/resetpassword.php"):"";
        
        
    endif;
endif;

?>